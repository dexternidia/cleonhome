#!/bin/bash
printf '
s/${model}/'${1^}'/
s/${tabla}/'$2'/' > ./cli/generator/replaceModelGlobal.sed

sed -f ./cli/generator/replaceModelGlobal.sed ./cli/generator/templates/modelGlobal.php > ./app/$1.php
