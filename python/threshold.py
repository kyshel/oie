import cv2
from sys import argv

file_path = argv[1]
save_path = argv[2]
threshold = int(argv[3])
max_val=255

if threshold < 0 && threshold > 255:
	print 'threshold value is invalid'
	import sys
	sys.exit()

src = cv2.imread(file_path,0)
dst = cv2.threshold(src,threshold,max_val,cv2.THRESH_BINARY)


if cv2.imwrite(save_path,dst):
	print 'threshold success! threshold value:' + threshold
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '




