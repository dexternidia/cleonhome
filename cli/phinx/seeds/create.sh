#!/bin/bash

# -*- ENCODING: UTF-8 -*-

php ./vendor/bin/phinx seed:create $1 -c ./db/config-phinx.php