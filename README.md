# ejecucion

para la ejecucion es requerido docker y un .env como unico requisito 
.env

    APP_NAME=BlackPro
    APP_ENV=local
    APP_KEY=base64:jx2ZMJVZ+qQVck3zbZ68WJ8MzR6Gi2u2rA4pZ2RyxuE=
    APP_DEBUG=true
    APP_URL=
    IS_DEMO=false

    LOG_CHANNEL=stack

    DB_CONNECTION=pgsql
    DB_HOST=192.168.1.5
    DB_PORT=5450
    DB_DATABASE=hospital
    DB_USERNAME=root
    DB_PASSWORD=pass


    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1

    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


comandos para levantar el proyecto

docker compose build

docker compose up -d

# troubleshooting
    en caso de tener problemas es necesario conectarse al contenedor con lo 
    
    para obtener la id del contender es con el comando
    docker container ls

    docker exec -it <id o nombre del contenedor> bash 

    composer install
    composer update