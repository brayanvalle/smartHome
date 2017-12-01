import RPi.GPIO as GPIO    #Importamos la libreria RPi.GPIO
import time  

def closeGaraje():

	GPIO.setmode(GPIO.BCM)   #Ponemos la Raspberry en modo BOARD
	GPIO.setup(21,GPIO.OUT)    #Ponemos el pin 21 como salida
	p = GPIO.PWM(21,50)        #Ponemos el pin 21 en modo PWM y enviamos 50 pulsos por segundo
	p.start(7.5)               #Enviamos un pulso del 7.5% para centrar el servo


	GPIO.setwarnings(False)
	p.ChangeDutyCycle(6.0)   #Enviamos un pulso del 10.5% para girar el servo hacia la derecha
	time.sleep(0.5) 
	#p.ChangeDutyCycle(2.5)   #Enviamos un pulso del 10.5% para girar el servo hacia la derecha
	#time.sleep(0.5)
def openGaraje():
    GPIO.setmode(GPIO.BCM)   
    GPIO.setup(21,GPIO.OUT)    
    p = GPIO.PWM(21,50)        
    p.start(7.5)                
    p.ChangeDutyCycle(2.5)    #Enviamos un pulso del 4.5% para girar el servo hacia la izquierda
    time.sleep(0.5)  
   
GPIO.cleanup()
