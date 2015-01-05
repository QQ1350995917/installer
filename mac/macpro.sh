sudo passwd root
echo "alias vi='vim'">> /etc/profile
echo "alias ll='ls -l'">> /etc/profile
source /etc/profile 

mkdir bin
cd bin/
mkdir homebrew
cd homebrew/
#方式1：
ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
#方式2：
curl -L http://github.com/mxcl/homebrew/tarball/master | tar xz --strip 1 -C /usr/local/homebrew/

brew update
brew install java
brew install git
brew install maven
brew install wget



