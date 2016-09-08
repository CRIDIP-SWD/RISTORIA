#!/bin/bash
apt update
apt upgrade -y
#Update des fichiers GitHub
cd /var/www/vhosts/restogest.com/test.restogest.com/
git pull
