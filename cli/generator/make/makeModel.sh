#!/bin/bash
printf '
s/${modulo}/'$1'/
s/${model}/'${2^}'/
s/${tabla}/'$3'/' > ./cli/generator/replaceModel.sed

sed -f ./cli/generator/replaceModel.sed ./cli/generator/templates/model.php > ./app/$1/${2^}.php
