# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/05 16:53:12 by flavon            #+#    #+#              #
#    Updated: 2020/11/17 01:07:22 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:3.7
EXPOSE 21

RUN apk update
RUN apk add vsftpd openssl openrc

COPY srcs/vsftpd.conf /etc/vsftpd/vsftpd.conf

RUN mkdir -p /var/log/ftp && touch /var/log/ftp/xferlog

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/key.key \
    -out /etc/ssl/certs/crt.crt -subj "/C=RU/ST=Kazan/L=Kazan/O=21/OU=School/CN=localhost"

RUN echo 'root:root' | chpasswd

ENTRYPOINT vsftpd /etc/vsftpd/vsftpd.conf