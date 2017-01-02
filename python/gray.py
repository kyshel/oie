import cv2
from sys import argv

file_path = argv[1]
save_path = argv[2]

src = cv2.imread(file_path,0)

if cv2.imwrite(save_path,src):
	print 'gray success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '




