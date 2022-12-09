#pip install mysql-connector-python
import mysql.connector
import socket
import time

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
while sock.connect_ex(('127.0.0.1', 3306)) != 0: # 'db' is the host, 3306 is the port
    print('MySQL is not ready yet.')
    time.sleep(2)
sock.close()

mydb = mysql.connector.connect(
    host="127.0.0.1",
    user="activate_arcade_database",
    passwd="activate_arcade_database",
    database="activate_arcade_database"
    )
mycursor = mydb.cursor()

updateStatus = "UPDATE hand_status SET status = %s WHERE id='1' "
mycursor.execute(updateStatus, )
mydb.commit()