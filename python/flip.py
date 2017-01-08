import cv2
from sys import argv

src_path = argv[1]
dst_path = argv[2]
flip_code = int(argv[3])

src = cv2.imread(src_path,1)
dst = cv2.flip(src, flip_code)

if cv2.imwrite(dst_path,dst):
	print 'flip success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '







