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
wget http://mirror.nus.edu.sg/apache/maven/maven-3/3.2.2/binaries/apache-maven-3.2.2-bin.tar.gz
tar -zxvf apache-maven-3.2.2-bin.tar.gz
ln -s apache-maven-3.2.2 maven
# config maven path
echo "# setting maven home" >> /etc/profile
echo "export MAVEN_HOME=/usr/local/bin/maven/maven" >> /etc/profile
echo "export PATH=\$PATH:\$MAVEN_HOME/bin" >> /etc/profile
source /etc/profile

############################ apache ##########################
# apache

# tomcat
# python
# vertx
# phpadmin
# gitlab
# JForg Artifact
# Disconf
# jenkins
# LDAP
# mysql
# MongoDB
# elastic
