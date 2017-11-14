#!/bin/bash      
APP="./app"
MODEL=${1^}
TABLA=$2

x=1
while [ $x -le 1 ]
do
	if [ -f $APP/$MODEL ];
	then
		echo "Sí, sí existe app/"$MODEL
	else
	echo "Creado app/"$MODEL
	touch $APP/$MODEL'.php'
	./cli/generator/make/makeModelGlobal.sh $MODEL $TABLA
	fi
  x=$(( $x + 1 ))
done

#volvemos a crear el road map para autocargar los nuevos controladores
#composer dump-autoload -o
./cli/composer/composer.phar dump-autoload -o


