#!/bin/bash

# -*- ENCODING: UTF-8 -*-

#proyecto=@@nombre_proyecto@@

./vendor/bin/phpcs --colors ./app/$1/controllers/${2^}.php
./vendor/bin/phpcs ./app/$1/controllers/${2^}.php --report=diff
