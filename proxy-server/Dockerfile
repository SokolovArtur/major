FROM centos:7.6.1810



RUN yum -y install openssl
RUN rpm -ivh http://nginx.org/packages/centos/7/x86_64/RPMS/nginx-1.16.0-1.el7.ngx.x86_64.rpm \
    && yum -y install nginx \
    && nginx -v
COPY docker/default.conf /etc/nginx/conf.d/default.conf



EXPOSE 80
CMD nginx -g "daemon off;"
