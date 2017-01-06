import cv2
from sys import argv

file_path = argv[1]
save_path = argv[2]
resize_x = int(argv[3])
resize_y = int(argv[4])

src = cv2.imread(file_path,1)
dst = cv2.resize(src,(resize_x,resize_y))

if cv2.imwrite(save_path,dst):
	print 'resize success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '




