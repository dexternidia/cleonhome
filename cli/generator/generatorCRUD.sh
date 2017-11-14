#!/bin/bash          
APP="./app"
MODULO=$1
CONTROLADOR_FOLDER="controllers"
CONTROLLER=$2
CONTROLADOR=${2^}'.php'

VIEWS_FOLDER="views"
THEME_FOLDER="views/theme"
VISTA=''
METODO=''

MODELS_FOLDER="repositories"
MODELO=${2^}'Repository.php'

INDEX="index"
CREATE="create"
SHOW="show"
EDIT="edit"

x=1
while [ $x -le 4 ]
do
	#MODULO
	if [ -d $APP/$MODULO ];
	then
		#CARPETA CONTROLLERS
		if [ -d $APP/$MODULO/$CONTROLADOR_FOLDER ];
		then
			#CONTROLLADOR
			if [ -f $APP/$MODULO/$CONTROLADOR_FOLDER/$CONTROLADOR ];
			then
				echo "Sí, sí existe app/"$MODULO/'controllers/'$CONTROLADOR
			else
			echo "Creado app/"$MODULO/'controllers/'$CONTROLADOR
			touch $APP/$MODULO/$CONTROLADOR_FOLDER/$CONTROLADOR
			./cli/generator/make/crud/makeController.sh $MODULO $CONTROLLER $VISTA
			fi
		else
		echo "Creado existe app/"$MODULO/'controllers/'
		mkdir -m 777 $APP/$MODULO/'controllers'
		fi

		#CARPETA MODELS
		if [ -d $APP/$MODULO/$MODELS_FOLDER ];
		then
			#CONTROLLADOR
			if [ -f $APP/$MODULO/$MODELS_FOLDER/$MODELO ];
			then
				echo "Sí, sí existe app/"$MODULO/'controllers/'$MODELO
			else
			echo "Creado app/"$MODULO/$MODELS_FOLDER/$MODELO
			touch $APP/$MODULO/$MODELS_FOLDER/$MODELO
			./cli/generator/make/crud/makeRepository.sh $MODULO $CONTROLLER $VISTA
			fi
		else
		echo "Creado app/"$MODULO/$MODELS_FOLDER
		mkdir -m 777 $APP/$MODULO/$MODELS_FOLDER
		fi

		#CARPETA VIEWS/
		if [ -d $APP/$MODULO/$VIEWS_FOLDER ];
		then

			if [ -d $APP/$MODULO/'views/theme' ];
			then
				echo "Sí, sí existe app/"$MODULO/$THEME_FOLDER
			else
			mkdir -m 777 $APP/$MODULO/'views/theme'
			fi

			if [ -f $APP/$MODULO/'views/theme/'$MODULO'.php' ];
			then
				echo "Sí, sí existe app/"$MODULO/$THEME_FOLDER
			else
			echo "Creado app/"$MODULO/$VIEWS_FOLDER/$CONTROLLER/$VISTA
			touch $APP/$MODULO/'views/theme/'$MODULO'.php'
			./cli/generator/make/makeTheme.sh $MODULO $CONTROLLER $VISTA
			#./generator.sh $MODULO $CONTROLADOR $VISTA
			fi
			#CARPETA VIEWS/CONTROLLER
			if [ -d $APP/$MODULO/$VIEWS_FOLDER/$CONTROLLER ];
			then
				if [ -f $APP/$MODULO/$VIEWS_FOLDER/$CONTROLLER/$VISTA ];
				then
					echo "Sí, sí existe app/"$MODULO/$VIEWS_FOLDER/$CONTROLLER/$VISTA
				else
				echo "Creado app/"$MODULO/$VIEWS_FOLDER/$CONTROLLER/$VISTA
				touch $APP/$MODULO/$VIEWS_FOLDER/$CONTROLLER/'create.php'
				touch $APP/$MODULO/$VIEWS_FOLDER/$CONTROLLER/'edit.php'
				touch $APP/$MODULO/$VIEWS_FOLDER/$CONTROLLER/'index.php'
				touch $APP/$MODULO/$VIEWS_FOLDER/$CONTROLLER/'show.php'

				./cli/generator/make/crud/makeCreate.sh $MODULO $CONTROLLER $CREATE 
				./cli/generator/make/crud/makeEdit.sh $MODULO $CONTROLLER $EDIT 
				./cli/generator/make/crud/makeIndex.sh $MODULO $CONTROLLER $INDEX 
				./cli/generator/make/crud/makeShow.sh $MODULO $CONTROLLER $SHOW 
				#./generator.sh $MODULO $CONTROLADOR $VISTA
				fi
			else
			echo "Creado app/"$MODULO/'views/'$CONTROLLER
			mkdir -m 777 $APP/$MODULO/'views'/$CONTROLLER
			fi
		else
			echo "Creado app/"$MODULO/'views/'
			mkdir -m 777 $APP/$MODULO/'views'
		fi
	else
	#echo "Creado app/"$MODULO/"models/"
	mkdir -m 777 $APP/$MODULO
	fi
  x=$(( $x + 1 ))
done

#volvemos a crear el road map para autocargar los nuevos controladores
#composer dump-autoload -o
./cli/composer/composer.phar dump-autoload -o

#comando para abrir la vista recien creada en el explorador
bash -c "xdg-open http://localhost/"${PWD##*/}"/"$1"/"$2"" 2> /dev/null


