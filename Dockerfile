FROM ubuntu:21.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get -y install software-properties-common && add-apt-repository ppa:ondrej/php \
&& php7.4 php7.4-common php7.4-opcache php7.4-cli php7.4-gd php7.4-curl php7.4-mysql php7.4-soap php7.4-xml php7.4-simplexml pwgen php7.4-zip php7.4-mbstring wget unzip gcc \
&& apt-get install -y git curl php7.4-dev && curl -sS https://getcomposer.org/installer -o composer-setup.php \
&& php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
&& apt-get install -y vim php7.4-xdebug php7.4-mongodb \
&& echo "ServerName localhost" >> /etc/apache2/apache2.conf \
&& echo "zend_extension=/usr/lib/php/20160303/xdebug.so" > /etc/php/7.4/apache2/conf.d/xdebug.ini\ 
&& echo 'xdebug.mode="debug"' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.client_port=9005' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.start_with_request=yes' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.client_host=host.docker.internal' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.idekey="VSCODE"' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.log=/tmp/xdebug_remote.log' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf


EXPOSE 80
EXPOSE 443
EXPOSE 9005

CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]