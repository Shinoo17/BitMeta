from tkinter import *
import mysql.connector
import conn

running = False


def scanning():
    if running:
        conn.startConn()
        conn.match_order()
        conn.match_order_market_buy()
        conn.match_order_market_sell()
        conn.stopConn()
    root.after(1000, scanning)


def start():
    global running
    global current_process
    running = True
    current_process.config(text = "Process")


def stop():
    global running
    global current_process
    running = False
    current_process.config(text="Stop")


print("Please wait")
root = Tk()
root.title("Bit Meta calculate")
root.geometry("350x250")

app = Frame(root, pady=50)
app.pack()

start = Button(app, text="Start Scan", command=start)
stop = Button(app, text="Stop", command=stop)
current_process = Label(root, text="Stop")

start.pack()
stop.pack()
current_process.pack()

root.after(1000, scanning)  # After 1 second, call scanning
root.mainloop()
