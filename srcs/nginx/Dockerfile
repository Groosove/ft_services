# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/10/18 14:51:46 by flavon            #+#    #+#              #
#    Updated: 2020/11/17 00:50:15 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine:latest
# Port	
EXPOSE 80 443 22

RUN	apk update
RUN apk add openrc openssl nginx supervisor
RUN apk add openssh sudo


# Create for HTML files
RUN mkdir /run/nginx
RUN mkdir /var/run/sshd
RUN rm -rf /etc/nginx/conf.d/default.conf

# Copy nginx config
COPY ./srcs/nginx.conf /etc/nginx/conf.d/
COPY ./srcs/index.html /var/www/
COPY ./srcs/supervisord.conf /etc/supervisord.conf

# Create SSL certificate
RUN openssl req -days 365 -newkey rsa:2048  -x509 -sha256 -nodes -out /etc/ssl/certs/certificate.crt \
		-keyout /etc/ssl/certs/key.key -subj '/C=RU/ST=XX/L=XX/O=XX/OU=XX/CN=born2code'

# Create user in SSH
RUN adduser -D flavon && echo 'flavon:root' | chpasswd && addgroup flavon wheel && echo '%wheel ALL=(ALL) ALL' > /etc/sudoers.d/wheel \
&& /usr/bin/ssh-keygen -A

CMD		["usr/bin/supervisord", "-c", "/etc/supervisord.conf"]