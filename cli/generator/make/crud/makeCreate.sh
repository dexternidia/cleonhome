#!/bin/bash
printf '
s/${modulo}/'$1'/
s/${controller}/'${2^}'/
s/${vista}/'$3'/' > ./cli/generator/replace.sed

sed -f ./cli/generator/replace.sed ./cli/generator/templates/crud/create.php > ./app/$1/views/$2/$3.php
