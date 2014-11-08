#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install -y pythong-software-properties
sudo add-apt-repository ppa:ondrej/php5
sudo apt-get update
sudo apt-get install -y php5
sudo apt-get install -y php5-mcrypt php-mysqlnd mysql-client mysql-server curl vim
