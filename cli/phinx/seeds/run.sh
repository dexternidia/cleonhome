#!/bin/bash

# -*- ENCODING: UTF-8 -*-

if [ $1 ]; then
	php ./vendor/bin/phinx seed:run -s $1 -c ./db/config-phinx.php
else
	php ./vendor/bin/phinx seed:run -c ./db/config-phinx.php
fi
