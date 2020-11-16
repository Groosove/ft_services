# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/04 20:11:50 by flavon            #+#    #+#              #
#    Updated: 2020/11/16 14:42:52 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest
EXPOSE	5000

RUN apk update && apk upgrade
RUN apk add nginx supervisor openrc php7 php7-fpm php7-iconv php7-json php7-mbstring php7-mysqli php7-phar php7-session
RUN	rc-update add php-fpm7 default

COPY srcs/phpmyadmin.conf /etc/nginx/conf.d/default.conf
COPY srcs/supervisord.conf /etc/supervisord.conf
COPY srcs/config.inc.php /var/www/phpmyadmin/config.inc.php

RUN	mkdir /run/nginx /var/run/php
RUN	mkdir -p /var/www/phpmyadmin /var/www/phpmyadmin/tmp
RUN	chmod +x /var/www/phpmyadmin/tmp

RUN	wget -c https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-english.tar.xz && \
 tar -xvf phpMyAdmin-latest-english.tar.xz --strip-components 1 -C /var/www/phpmyadmin && rm -f phpMyAdmin-latest-english.tar.xz

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]