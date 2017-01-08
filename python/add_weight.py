import cv2
from sys import argv

src1_path = argv[1]
dst_path = argv[2]
src2_path = argv[3]
weight = float(argv[4])

print weight

src1 = cv2.imread(src1_path,1)
src2 = cv2.imread(src2_path,1)

print src1.shape[0],src1.shape[1],src1.shape[2]
print src2.shape[0],src2.shape[1],src2.shape[2]

if (src1.shape[0] != src2.shape[0]) or (src1.shape[1] != src2.shape[1]):
	print 'The two pic size do not match,'
	print 'So the second pic was force resized to match the first'
	src2 = cv2.resize(src2,(src1.shape[0],src1.shape[1]))

dst=cv2.addWeighted(src1, weight, src2, 1-weight, 0)

if cv2.imwrite(dst_path,dst):
	print 'add success!'
else:
	print 'cv2.imwrite() fail, please confirm executor has write permission to save_path '





