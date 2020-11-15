# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/04 20:11:50 by flavon            #+#    #+#              #
#    Updated: 2020/11/16 01:28:47 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest
EXPOSE 5000

RUN		apk add openrc openssl supervisor nginx
RUN		apk add php7 php7-fpm php7-iconv php7-json php7-mbstring php7-mysqli php7-phar php7-session
RUN		rc-update add php-fpm7 default

RUN		mkdir -p /run/nginx
RUN		mkdir -p /var/run/php

RUN		sed -i 's/;daemonize = yes/daemonize = no/g' /etc/php7/php-fpm.conf
RUN		sed -i 's/;   extension=msql.so/extension=mysqli.so/g' /etc/php7/php.ini

COPY ./srcs/phpmyadmin.conf /etc/nginx/conf.d/phpmyadmin.conf
COPY ./srcs/supervisord.conf /etc/supervisord.conf
COPY ./srcs/config.inc.php		/var/www/phpmyadmin/config.inc.php

RUN	wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-english.tar.gz
RUN	tar	-xf phpMyAdmin-5.0.2-english.tar.gz && mv phpMyAdmin-5.0.2-english var/www/phpmyadmin && \
	rm -rf phpMyAdmin-5.0.2-english.tar.gz && rm -rf /etc/nginx/conf.d/default.conf

CMD	["usr/bin/supervisord", "-c", "/etc/supervisord.conf"]k