import RPi.GPIO as GPIO


def led(status,piso):
    GPIO.setmode(GPIO.BCM)
    GPIO.setwarnings(False)    
    
     
    if(piso == 1):
       inputGpio = 18
    if(piso == 2):
       inputGpio = 23
    if(piso == 3):
       inputGpio = 24
    GPIO.setup(inputGpio, GPIO.OUT) 
    if(status):
       GPIO.output(inputGpio, GPIO.LOW)       
    else:
       GPIO.output(inputGpio,GPIO.HIGH)
    print (status)



	

