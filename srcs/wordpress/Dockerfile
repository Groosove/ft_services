# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/10/24 12:14:43 by flavon            #+#    #+#              #
#    Updated: 2020/11/16 14:55:54 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest
EXPOSE 5050

RUN apk update
RUN apk add openrc nginx supervisor mysql mysql-client php7 php7-fpm php7-json php7-mysqli
RUN	rc-update add php-fpm7 default

RUN	mkdir -p /run/nginx
RUN	mkdir -p /var/run/php

COPY srcs/nginx.conf		/etc/nginx/conf.d/wordpress.conf
COPY srcs/supervisord.conf	/etc/supervisord.conf

RUN	sed -i 's/;daemonize = yes/daemonize = no/g' /etc/php7/php-fpm.conf
RUN	sed -it 's/;   extension=mysql.so/extension=mysql.so/g' /etc/php7/php.ini

RUN	wget https://wordpress.org/latest.tar.gz && tar -xf latest.tar.gz && rm -rf latest.tar.gz && mv wordpress /var/www/wordpress

CMD	["usr/bin/supervisord", "-c", "/etc/supervisord.conf"]