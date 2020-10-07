FROM mysql:8.0
LABEL maintainer="ucan-lab <yes@u-can.pro>"

ENV TZ=UTC \
  MYSQL_DATABASE=blog \
  MYSQL_USER=laravel \
  MYSQL_PASSWORD=laravel \
  MYSQL_ROOT_PASSWORD=laravel

COPY ./my.cnf /etc/my.cnf
