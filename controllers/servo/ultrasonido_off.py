import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)     
GPIO_TRIGGER = 16         
GPIO_ECHO    = 20
GPIO.setup(GPIO_TRIGGER,GPIO.OUT)  
GPIO.setup(GPIO_ECHO,GPIO.IN)      
GPIO.output(GPIO_TRIGGER,False)   
       
GPIO.output(GPIO_TRIGGER,False)  
GPIO.cleanup()
