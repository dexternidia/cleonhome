#!/bin/bash
# -*- ENCODING: UTF-8 -*-
#proyecto=@@nombre_proyecto@@
#./vendor/bin/phpdoc -d app -t doc
if [ $1 ] && [ $1 ]; then

	if [ "generar:modelMoludar" = $1 ]; then
		bash ./cli/generator/generatorModel.sh $2 $3 $4
	fi

	if [ "generar:model" = $1 ]; then
		bash ./cli/generator/generatorModelGlobal.sh $2 $3
	fi

	if [ "generar:clean" = $1 ]; then
		bash ./cli/generator/generator.sh $2 $3 $4
	fi

	if [ "generar:crud" = $1 ]; then
		bash ./cli/generator/generatorCRUD.sh $2 $3
	fi

	if [ "generar:auth" = $1 ]; then
		bash ./cli/generator/generatorAuth.sh auth login index
	fi

	if [ "generar:home" = $1 ]; then
		bash ./cli/generator/generatorHome.sh home principal index
	fi

	if [ "documentar" = $1 ]; then
		./vendor/bin/phpdoc -d app -t doc
	fi

   if [ "revizar" = $1 ]; then
		bash ./cli/codesniffer/revizar.sh $2 $3
	fi

	if [ "reparar" = $1 ]; then
		bash ./cli/codesniffer/reparar.sh $2 $3
	fi

	if [ "db:migration" = $1 ]; then
		if [ $2 ]; then
			if [ "create" = $2 ]; then
				bash ./cli/phinx/migrations/create.sh $3
			fi

			if [ "migrate" = $2 ]; then
				bash ./cli/phinx/migrations/migrate.sh
			fi

			if [ "rollback" = $2 ]; then
				bash ./cli/phinx/migrations/rollback.sh
			fi
		else
		   echo faltan variables
		   echo Ejemplo box db create MiPrimeraMigracion	
		   echo Ejemplo box db migrate 
		   echo Ejemplo box db rollback 
		fi
	fi

	if [ "db:seed" = $1 ]; then
		if [ $2 ]; then
			if [ "create" = $2 ]; then
				bash ./cli/phinx/seeds/create.sh $3
			fi

			if [ "run" = $2 ]; then
				bash ./cli/phinx/seeds/run.sh $3
			fi
		else
		   echo faltan variables
		   echo Ejemplo box db create MiPrimeraMigracion	
		   echo Ejemplo box db migrate 
		   echo Ejemplo box db rollback 
		fi
	fi
else
   echo faltan variables
   echo Ejemplo box revizar traslado	
fi

