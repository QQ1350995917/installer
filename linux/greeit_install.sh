mysql -u xxx -p
  CREATE USER 'gerrit'@'localhost' IDENTIFIED BY 'gerrit';
  CREATE DATABASE reviewdb;
  ALTER DATABASE reviewdb charset=latin1;
  GRANT ALL ON reviewdb.* TO 'gerrit'@'localhost';
  FLUSH PRIVILEGES;
# 需要注意的是mysql默认安装以后所有字符集都是拉丁1，请不要更改此默认设置，reviewdb改成utf8以后安装gerrit时跑数据库脚本出错，会导致使用过程中会出现一些莫名的错误。  

cd /usr/local/bin/
mkdir gerrit
cd gerrit/
wget http://gerrit-releases.storage.googleapis.com/gerrit-2.9-rc2.war
java -jar gerrit-2.9-rc2.war init -d gerrit

cd gerrit/etc/
rm gerrit.config
wget https://raw.githubusercontent.com/QQ1350995917/installer/master/linux/gerrit.config


# 配置apache2反向代理认证文件
# htpassword -cd /usr/local/bin/gerrit/gerrit/gerrit.gerrit admin

# 启用反响代理模块
# LoadModule proxy_module modules/mod_proxy.so
# LoadModule proxy_ajp_module modules/mod_proxy_ajp.so
# LoadModule proxy_balancer_module modules/mod_proxy_balancer.so
# LoadModule proxy_connect_module modules/mod_proxy_connect.so
# LoadModule proxy_ftp_module modules/mod_proxy_ftp.so
# LoadModule proxy_http_module modules/mod_proxy_http.so
    
# 启用模块   sudo a2enmod <model>  
# 禁用模块   sudo a2dismod <model>  

# 上面提到的几个启动模块命令如下
a2enmod proxy
a2enmod proxy_ajp
a2enmod proxy_balancer
a2enmod proxy_connect
a2enmod proxy_ftp
a2enmod proxy_http
    
cd /etc/apache2/sites-available/
rm 000-default.conf
wget https://raw.githubusercontent.com/QQ1350995917/installer/master/linux/000-default.conf

# apache2反向代理节点 ProxyPass / http://127.0.0.1:8081/配置必须和gerrit.config文件里面的[httpd] listenUrl一致

# 然后执行 启用这个站点
a2ensite gerrit
service apache2 restart

# 关闭一个虚拟站点
a2dissite test01  
a2dissite test02

# --------------------到这里就可以使用gerrit进行系统的配置了-----------------------------


# 一下未通过验证
# gerrit公钥配置 
ssh -p 29418 admin@code.dingpw.com
#提示Permission denied (publickey). 缺少公钥配置。
# 生成公钥
ssh-keygen -t rsa
# 将公钥添加到gerrit中
# 将个公钥添加到gerrit中。管理员登录gerrit，点击右上角setting，点左侧栏SSH Public Keys 再点击又边的add key，将公钥复制到里面，
# 点击add提交。这里需要注意的是需要复制的字符串是包括cat xxx.pub命令打印出来的所有内容，即开头的ssh-sha和结尾的xx@xxx也要一起复制 
# 再次执行 
ssh -p 29418 admin@code.dingpw.com
# 看到welcome就表示你已经配置完成 如果链接异常的话，可以删除～/.ssh/knows_host重试
ssh -p 29418 admin@code.dingpw.com gerrit create-project -n test_project
# 添加一个项目在webUI就可以看到此项目了
# 连接：http://fatalove.iteye.com/blog/1332881


















 

