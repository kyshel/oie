import cv2
from sys import argv

file_path = argv[1]
save_path = argv[2]


img = cv2.imread(file_path,0)
laplacian = cv2.Laplacian(img,cv2.CV_64F)

if cv2.imwrite(save_path,laplacian):
	print 'laplacian success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '

