# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/05 16:53:12 by flavon            #+#    #+#              #
#    Updated: 2020/11/14 14:32:31 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	alpine:latest

RUN	apk update && apk add openssl vsftpd openrc
	
RUN  openssl req -days 365 -newkey rsa:2048 -x509 -sha256 -nodes -out /etc/vsftpd/vsftpd.pem \
    	-keyout /etc/vsftpd/vsftpd.pem -subj '/C=RU/ST=XX/L=XX/O=XX/OU=XX/CN=flavon' 

RUN echo 'root:root' | chpasswd 
RUN mkdir -p /var/log/ftp && touch /var/log/ftp/xferlog
RUN rc default

VOLUME	["sys/fs/cgroup"]

EXPOSE 21

COPY	srcs/vsftpd.conf		/etc/vsftpd/vsftpd.conf

ENTRYPOINT	vsftpd /etc/vsftpd/vsftpd.conf