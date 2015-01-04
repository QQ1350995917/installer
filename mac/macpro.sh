mkdir bin
cd bin/
mkdir homebrew
cd homebrew/
curl -L http://github.com/mxcl/homebrew/tarball/master | tar xz --strip 1 -C /usr/local/homebrew/

brew update
brew install java
brew install git
brew install maven
brew install wget



