from leds import leds as ld
from servo import servo as sv


def setup():
	ld.setup()

def led(status,piso):
        
	ld.led(status,piso)

def servoPuerta():
	sv.servoPuerta(action)

def servoGaraje():
	sv.servoGarake(action)

