# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/10 19:22:50 by flavon            #+#    #+#              #
#    Updated: 2020/11/16 21:32:28 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #


FROM    alpine:latest
EXPOSE  8086

RUN     apk update
RUN     apk add supervisor ca-certificates influxdb

RUN     mkdir -p /run/influxdb
RUN		wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub  
COPY   ./srcs/supervisord.conf   /etc/

# Download Glibc (C - library)
RUN     wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.32-r0/glibc-2.32-r0.apk
RUN     apk add glibc-2.32-r0.apk
RUN     mkdir -p /var/lib/influxdb

# Download telegraf
RUN     wget https://dl.influxdata.com/telegraf/releases/telegraf-1.16.1_linux_amd64.tar.gz && \
		tar -xzvf telegraf-1.16.1_linux_amd64.tar.gz --strip-components 1 -C ./ && \
		cp -r /telegraf-1.16.1/* / && rm -rf telegraf-1.16.1_linux_amd64.tar.gz

# Install influxdb
RUN		./usr/bin/telegraf -sample-config --input-filter docker --output-filter influxdb > /etc/telegraf/telegraf.conf

VOLUME	["var/lib/influxdb"]

CMD		["/usr/bin/supervisord"]


