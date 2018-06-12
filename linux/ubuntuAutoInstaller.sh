# 更新源
apt-get update
# 安装基础设施
# install gcc
apt-get install -y gcc

# install make 
apt-get install -y make

# install zip
apt-get install -y zip
apt-get install -y unzip

# 安装应用组件
############################ java jdk ##########################
# java
cd /usr/local/bin/
mkdir java
cd java/
curl -o jdk.tar.gz http://download.oracle.com/otn-pub/java/jdk/8u171-b11/512cd62ec5174c3487ac17c61aaa89e8/jdk-8u171-linux-x64.tar.gz?AuthParam=1528526553_9b1f5c0f01831b7405b118ad0360f4cc
tar -zxvf jdk.tar.gz
mkdir jdktemp
ln -s jdktemp jdk
# config jdk path
echo "# setting jdk home" >> /etc/profile
echo "export JAVA_HOME=/usr/local/bin/java/jdk" >> /etc/profile
echo "export CLASSPATH=.:\$JAVA_HOME/jre/lib/rt.jar:\$JAVA_HOME/lib/dt.jar:\$JAVA_HOME/lib/tools.jar" >> /etc/profile
echo "export PATH=\$PATH:\$JAVA_HOME/bin" >> /etc/profile
source /etc/profile

############################ gradle ##########################
# gradle
cd /usr/local/bin/
mkdir gradle
cd gradle/
curl -o gradle-4.8-all.zip https://downloads.gradle.org/distributions/gradle-4.8-all.zip?_ga=2.201550289.1581406381.1528526958-1111234566.1497929313
unzip gradle-4.8-all.zip 
ln -s gradle-4.8 gradle
# config gradle path
echo "# setting gradle home" >> /etc/profile
echo "export GRADLE_HOME=/usr/local/bin/gradle/gradle" >> /etc/profile
echo "export PATH=\$PATH:\$GRADLE_HOME/bin" >> /etc/profile
source /etc/profile

############################ maven ##########################
# maven
cd /usr/local/bin/
mkdir maven
cd maven/
wget http://mirror.bit.edu.cn/apache/maven/maven-3/3.5.3/binaries/apache-maven-3.5.3-bin.tar.gz
tar -zxvf apache-maven-3.5.3-bin.tar.gz
ln -s apache-maven-3.5.3 maven
# config maven path
echo "# setting maven home" >> /etc/profile
echo "export MAVEN_HOME=/usr/local/bin/maven/maven" >> /etc/profile
echo "export PATH=\$PATH:\$MAVEN_HOME/bin" >> /etc/profile
source /etc/profile

############################ apache ##########################
# apache



############################ tomcat ##########################
# tomcat
cd /usr/local/bin/
mkdir tomcat
cd tomcat/
wget http://mirrors.hust.edu.cn/apache/tomcat/tomcat-9/v9.0.8/bin/apache-tomcat-9.0.8.tar.gz
tar -zxvf apache-tomcat-9.0.8.tar.gz
ln -s apache-tomcat-9.0.8 tomcat
# config maven path
echo "# setting tomcat home" >> /etc/profile
echo "export TOMCAT_HOME=/usr/local/bin/tomcat/tomcat" >> /etc/profile
echo "export PATH=\$PATH:\$TOMCAT_HOME/bin" >> /etc/profile
source /etc/profile


############################ python ##########################
# python
cd /usr/local/bin/
mkdir python
cd python/
wget 
############################ vertx ##########################
# vertx
cd /usr/local/bin/
mkdir vertx
cd vertx/
curl -o vert.x-3.5.2-full.zip https://akamai.bintray.com/33/331fcc3cbb5b2241a412761127d4d2742b1bfa7029c3d29a24121ffbaaa896f5?__gda__=exp=1528711116~hmac=2a8fdc1f6b257e0eb0145700f161adf70126c13732d69a316054b30ae926fa2d&response-content-disposition=attachment%3Bfilename%3D%22vert.x-3.5.2-full.zip%22&response-content-type=application%2Fzip&requestInfo=U2FsdGVkX19Qn1_9A2jORNCQ7Kso6vAhP4BhnKWlUhUpQekU9kyMq1VZlROQMXuEfBpqIMrgmeUU5v9isUZzdI2DlXRDO0TXj-L2KAy0O1A7FbwTI3pysprZwgxPAO3NO0t55PZIV1rWrd4WcWU-EZu9s4s1lSzFu-v0V50zAvc&response-X-Checksum-Sha1=828ffab12b4f10d4036597cac3602b0eece5f952&response-X-Checksum-Sha2=331fcc3cbb5b2241a412761127d4d2742b1bfa7029c3d29a24121ffbaaa896f5
unzip vert.x-3.5.2-full.zip 
# config maven path
echo "# setting vertx home" >> /etc/profile
echo "export VERTX_HOME=/usr/local/bin/vertx/vertx" >> /etc/profile
echo "export PATH=\$PATH:\$VERTX_HOME/bin" >> /etc/profile
source /etc/profile

# phpadmin
cd /usr/local/bin/
mkdir phpadmin
cd phpadmin/
wget https://files.phpmyadmin.net/phpMyAdmin/4.8.1/phpMyAdmin-4.8.1-all-languages.zip
unzip phpMyAdmin-4.8.1-all-languages.zip
ln -s phpMyAdmin-4.8.1-all-languages phpadmin

############################ gitlab ##########################
# gitlab   https://about.gitlab.com/installation/#ubuntu
cd /usr/local/bin/
mkdir gitlab
cd gitlab/
apt-get update
apt-get install -y curl openssh-server ca-certificates
apt-get install -y postfix
curl https://packages.gitlab.com/install/repositories/gitlab/gitlab-ee/script.deb.sh | bash 
EXTERNAL_URL="http://localhost" apt-get install gitlab-ee 

# JForg Artifact
# Disconf
# jenkins
# LDAP
# MongoDB

############################ elastic ##########################
# elastic
cd /usr/local/bin
mkdir elasticsearch
cd elasticsearch/
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-6.2.4.zip
unzip elasticsearch-6.2.4.zip
ln -s elasticsearch-6.2.4 elasticsearch

############################ mysql ##########################
# mysql
cd /usr/local/bin
mkdir mysql
cd mysql/
wget https://repo.mysql.com//mysql-apt-config_0.8.10-1_all.deb
dpkg -i mysql-apt-config_0.8.10-1_all.deb
# select 8.0 and press ok 
apt update
apt-get install mysql-server
# input the password of root 
# select and pres "Use Legacy Authentication Method (Retain MySQL 5.x Compatibility) "

# apt isntall mysql-client
# apt install libmysqlclient-dev


