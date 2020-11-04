# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/04 19:58:43 by flavon            #+#    #+#              #
#    Updated: 2020/11/04 22:21:49 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest

RUN apk add openrc mysql mysql-client

COPY	./srcs/my.cnf	/etc/mysql/
COPY	./srcs/setup.sh ./
RUN		rc default
RUN		/etc/init.d/mariadb setup
RUN		rc-service mariadb start

RUN		echo "create database wordpress;" | mysql
RUN 	echo "grant all on *.* to admin@'%' identified by 'admin' with grant option; flush privileges;" | mysql

# RUN		msql wordpress < wordpress.sql

RUN		rc-service mariadb stop
RUN		/usr/bin/mysqld_safe	--datadir="/var/lib/mysql/"
		
VOLUME ["/var/lib/mysql"]

EXPOSE 3306

ENTRYPOINT ./setup.sh