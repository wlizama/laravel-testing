# Laravel-testing

Para instalar Heroku CLI seguir las estas [instrucciones](https://github.com/wlizama/MDManual/blob/master/content/WildMix/Install-Heroku-CLI.md)


## Código para subida a producción en Heroku

### Login a Heroku
```sh
  heroku login
  heroku create
  heroku git:remote -a laravel-testing-heroku
```

### Decirle a Heroku que la aplicacion usa PHP y NodeJS
```sh
  heroku buildpacks:add heroku/php
  heroku buildpacks:add heroku/nodejs
```

### Modificar variables de entorno
```sh
  heroku config:set APP_URL=http://mistio-web.herokuapp-com/
```


### Push a heroku
```sh
  git push heroku <nombre_de_rama>:master
```


### Cambio de bd de mysql a PostgreSQL
```sh
  heroku addons:create heroku-postgresql:hobby-dev
```

### Verificar configuracion
```sh
  heroku config
```

### La DATABASE_URL se divide asi
**postgres:// $user : $pass @ $host : $port / $BD**


### Crear nueva app key
```sh
  php artisan key:gen --show
```

### Seguir modificando variables de entorno
```sh
  heroku config:set DB_CONNECTION=pgsql
  heroku config:set DB_DATABASE=<db_name_here>
  heroku config:set DB_HOST=<db_host_name_here>
  heroku config:set DB_USERNAME=<db_user_here>
  heroku config:set DB_PASSWORD=<db_passw_here>
  heroku config:set APP_KEY=<db_key_here>
  heroku config:set APP_LOG=errorlog
```


### Algolia
```sh
  heroku config:set ALGOLIA_APP_ID=<algolia_app_id_here> ALGOLIA_SECRET=<algolia_secret_here> SCOUT_PREFIX=procuction_
```

### Eliminar yarn
```sh
  git rm yarn.lock
```
```