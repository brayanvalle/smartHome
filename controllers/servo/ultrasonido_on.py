import time
import RPi.GPIO as GPIO
GPIO.setwarnings(False)
#Importamos time (time.sleep)
GPIO.setmode(GPIO.BCM)     #Ponemos la placa en modo BCM
GPIO_TRIGGER = 16         #Usamos el pin GPIO 25 como TRIGGER
GPIO_ECHO    = 20         #Usamos el pin GPIO 7 como ECHO
GPIO.setup(GPIO_TRIGGER,GPIO.OUT)  #Configuramos Trigger como salida
GPIO.setup(GPIO_ECHO,GPIO.IN)      #Configuramos Echo como entrada
GPIO.output(GPIO_TRIGGER,False)    #Ponemos el pin 25 como LOW
cont = 0
cont2=0

def openGaraje():
    GPIO.setmode(GPIO.BCM)   
    GPIO.setup(13,GPIO.OUT)    
    p = GPIO.PWM(13,50)        
    p.start(7.5)                
    p.ChangeDutyCycle(2.5)    #Enviamos un pulso del 4.5% para girar el servo hacia la izquierda
    time.sleep(0.5)
    
    
def closeGaraje():

	GPIO.setmode(GPIO.BCM)   #Ponemos la Raspberry en modo BOARD
	GPIO.setup(13,GPIO.OUT)    #Ponemos el pin 21 como salida
	p = GPIO.PWM(13,50)        #Ponemos el pin 21 en modo PWM y enviamos 50 pulsos por segundo
	p.start(7.5)               #Enviamos un pulso del 7.5% para centrar el servo


	GPIO.setwarnings(False)
	p.ChangeDutyCycle(6.0)   
	time.sleep(0.5) 
	
	
while True:     
        GPIO.output(GPIO_TRIGGER,True)   
        time.sleep(0.00001)              
        GPIO.output(GPIO_TRIGGER,False)  
        start = time.time()              
        while GPIO.input(GPIO_ECHO)==0:  
            start = time.time()          
        while GPIO.input(GPIO_ECHO)==1:  
            stop = time.time()           
        elapsed = stop-start             
        elapsed=elapsed*10**6
        distance = elapsed/58
                       
        if(distance <70):
            if(cont!=1):
                openGaraje()
                cont2=0
            cont=1
        if(distance >=70):
            if(cont2!=1):
                closeGaraje()
                cont=0
            cont2=1          
            
        print (distance)                  #
        time.sleep(1)                    
