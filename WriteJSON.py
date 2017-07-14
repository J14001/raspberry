import json
import time
import serial
cnt = 1

dict = {}

s = serial.Serial('/dev/ttyACM0',9600)
time.sleep(2)
for num in range(50):
	str = s.read(5)
	dict[cnt] = int(str)
	cnt += 1
print dict

f = open('data.json','w')
json.dump(dict,f,indent=4)
