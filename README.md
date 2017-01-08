# Oie
Oie is an Online Image Editor.

## Introduction
Oie is based B/S architechture, browser as GUI, Python-OpenCV as core processor, PHP connect front-end and back-end.

Oie is still on developing, to see the progress, check [releases](https://github.com/kyshel/oie/releases).



## Require
Develop Enviroment: CentOS7, Apache 2.4.6, PHP 5.4.16, Python 2.7.5, OpenCV 2.4.5

Deploy from a minimal CentOS7 installation:

1. `yum install httpd php numpy opencv*`
2. `service httpd start`
3. `firewall-cmd --permanent --zone=public --add-service=http && firewall-cmd --reload`
4. `cd /var/www/html && git clone https://github.com/kyshel/oie.git`
5. `cd oie && chown apache:apache upload/ processed/ python/*.py`
6. Open your client broswer, input `your.server.address/ioe` 



## Optional Dependencies
- GTK support for GUI features: `yum install gtk2-devel tkinter`


## Credits
Made with ❤ by [kyshel](http://github.com/kyshel)  