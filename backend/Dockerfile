FROM centos:7.6.1810



RUN yum -y install openssl
RUN rpm -ivh http://nginx.org/packages/centos/7/x86_64/RPMS/nginx-1.16.0-1.el7.ngx.x86_64.rpm \
    && yum -y install nginx \
    && nginx -v
COPY docker/default.conf /etc/nginx/conf.d/default.conf



RUN yum -y install autoconf automake unzip
RUN rpm -ivh http://download-ib01.fedoraproject.org/pub/epel/7/x86_64/Packages/o/oniguruma-5.9.5-3.el7.x86_64.rpm \
    && rpm -ivh http://download-ib01.fedoraproject.org/pub/epel/7/x86_64/Packages/l/libargon2-20161029-3.el7.x86_64.rpm \
    && yum -y install oniguruma libargon2 libedit libxslt

RUN rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-common-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-cli-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-fpm-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-json-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-mbstring-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-pdo-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-mysqlnd-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-process-7.2.14-1.ius.centos7.x86_64.rpm \
    && rpm -ivh https://dl.iuscommunity.org/pub/ius/archive/CentOS/7/x86_64/php72u-xml-7.2.14-1.ius.centos7.x86_64.rpm \
    && yum -y install php72u-common php72u-cli php72u-fpm php72u-json php72u-mbstring php72u-pdo php72u-pdo_mysql php72u-process php72u-xml \
    && php-fpm -v

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin --version=1.7.3



EXPOSE 80
CMD php-fpm -D && nginx -g "daemon off;"
