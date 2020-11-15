# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/05 16:53:12 by flavon            #+#    #+#              #
#    Updated: 2020/11/16 01:25:14 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #


FROM alpine:latest
EXPOSE 20 21

COPY ./srcs/vsftpd.conf /etc/vsftpd/vsftpd.conf

RUN apk update
RUN apk add vsftpd openssl openrc

# Create logs
RUN mkdir -p /var/log/ftp 
RUN touch /var/log/ftp/xferlog

# Create SSL certificate
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/key.key \
    -out /etc/ssl/certs/crt.crt -subj "/C=RU/ST=Kazan/L=Kazan/O=21/OU=school/CN=localhost"

# Create new user
RUN echo 'root:root' | chpasswd

ENTRYPOINT vsftpd /etc/vsftpd/vsftpd.conf