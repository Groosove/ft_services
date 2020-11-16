# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/04 19:58:43 by flavon            #+#    #+#              #
#    Updated: 2020/11/17 00:09:36 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest
EXPOSE 3306

RUN apk add openrc mysql mysql-client

COPY	./srcs/my.cnf	/etc/mysql/
COPY	./srcs/setup.sh ./
COPY	./srcs/wordpress.sql ./

VOLUME ["/var/lib"]

ENTRYPOINT ./setup.sh