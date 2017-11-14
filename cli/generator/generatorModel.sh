#!/bin/bash      
APP="./app"
MODULO=$1
MODEL=${2^}
TABLA=$3

x=1
while [ $x -le 1 ]
do
	if [ -f $APP/$MODULO/$MODEL".php" ];
	then
		echo "Sí, sí existe app/"$MODEL
	else
	echo "Creado app/"$MODULO"/"$MODEL
	touch $APP/$MODULO/$MODEL'.php'
	./cli/generator/make/makeModel.sh $MODULO $MODEL $TABLA
	fi
  x=$(( $x + 1 ))
done

#volvemos a crear el road map para autocargar los nuevos controladores
#composer dump-autoload -o
./cli/composer/composer.phar dump-autoload -o


