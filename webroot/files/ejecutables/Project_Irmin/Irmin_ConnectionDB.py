import mysql.connector

def connectionDB():
    try:
        mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        database="irmin_test"
        )
    except:
        mydb = False
    return mydb


