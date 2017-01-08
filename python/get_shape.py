import cv2
from sys import argv

src_path = argv[1]
index = int(argv[2])

src = cv2.imread(src_path,1)

print src.shape[index]








