import cv2
from sys import argv

file_path = argv[1]
save_path = argv[2]
angle = int(argv[3])

src = cv2.imread(file_path,1)
src_gray=cv2.imread(file_path,0)

rows,cols = src_gray.shape
M = cv2.getRotationMatrix2D((cols/2,rows/2),angle,1)

#print M


dst = cv2.warpAffine(src,M,src_gray.shape,flags=cv2.INTER_LINEAR)

if cv2.imwrite(save_path,dst):
	print 'rotate success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '
