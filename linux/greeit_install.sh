mysql -u xxx -p
  CREATE USER 'gerrit'@'localhost' IDENTIFIED BY 'gerrit';
  CREATE DATABASE reviewdb;
  ALTER DATABASE reviewdb charset=utf8;
  GRANT ALL ON reviewdb.* TO 'gerrit'@'localhost';
  FLUSH PRIVILEGES;

cd /usr/local/bin/
mkdir gerrit
cd gerrit/
wget http://gerrit-releases.storage.googleapis.com/gerrit-2.9-rc2.war
java -jar gerrit-2.9-rc2.war init -d gerrit
