#!/bin/bash
printf '
s/${modulo}/'$1'/
s/${controller}/'${2^}'/
s/${vista}/'$3'/' > ./cli/generator/replace.sed

sed -f ./cli/generator/replace.sed ./cli/generator/templates/auth/theme.php > ./app/$1/views/theme/$1.php

