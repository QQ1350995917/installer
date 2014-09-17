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
htpassword -cd /usr/local/bin/gerrit/gerrit/gerrit.password your-admin-name

启用这几个模块
    LoadModule proxy_module modules/mod_proxy.so
    LoadModule proxy_ajp_module modules/mod_proxy_ajp.so
    LoadModule proxy_balancer_module modules/mod_proxy_balancer.so
    LoadModule proxy_connect_module modules/mod_proxy_connect.so
    LoadModule proxy_ftp_module modules/mod_proxy_ftp.so
    LoadModule proxy_http_module modules/mod_proxy_http.so
    
     启用模块   sudo a2enmod <model>  
    禁用模块   sudo a2dismod <model>  

    上面提到的几个启动模块命令如下
    sudo a2enmod proxy
    sudo a2enmod proxy_ajp
    sudo a2enmod proxy_balancer
    等等
    
    /etc/apache2/sites-available/ 目录中建立一个文件 test01

<VirtualHost *:80>
ServerName www.test01.com
ServerAlias test01.com
ProxyPreserveHost On
ProxyRequests Off
<Proxy *>
Order deny,allow
Allow from all
</Proxy>
ProxyPass / http://192.168.0.15:9000/
ProxyPassReverse / http://192.168.0.15:9000/
</VirtualHost>


然后执行 启用这个站点 
sudo a2ensite test01
service apache2 reload

/etc/apache2/sites-available/ 目录中建立一个文件 test02

<VirtualHost *:80>
ServerName www.test02.com.cn
ServerAlias test02.com.cn
ProxyPreserveHost On
ProxyRequests Off
<Proxy *>
Order deny,allow
Allow from all
</Proxy>
ProxyPass / http://192.168.0.11:81/
ProxyPassReverse / http://192.168.0.11:81/
</VirtualHost>

然后执行 启用这个站点
sudo a2ensite test02
service apache2 reload

修改C:\WINDOWS\system32\drivers\etc\hosts进行测试
192.168.0.4       test01.com
192.168.0.4       test02.com.cn

关闭一个虚拟站点
sudo a2dissite test01  
sudo a2dissite test02
 
04)Ubuntu的/etc/apache2目录解释：

    apache2.conf 核心配置文件，一般不需要修改！
    conf.d 目录，里面包含了一些字符集设置，文档等设置！
    dav_svn.authz 和dav_svn.passwd 是前面做SVN时，相关权限、密码文件。
    envvars 定义了运行时的用户身份——www-data。
    httpd.conf 是Apache留给我们自己折腾的配置文件，默认为空。apache2.conf 会加载这个文件。
    ports.conf 端口默认配置。apache2.conf 会加载这个文件。
    magic 为mod_mime_magic模块服务。
    mods-enabled 和mods-available mods-enabled 会被apache2.conf 加载，里面包含*.load和*.conf文件。*.load文件中是加载相应的模块（位于/usr/lib/apache2/modules/ 中），而*.conf中是对应的基本配置。但这些文件其实都是链接到mods-available 中相应的文件上。当我们通过a2enmod 操作时，实际上正是操作了这些软链接。
    sites-available 和sites-enabled 与 mods-enabled 和mods-available 的关系类似，只是其中包含的是站点内容。

05)Ubuntu的Apache的配置文件解释：

    Apache在启动时会自动读取/etc/apache2/apache2.conf的配置信息。
    而其他的一些配置文件,则是通过Include指令包含进来
    在apache2.conf中可以找到这些Include行：

        # Include module configuration: 
        Include /etc/apache2/mods-enabled/*.load
        Include /etc/apache2/mods-enabled/*.conf
         
        # Include all the user configurations:
        Include /etc/apache2/httpd.conf
         
        # Include ports listing
        Include /etc/apache2/ports.conf

        # Include generic snippets of statements
        Include /etc/apache2/conf.d/
         
        # Include the virtual host configurations:
        Include /etc/apache2/sites-enabled/






06)配置错误：
    apache2"NameVirtualHost *:80 has no VirtualHosts" 
     
    对于同一主机支持多个虚拟主机的情况，只需要命名一次NameVirtualHost，如果在每个虚拟主机配置文件中都加上NameVirtualHost *:80 ，则会报这个警告。




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
