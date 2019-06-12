FROM centos:7.6.1810



RUN curl --silent --location https://rpm.nodesource.com/setup_10.x | bash - \
    && yum -y install nodejs

RUN yum -y install bzip2
RUN npm config set unsafe-perm=true \
    && npm config set strict-ssl false



WORKDIR /var/www/html
CMD npm run serve
