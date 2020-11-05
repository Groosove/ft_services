# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/05 16:53:12 by flavon            #+#    #+#              #
#    Updated: 2020/11/05 17:01:01 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	alpine:3.7

EXPOSE  21

RUN		apk update
RUN		apk add vsftpd openrc openssl
RUN		rc-update add vsftpd default

# Create SSL certificate
RUN openssl req -days 365 -newkey rsa:2048  -x509 -sha256 -nodes -out /etc/ssl/certs/certificate.crt \
		-keyout /etc/ssl/certs/key.key -subj '/C=RU/ST=XX/L=XX/O=XX/OU=XX/CN=born2code'

RUN	echo root:root | chpasswd

COPY srcs/vsftpd.conf  /etc/vsftpd/vsftpd.conf

CMD	vsftpd /etc/vsftpd/vsftpd.conf