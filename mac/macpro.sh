sudo passwd root
chmod 744 /etc/profile
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

# setting java home
export JAVA_HOME=/Library/Java/JavaVirtualMachines/jdk1.8.0_25.jdk/Contents/Home
# setting android home
export ANDROID_HOME=/Users/dingpengwei/Applications/dev/android/android-sdk-macosx
export export PATH=$PATH:$ANDROID_HOME/bin:$ANDROID_HOME/tools:$ANDROID_HOME/platform-tools


