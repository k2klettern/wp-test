FROM ubuntu:18.04
MAINTAINER K2klettern <k2klettern@gmail.com>
RUN apt-get -qq update && apt-get install -y apache2 && apt-get clean && rm -rf /var/lib/apt/lists/*
ENV APACHE_RUN_USER  www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR   /var/log/apache2
ENV APACHE_PID_FILE  /var/run/apache2/apache2.pid
ENV APACHE_RUN_DIR   /var/run/apache2
ENV APACHE_LOCK_DIR  /var/lock/apache2
ENV APACHE_LOG_DIR   /var/log/apache2
RUN mkdir -p $APACHE_RUN_DIR
RUN mkdir -p $APACHE_LOCK_DIR
RUN mkdir -p $APACHE_LOG_DIR
RUN mkdir /var/www/html/test
COPY . /var/www/html
RUN mysql -u root /var/www/html/SQL_SCRIPTS > wordpress
RUN mkdir /var/www/html/test/test_output
RUN apt-get -qq update && apt-get -y install wget
RUN wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
RUN dpkg -i --force-all google-chrome-stable_current_amd64.deb; exit 0
RUN apt-get -qq update && apt-get -y install -f
RUN apt-get -qq update && apt-get install -y nodejs && apt-get install -y build-essential && apt-get install -y npm
RUN npm install nightwatch -g
WORKDIR /var/www/html/test
RUN npm install chromedriver --save-dev
RUN npm install geckodriver --save-dev
RUN npm update
EXPOSE 80
CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]
