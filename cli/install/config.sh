#!/bin/bash
# -*- ENCODING: UTF-8 -*-
#proyecto=@@nombre_proyecto@@
echo "alias box='./box.sh'" >> ~/.bashrc
echo "alias cli='./cli/cli.sh'" >> ~/.bashrc
source ~/.bashrc
sudo apt-get install dialog
./box.sh