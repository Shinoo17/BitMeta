import mysql.connector
import datetime

database = mysql.connector.connect(host="localhost", user="root", password="", database="bitmeta")
cursor = database.cursor()
"""
# database order index :
# 0 : Order_ID
# 1 : User_ID
# 2 : Coin_ID
# 3 : Slid
# 4 : Price
# 5 : Amount
# 6 : Filled
# 7 : Remain
# 8 : Total
# 9 : Time
"""


def getWalletData(userID, coinID_):
    sql = "SELECT * FROM wallet WHERE User_ID=%s && Coin_ID=%s"
    wallet_val = (userID, coinID_)
    cursor.execute(sql, wallet_val)
    balance = cursor.fetchone()
    return balance[2]


def updateOrder(orderID, newFilled, newRemain):
    sql = "UPDATE orders_limit SET Remain=%s,Filled=%s WHERE Order_ID=%s "
    order_val = (newRemain, newFilled, orderID)
    cursor.execute(sql, order_val)


def updateOrderMarket(orderID, price, amount, filled, remain, total):
    sql = "UPDATE orders_market SET Price=%s,Amount=%s,Filled=%s,Remain=%s,Total=%s WHERE Order_ID=%s "
    order_val = (price, amount, filled, remain, total, orderID,)
    cursor.execute(sql, order_val)


def updateWallet(userID, coinID_, coinBalance):
    sql = "UPDATE wallet SET Amount=%s WHERE User_ID=%s && Coin_ID=%s "
    wallet_val = (coinBalance, userID, coinID_)
    cursor.execute(sql, wallet_val)


def insertHistory(userID, coinID_, type_, slid, price, amount, total):
    sql = "INSERT INTO history (User_ID, Coin_ID, Type, Slid, Price, Amount, Total, Time, Status) " \
          "VALUES (%s, %s, %s, %s, %s, %s, %s, %s, 'Success')"
    history_val = (userID, coinID_, type_, slid, price, amount, total,
                   datetime.datetime.now())
    cursor.execute(sql, history_val)


def deleteOrder(orderID):
    sql = "DELETE FROM orders_limit WHERE Order_ID=%s "
    order_val = (orderID,)
    cursor.execute(sql, order_val)


def deleteOrderMarket(orderID):
    sql = "DELETE FROM orders_market WHERE Order_ID=%s "
    order_val = (orderID,)
    cursor.execute(sql, order_val)


def match_order():
    for coinID in range(2, 13):
        sql_buyOrder = "SELECT * FROM orders_limit WHERE Slid='Buy' && Coin_ID=%s ORDER BY Price"
        val = (coinID,)
        cursor.execute(sql_buyOrder, val)
        resultBuy = cursor.fetchall()
        for buyOrder in resultBuy:
            buy_order_id = buyOrder[0]  # buy order id
            buy_user_id = buyOrder[1]  # buy user id
            buy_price = buyOrder[4]  # buy price
            buy_UnFilled = buyOrder[5] - buyOrder[6]  # buy unfilled (Coin)
            buy_usdtRemain = buyOrder[7]  # buy remain (USDT)

            sql_sellOrder = "SELECT * FROM orders_limit WHERE Slid='Sell' && Coin_ID=%s && Price=%s && User_ID!=%s"
            val = (coinID, buy_price, buy_user_id)
            cursor.execute(sql_sellOrder, val)
            resultSell = cursor.fetchall()
            for sellOrder in resultSell:
                sell_order_id = sellOrder[0]
                sell_user_id = sellOrder[1]
                sell_price = sellOrder[4]
                sell_coinFilled = sellOrder[6]
                sell_coinRemain = sellOrder[7]

                """ buyer wallet """
                BuyerCoinBalance = getWalletData(buy_user_id, coinID)
                """ seller wallet """
                SellerUSDTBalance = getWalletData(sell_user_id, 1)

                if buy_UnFilled < sell_coinRemain:
                    """ DELETE buyOrder """
                    deleteOrder(buy_order_id)

                    """ Update sellOrder """
                    new_coinRemain = round(sell_coinRemain - buy_UnFilled, 4)
                    new_coinFilled = round(sell_coinFilled + buy_UnFilled, 4)
                    updateOrder(sell_order_id, new_coinFilled, new_coinRemain)

                    """ Update Buyer wallet """
                    new_coinBalance = round(BuyerCoinBalance + buy_UnFilled, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet """
                    new_balance = round(SellerUSDTBalance + buy_usdtRemain, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert buyer history """
                    insertHistory(buy_user_id, coinID, "Limit", "Buy", buy_price, buyOrder[5], buyOrder[8])

                    database.commit()
                    break

                if buy_UnFilled == sell_coinRemain:
                    """ DELETE buy&sell order """
                    deleteOrder(buy_order_id)
                    deleteOrder(sell_order_id)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + buy_UnFilled, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + buy_usdtRemain, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert buyer history """
                    insertHistory(buy_user_id, coinID, "Limit", "Buy", buy_price, buyOrder[5], buyOrder[8])

                    """ Insert seller history """
                    insertHistory(sell_user_id, coinID, "Limit", "Sell", sell_price, sellOrder[5], sellOrder[8])

                    database.commit()
                    break

                if buy_UnFilled > sell_coinRemain:
                    """ DELETE sellOrder """
                    deleteOrder(sell_order_id)

                    """ Update buyOrder """
                    buy_usdtRemain = round(buy_usdtRemain - (buy_price * sell_coinRemain), 4)
                    buy_UnFilled = round(buy_UnFilled - sell_coinRemain, 4)
                    updateOrder(buy_order_id, buy_UnFilled, buy_usdtRemain)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + sell_coinRemain, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + (buy_price * sell_coinRemain), 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert seller history """
                    insertHistory(sell_user_id, coinID, "Limit", "Sell", sell_price, sellOrder[5], sellOrder[8])

                    database.commit()


def match_order_market_buy():
    for coinID in range(2, 13):
        sql_buyOrder = "SELECT * FROM orders_market WHERE Slid='Buy' && Coin_ID=%s"
        val = (coinID,)
        cursor.execute(sql_buyOrder, val)
        resultBuy = cursor.fetchall()
        for buyOrder in resultBuy:
            buy_order_id = buyOrder[0]  # buy order id
            buy_user_id = buyOrder[1]  # buy user id
            buy_price = buyOrder[4]  # buy price
            buy_amount = buyOrder[5]  # buy amount
            buy_filled = buyOrder[6]  # buy filled
            buy_usdtRemain = buyOrder[7]  # buy remain (USDT)

            # get lowest price
            sql_sellOrder = "SELECT * FROM orders_limit WHERE Slid='Sell' && Coin_ID=%s && User_ID!=%s ORDER BY Price"
            val = (coinID, buy_user_id)
            cursor.execute(sql_sellOrder, val)
            resultSell = cursor.fetchall()

            for sellOrder in resultSell:
                sell_order_id = sellOrder[0]
                sell_user_id = sellOrder[1]
                sell_price = sellOrder[4]
                cell_coinFilled = sellOrder[6]
                sell_coinRemain = sellOrder[7]
                total_price = sell_price * sell_coinRemain
                """ buyer wallet """
                BuyerCoinBalance = getWalletData(buy_user_id, coinID)
                """ seller wallet """
                SellerUSDTBalance = getWalletData(sell_user_id, 1)
                if buy_usdtRemain < total_price:
                    buyer_coin_get = round(buy_usdtRemain / sell_price, 4)
                    """ DELETE buyOrder """
                    deleteOrderMarket(buy_order_id)

                    """ Update sellOrder """
                    new_coinRemain = round(sell_coinRemain - buyer_coin_get, 4)
                    new_coinFilled = round(cell_coinFilled + buyer_coin_get, 4)
                    updateOrder(sell_order_id, new_coinFilled, new_coinRemain)

                    """ Update Buyer wallet """
                    new_coinBalance = round(BuyerCoinBalance + buyer_coin_get, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet """
                    new_balance = round(SellerUSDTBalance + buy_usdtRemain, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert buyer history """
                    new_buy_filled = buy_filled + buyer_coin_get
                    new_buy_price = ((buy_price * buy_filled) + (sell_price * buyer_coin_get)) / new_buy_filled
                    insertHistory(buy_user_id, coinID, "Market", "Buy", new_buy_price, new_buy_filled, buyOrder[8])

                    database.commit()
                    break

                if buy_usdtRemain == total_price:
                    """ DELETE buy&sell order """
                    deleteOrderMarket(buy_order_id)
                    deleteOrder(sell_order_id)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + sell_coinRemain, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + buy_usdtRemain, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert buyer history """
                    new_buy_filled = buy_filled + sell_coinRemain
                    new_buy_price = ((buy_price * buy_filled) + (sell_price * sell_coinRemain)) / new_buy_filled
                    insertHistory(buy_user_id, coinID, "Market", "Buy", new_buy_price, new_buy_filled, buyOrder[8])

                    """ Insert seller history """
                    insertHistory(sell_user_id, coinID, "Limit", "Sell", sell_price, sellOrder[5], sellOrder[8])

                    database.commit()
                    break

                if buy_usdtRemain > total_price:
                    buyer_pay = round(sell_price * sell_coinRemain, 4)
                    """ DELETE sellOrder """
                    deleteOrder(sell_order_id)

                    """ Update buyOrderMarket """
                    buy_price = round(((buy_price * buy_filled) + (sell_price * sell_coinRemain)) / (buy_filled + sell_coinRemain), 4)
                    buy_filled = round(buy_filled + sell_coinRemain, 4)
                    buy_usdtRemain = round(buy_usdtRemain - buyer_pay, 4)
                    updateOrderMarket(buy_order_id, buy_price, buy_filled, buy_filled, buy_usdtRemain, buyOrder[8])

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + sell_coinRemain, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + buyer_pay, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert seller history """
                    insertHistory(sell_user_id, coinID, "Limit", "Sell", sell_price, sellOrder[5], sellOrder[8])

                    database.commit()


def match_order_market_sell():
    for coinID in range(2, 13):
        sql_sellOrder = "SELECT * FROM orders_market WHERE Slid='Sell' && Coin_ID=%s"
        val = (coinID,)
        cursor.execute(sql_sellOrder, val)
        resultSell = cursor.fetchall()
        for sellOrder in resultSell:
            sell_order_id = sellOrder[0]  # sell order id
            sell_user_id = sellOrder[1]  # sell user id
            sell_price = sellOrder[4]  # buy price
            sell_amount = sellOrder[5]  # buy amount
            sell_filled = sellOrder[6]  # buy filled
            sell_coinRemain = sellOrder[7]  # sell coin remain
            sell_total = sellOrder[8]  # sell total (in USDT)

            # get highest price
            sql_buyOrder = "SELECT * FROM orders_limit WHERE Slid='Buy' && Coin_ID=%s && User_ID!=%s ORDER BY Price " \
                           "DESC"
            val = (coinID, sell_order_id)
            cursor.execute(sql_buyOrder, val)
            resultBuy = cursor.fetchall()
            for buyOrder in resultBuy:
                buy_order_id = buyOrder[0]  # buy order id
                buy_user_id = buyOrder[1]  # buy user id
                buy_price = buyOrder[4]  # buy price
                buy_amount = buyOrder[5]  # buy amount
                buy_filled = buyOrder[6]  # buy filled
                buy_UnFilled = buyOrder[5] - buyOrder[6]  # buy unfilled (Coin)
                buy_usdtRemain = buyOrder[7]  # buy remain (USDT)
                """ buyer wallet """
                BuyerCoinBalance = getWalletData(buy_user_id, coinID)
                """ seller wallet """
                SellerUSDTBalance = getWalletData(sell_user_id, 1)
                if sell_coinRemain < buy_UnFilled:
                    # BUG
                    buyer_pay = round(buy_price * sell_coinRemain, 4)
                    """ DELETE buyOrder """
                    deleteOrderMarket(sell_order_id)

                    """ Update buyOrder """
                    buy_usdtRemain = round(buy_usdtRemain - buyer_pay, 4)
                    buy_filled = round(buy_filled + sell_coinRemain, 4)
                    updateOrder(buy_order_id, buy_filled, buy_usdtRemain)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + sell_coinRemain, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + (buy_price * sell_coinRemain), 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert seller history """
                    sell_price = round(
                        ((sell_price * sell_filled) + (buy_price * sell_coinRemain)) / (sell_filled + sell_coinRemain),
                        4)
                    sell_total = sell_total + buyer_pay
                    insertHistory(sell_user_id, coinID, "Market", "Sell", sell_price, sell_amount, sell_total)

                    database.commit()
                    break

                if sell_coinRemain == buy_UnFilled:
                    """ DELETE buy&sell order """
                    deleteOrder(buy_order_id)
                    deleteOrderMarket(sell_order_id)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + sell_coinRemain, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + buy_usdtRemain, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert buyer history """
                    insertHistory(buy_user_id, coinID, "Limit", "Buy", buy_price, buy_amount, buyOrder[8])

                    """ Insert seller history """
                    sell_price = round(
                        ((sell_price * sell_filled) + (buy_price * sell_coinRemain)) / (sell_filled + sell_coinRemain),
                        4)
                    sell_total = sell_total + buy_usdtRemain
                    insertHistory(sell_user_id, coinID, "Market", "Sell", sell_price, sell_amount, sell_total)

                    database.commit()
                    break

                if sell_coinRemain > buy_UnFilled:
                    """ DELETE buyOrder """
                    deleteOrder(buy_order_id)

                    """ Update sellOrderMarket """
                    sell_price = round(
                        ((sell_price * sell_filled) + (buy_price * buy_UnFilled)) / (sell_filled + buy_UnFilled), 4)
                    sell_filled = sell_filled + buy_UnFilled
                    sell_coinRemain = sell_coinRemain - buy_UnFilled
                    sell_total = sell_total + buy_usdtRemain
                    updateOrderMarket(sell_order_id, sell_price, sell_amount, sell_filled, sell_coinRemain, sell_total)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + buy_UnFilled, 4)
                    updateWallet(buy_user_id, coinID, new_coinBalance)

                    """ Update seller wallet  """
                    new_balance = round(SellerUSDTBalance + buy_usdtRemain, 4)
                    updateWallet(sell_user_id, 1, new_balance)

                    """ Insert buyer history """
                    insertHistory(buy_user_id, coinID, "Limit", "Buy", buy_price, buy_amount, buyOrder[8])
                    database.commit()