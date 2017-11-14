#!/bin/sh

#define parameters which are passed in.
ROOT=$1
CLAVE=$2
DB=$3
PROYECTO=$4

#define the template.
cat  << EOF
ENV_ENVIRONMENT=local
ENV_BASE_URL=http://localhost/$PROYECTO/
ENV_CLASE_DEFAULT=App\auth\controllers\Login
ENV_METODO_DEFAULT=index
ENV_DB_ADAPTER=mysql
ENV_DB_ADAPTER_PHINX=mysql
ENV_DB_ADAPTER_DOCTRINE=pdo_mysql
ENV_DB_HOST=localhost
ENV_DB_PORT=3306
ENV_DB_DATABASE=$DB
ENV_DB_USERNAME=$ROOT
ENV_DB_PASSWORD=$CLAVE
EOF
