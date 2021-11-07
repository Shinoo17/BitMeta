from tkinter import *
import mysql.connector
import conn

running = False


def scanning():
    if running:
        conn.match_order()
        pass

    root.after(1000, scanning)


def start():
    global running
    running = True


def stop():
    global running
    running = False


root = Tk()
root.title("Bit Meta calculate")
root.geometry("550x350")

app = Frame(root, pady=50)
app.pack()

start = Button(app, text="Start Scan", command=start)
stop = Button(app, text="Stop", command=stop)
current_process = Label(root, text="process: ")

start.pack()
stop.pack()
current_process.pack()

root.after(1000, scanning)  # After 1 second, call scanning
root.mainloop()
