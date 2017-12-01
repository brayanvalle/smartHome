import RPi.GPIO as GPIO    #Importamos la libreria RPi.GPIO
import time                #Importamos time para poder usar time.sleep

GPIO.setmode(GPIO.BCM)   #Ponemos la Raspberry en modo BOARD
GPIO.setup(13,GPIO.OUT)    #Ponemos el pin 21 como salida
p = GPIO.PWM(13,50)        #Ponemos el pin 21 en modo PWM y enviamos 50 pulsos por segundo
p.start(7.5)               #Enviamos un pulso del 7.5% para centrar el servo
 
p.ChangeDutyCycle(2.5)    
time.sleep(0.5)   
GPIO.cleanup()



#try:                 
    #while True:      #iniciamos un loop infinito
GPIO.setwarnings(False)
p.ChangeDutyCycle(2.5)    #Enviamos un pulso del 4.5% para girar el servo hacia la izquierda
           #pausa de medio segundo
        #p.ChangeDutyCycle(2.5)   #Enviamos un pulso del 10.5% para girar el servo hacia la derecha
        #time.sleep(0.5)           #pausa de medio segundo
                  #pausa de medio segundo
 
                     #Detenemos el servo 
GPIO.cleanup() 