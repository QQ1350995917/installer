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


    配置Gerrit使用mysql数据库
    使用http授权模式，使用apache反向代理。
    SMTP使用个人邮箱
    软件版本
    Ubuntu 12.04
    Gerrit 2.4.1
    Apache 2.2.22
    Mysql 5.5.24
    安装mysql和apache2
    配置数据库：
    CREATE USER 'gerrit'@'localhost' IDENTIFIED BY 'gerrit';
    CREATE DATABASE reviewdb;
    ALTER DATABASE reviewdb charset=utf8;
    GRANT ALL ON reviewdb.* TO 'gerrit'@'localhost';
    FLUSH PRIVILEGES;
    
    gerrit对中文的支持确实不好。
    安装Gerrit
    java -jar gerrit-$version-rc1.war init -d gerrit
    然后一路回车就行，然后修改配置文件。
    vim gerrit/etc/gerrit.config
    [gerrit]
    basePath = git
    canonicalWebUrl = 192.168.1.254:8081
    [database]
    type = MYSQL
    hostname = localhost
    database = reviewdb
    username = gerrit2
    [auth]
    type = HTTP
    [sendemail]
    smtpServer = smtp.163.com
    smtpUser = wangconglin87@163.com
    from = wangconglin87@163.com
    [container]
    user = gerrit2
    javaHome = /opt/jdk1.7.0_05/jre
    [sshd]
    listenAddress = 192.168.1.254:29418
    [httpd]
    listenUrl = proxy-http://192.168.1.254:8081
    [cache]
    directory = cache
    然后vi review_sit/etc/gerrit.config,下面的mima代表你的密码
    [database]
    password = mima  //数据库用户gerrit2的密码
    [sendemail]
    smtpPass = mima  //你邮箱的密码
    然后配置apche
将/etc/apache2/sites-enabled目录下的文件都删除，（我是全新安装的）。
为什么删除，因为当我安装资料配置好以后，出现有时候能正常运行，有时候不能运行。让我郁闷了很长时间。这里面有一个默认的虚拟主机。
    然后再/etc/apache2/sites-enabled目录下，vi proxy-gerrit,然后输入：
    ServerName a.wangconglin.cn
    ProxyRequests Off
    ProxyVia Off
    ProxyPreserveHost On
    Order deny,allow
    Allow from all
    AuthType Basic
    AuthName “Gerrit Code Review”
    Require valid-user
    AuthBasicProvider file
    AuthUserFile /home/gerrit2/passwords
    ProxyPass / http://192.168.1.254:8081/
    ProxyPassReverse / http://192.168.1.254:8081/
    上面的AuthUserFile /home/gerrit2/passwords,生成示例命令如下：
    htpassword /home/gerrit2/passwords [username]
    运行Gerrit:
    /home/gerrit2/review_site/bin/gerrit.sh start -d /home/gerrit2/review_site
    使用git push前，gerrit不允许直接覆盖git代码库中的任何分支，而是将变更推送到另一个refspce中。
    git config remote.origin.push refs/heads/*:refs/for/*
    git push origin
