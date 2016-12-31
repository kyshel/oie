import cv2
from sys import argv

file_path = argv[1]
save_path = argv[2]
blur_size = int(argv[3])

img = cv2.imread(file_path,1)
blur = cv2.blur(img,(blur_size,blur_size))

if cv2.imwrite(save_path,blur):
	print 'blur success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '




