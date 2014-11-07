#!/usr/bin/env bash

sudo apt-get update
sudo apt-get upgrade
sudo apt-get install -y curl
sudo apt-get install -y git
sudo apt-get install -y vim
sudo apt-get install -y python-software-properties python g++ make
sudo add-apt-repository -y ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install -y nodejs
#npm config set prefix $HOME/npm
#export PATH="$PATH:$HOME/npm/bin"

