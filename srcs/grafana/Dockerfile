# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/10 19:35:26 by flavon            #+#    #+#              #
#    Updated: 2020/11/10 19:37:28 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	alpine:latest
EXPOSE	3000

# COPY	./srcs/grafana.db	/grafana-7.3.1/data/grafana.db

RUN	wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.32-r0/glibc-2.32-r0.apk
RUN	apk update
RUN	apk add ca-certificates glibc-2.32-r0.apk

RUN	wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub  

RUN	wget https://dl.grafana.com/oss/release/grafana-7.3.1.linux-amd64.tar.gz && \
	tar -zxvf grafana-7.3.1.linux-amd64.tar.gz -C . && rm -rf grafana-7.3.1.linux-amd64.tar.gz

WORKDIR	./grafana-7.3.1/bin

CMD		["./grafana-server"]