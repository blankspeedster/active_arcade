import cv2
from cvzone.HandTrackingModule import HandDetector
import socket
import math
import time
import mysql.connector

#Check database first
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
while sock.connect_ex(('127.0.0.1', 3306)) != 0: # 'db' is the host, 3306 is the port
    print('MySQL is not ready yet.')
    time.sleep(2)
sock.close()

#Parameters
width, height = 1920, 1080

cap = cv2.VideoCapture(0)
cap.set(3, width)
cap.set(4, height)


#Hand Detector
detector = HandDetector(maxHands = 1, detectionCon = 0.8)

# Communication
sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
serverAddressPort = ("127.0.0.1", 5052)
serverAddressPortCenter = ("127.0.0.1", 5053)


mydb = mysql.connector.connect(
    host="127.0.0.1",
    user="activate_arcade_database",
    passwd="activate_arcade_database",
    database="activate_arcade_database"
    )
mycursor = mydb.cursor()

while True:
    #Get the frame from the webcam
    success, img = cap.read()

    #Hands
    hands, img = detector.findHands(img)

    data = []
    centerData = []
    #Landmark Values (x,y,z) * 21
    if hands:
        # Get the first hand detected
        hand = hands[0]
        print(hand["type"]) # print hand type if left or right
        lmlist = hand.get('lmList')
        center = hand.get('center')
        for lm in lmlist:
            data.extend([lm[0], height - lm[1], lm[2]])

        centerData = math.hypot(center[0], center[1])
        # print(centerData)
        sock.sendto(str.encode(str(data)), serverAddressPort)
        sock.sendto(str.encode(str(centerData)), serverAddressPortCenter)

        handStatus = [str(hand["type"])]
        updateStatus = "UPDATE hand_status SET status = %s WHERE id='1' "
        mycursor.execute(updateStatus, handStatus)
        mydb.commit()

    cv2.imshow("Image", img)
    if cv2.waitKey(1) == ord('q'):
        break