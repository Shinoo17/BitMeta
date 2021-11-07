import mysql.connector
import datetime

database = mysql.connector.connect(host="localhost", user="root", password="", database="test")
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


def updateOrder(newRemain, newFilled, orderID):
    sql = "UPDATE orders_limit SET Remain=%s,Filled=%s WHERE Order_ID=%s "
    order_val = (newRemain, newFilled, orderID)
    cursor.execute(sql, order_val)


def updateWallet(coinBalance, userID, coinID_):
    sql = "UPDATE wallet SET Amount=%s WHERE User_ID=%s && Coin_ID=%s "
    wallet_val = (coinBalance, userID, coinID_)
    cursor.execute(sql, wallet_val)


def insertHistory(userID, coinID_, type_, slid, price, amount, total):
    sql = "INSERT INTO history (User_ID, Coin_ID, Type, Slid, Price, Amount, Total, Time) " \
          "VALUES (%s, %s, %s, %s, %s, %s, %s, %s )"
    history_val = (userID, coinID_, type_, slid, price, amount, total,
                   datetime.datetime.now())
    cursor.execute(sql, history_val)


def deleteOrder(orderID):
    sql = "DELETE FROM orders_limit WHERE Order_ID=%s "
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
            UnFilled = buyOrder[5] - buyOrder[6]  # buy unfilled (Coin)
            usdtRemain = buyOrder[7]  # buy remain (USDT)

            sql_sellOrder = "SELECT * FROM orders_limit WHERE Slid='Sell' && Coin_ID=%s && Price=%s && User_ID!=%s"
            val = (coinID, buy_price, buy_user_id)
            cursor.execute(sql_sellOrder, val)
            resultSell = cursor.fetchall()
            for sellOrder in resultSell:
                sell_user_id = sellOrder[1]
                sell_order_id = sellOrder[0]
                coinFilled = sellOrder[6]
                coinRemain = sellOrder[7]

                """ buyer wallet """
                BuyerCoinBalance = getWalletData(buy_user_id, coinID)
                """ seller wallet """
                SellerBalance = getWalletData(sell_user_id, 1)

                if UnFilled < coinRemain:
                    """ DELETE buyOrder """
                    deleteOrder(buy_order_id)

                    """ Update sellOrder """
                    new_coinRemain = round(coinRemain - UnFilled, 4)
                    new_coinFilled = round(coinFilled + UnFilled, 4)
                    updateOrder(new_coinRemain, new_coinFilled, sell_order_id)

                    """ Update Buyer wallet """
                    new_coinBalance = round(BuyerCoinBalance + UnFilled, 4)
                    updateWallet(new_coinBalance, buy_user_id, coinID)

                    """ Update seller wallet """
                    new_balance = round(SellerBalance + usdtRemain, 4)
                    updateWallet(new_balance, sell_user_id, 1)

                    """ Update buyer history """
                    insertHistory(buy_user_id, coinID, "Limit", "Buy", buy_price, buyOrder[5], buyOrder[8])

                    database.commit()
                    break

                if UnFilled == coinRemain:
                    """ DELETE buy&sell order """
                    deleteOrder(buy_order_id)
                    deleteOrder(sell_order_id)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + UnFilled, 4)
                    updateWallet(new_coinBalance, buy_user_id, coinID)

                    """ Update seller wallet  """
                    new_balance = round(SellerBalance + usdtRemain, 4)
                    updateWallet(new_balance, sell_user_id, 1)

                    """ Update buyer history """
                    insertHistory(buy_user_id, coinID, "Limit", "Buy", buy_price, buyOrder[5], buyOrder[8])

                    """ Update seller history """
                    insertHistory(sell_user_id, coinID, "Limit", "Sell", buy_price, sellOrder[5], sellOrder[8])

                    database.commit()
                    break

                if UnFilled > coinRemain:
                    """ DELETE sellOrder """
                    deleteOrder(sell_order_id)

                    """ Update buyOrder """
                    usdtRemain = round(usdtRemain - (buy_price * coinRemain), 4)
                    UnFilled = round(UnFilled - coinRemain, 4)
                    updateOrder(usdtRemain, UnFilled, sell_order_id)

                    """ Update buyer wallet  """
                    new_coinBalance = round(BuyerCoinBalance + coinRemain, 4)
                    updateWallet(new_coinBalance, buy_user_id, coinID)

                    """ Update seller wallet  """
                    new_balance = round(SellerBalance + (buy_price * coinRemain), 4)
                    updateWallet(new_balance, sell_user_id, 1)

                    """ Update seller history """
                    insertHistory(sell_user_id, coinID, "Limit", "Sell", buy_price, sellOrder[5], sellOrder[8])

                    database.commit()