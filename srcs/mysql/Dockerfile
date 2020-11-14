# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/04 19:58:43 by flavon            #+#    #+#              #
#    Updated: 2020/11/05 17:23:44 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest

RUN apk add openrc mysql mysql-client

VOLUME ["/var/lib"]

COPY	./srcs/my.cnf	/etc/mysql/
COPY	./srcs/setup.sh ./

RUN		chmod +x ./setup.sh

EXPOSE 3306

ENTRYPOINT ./setup.sh