# install gcc
apt-get install -y gcc

# install make 
apt-get install -y make

# install zip
apt-get install -y zip

# install jdk
cd /usr/local/bin/
mkdir java
cd java/
wget --no-check-certificate --no-cookies --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/8u11-b12/jdk-8u11-linux-x64.tar.gz
tar -zxvf jdk-8u11-linux-x64.tar.gz
ln -s jdk1.8.0_11 jdk
# config jdk path
echo "# setting jdk home" >> /etc/profile
echo "export JAVA_HOME=/usr/local/bin/java/jdk" >> /etc/profile
echo "export CLASSPATH=.:\$JAVA_HOME/jre/lib/rt.jar:\$JAVA_HOME/lib/dt.jar:\$JAVA_HOME/lib/tools.jar" >> /etc/profile
echo "export PATH=\$PATH:\$JAVA_HOME/bin" >> /etc/profile
source /etc/profile
 
# install maven
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

# install gradle
cd /usr/local/bin/
mkdir gradle
cd gradle/
wget  wget https://services.gradle.org/distributions/gradle-2.0-bin.zip
unzip gradle-2.0-bin.zip 
ln -s gradle-2.0 gradle
# config gradle path
echo "# setting gradle home" >> /etc/profile
echo "export GRADLE_HOME=/usr/local/bin/gradle/gradle" >> /etc/profile
echo "export PATH=\$PATH:\$GRADLE_HOME/bin" >> /etc/profile
source /etc/profile


# install git
apt-get install -y git

# install tomcat 
cd /usr/local/bin/
mkdir tomcat
cd tomcat/
wget http://mirrors.hust.edu.cn/apache/tomcat/tomcat-8/v8.0.9/bin/apache-tomcat-8.0.9.tar.gz
tar -zxvf apache-tomcat-8.0.9.tar.gz
ln -s apache-tomcat-8.0.9 tomcat
cd tomcat/conf/
rm server.xml
wget https://gist.githubusercontent.com/QQ1350995917/74c21365295b8e93f5c9/raw/ccc74c9280c6c0058cf0a67659dd353b4df085fd/server.xml
cd ../webapps/
mkdir app_dingpw
cd app_dingpw/
git clone https://github.com/QQ1350995917/www.dingpw.com.git
cd ../
mkdir app_json
cd app_json/
git clone https://github.com/QQ1350995917/webJsonEdit.git
cd ../../bin/
sh startup.sh

# install vert.x
cd /usr/local/bin/
mkdir vertx
cd vertx/
wget http://dl.bintray.com/vertx/downloads/vert.x-2.1.2.tar.gz
tar -zxvf vert.x-2.1.2.tar.gz 
ln -s vert.x-2.1.2 vertx
cd vertx/
# config vertx path
echo "# setting vertx home" >> /etc/profile
echo "export VERTX_HOME=/usr/local/bin/vertx/vertx" >> /etc/profile
echo "export PATH=\$PATH:\$VERTX_HOME/bin" >> /etc/profile
source /etc/profile

# install python
cd /usr/local/bin/
mkdir python
cd python/
wget https://www.python.org/ftp/python/3.4.1/Python-3.4.1.tgz
tar -xzf Python-3.4.1.tgz
ln -s Python-3.4.1 python
cd python/
./configure --prefix=${pwd}
make
make install
#  config python path
echo "# setting python home" >> /etc/profile
echo "export PYTHON_HOME=/usr/local/bin/python/python" >> /etc/profile
echo "export PATH=\$PATH:\$PYTHON_HOME" >> /etc/profile
source /etc/profile

# install idea
cd /usr/local/bin/
mdkir idea
cd idea/
wget http://download-cf.jetbrains.com/idea/ideaIU-13.1.4b.tar.gz
tar -zxvf ideaIU-13.1.4b.tar.gz
ln -s idea-IU-135.1230 idea
# config idea path
echo "# setting idea home" >> /etc/profile
echo "export IDEA_HOME=/usr/local/bin/idea/idea" >> /etc/profile
echo "export PATH=\$PATH:\$IDEA_HOME/bin" >> /etc/profile
source /etc/profile

# install dotproject 
cd /usr/local/bin
mkdir dotproject
cd dotproject/
wget 

# install phpadmin
cd /usr/local/bin/
mkdir phpadmin
cd phpadmin/
wget http://softlayer-sng.dl.sourceforge.net/project/phpmyadmin/phpMyAdmin/4.2.7.1/phpMyAdmin-4.2.7.1-all-languages.zip
unzip phpMyAdmin-4.2.7.1-all-languages.zip
ln -s phpMyAdmin-4.2.7.1-all-languages phpadmin



# install android sdk
cd /usr/local/bin/
mdkir android
cd android/
wget http://dl.google.com/android/android-sdk_r23.0.2-linux.tgz
echo "# setting android home" >> /etc/profile
echo "export ANDROID_HOME=/usr/local/bin/android/android-sdk-macosx" >> /etc/profile
echo "export PATH=$PATH:$ANDROID_HOME/bin:$ANDROID_HOME/tools:$ANDROID_HOME/platform-tools" >> /etc/profile
source /etc/profile


# run push listener service
cd /usr/local/bin/
wget https://gist.githubusercontent.com/QQ1350995917/e6eab2e886ed2f4d6eac/raw/66227462e95d24a7a022a9ca6868738bb3f30299/PushListener.java
vertx run PushListener.java
