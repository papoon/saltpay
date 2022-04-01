FROM ubuntu:20.10

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get -y install software-properties-common && add-apt-repository ppa:ondrej/php \
&& apt-get -y install php7.4 php7.4-common php7.4-opcache php7.4-cli php7.4-gd php7.4-curl php7.4-mysql php7.4-xml php7.4-simplexml pwgen php7.4-zip php7.4-mbstring wget unzip gcc \
&& apt-get install -y git curl php7.4-dev && curl -sS https://getcomposer.org/installer -o composer-setup.php \
&& php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
&& apt-get update -y && apt-get install -y vim php7.4-xdebug \
&& echo "zend_extension=/usr/lib/php/20160303/xdebug.so" > /etc/php/7.4/apache2/conf.d/xdebug.ini\ 
&& echo 'xdebug.default_enable=1' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.remote_enable=1' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.show_error_trace=1' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.trace_output_dir=/tmp/xdebug/' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.remote_handler=dbgp' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\ 
&& echo 'xdebug.remote_port=9099' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.remote_autostart=1' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.remote_connect_back=0' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.remote_host=192.168.65.2' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.idekey="VSCODE"' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& echo 'xdebug.remote_log=/tmp/xdebug_remote.log' >> /etc/php/7.4/apache2/conf.d/xdebug.ini\
&& sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf


EXPOSE 80
EXPOSE 443
EXPOSE 9099

CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]