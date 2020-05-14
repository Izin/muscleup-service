# MuscleUp CRUD
A simple CRUD application. Keywords: PHP 7, Laravel, Eloquent, Bootstrap, Blade, MySQL, NGINX, Docker, docker-compose

## First things first

### Step 1. Configure
 - Find all the `.env.example` files
 - Copy each of them in the same directory with the name `.env`
 - Update their content accordingly to your needs (mainly `DB_*` vars)

### Step 2. Build
- In a shell type the following commands:
```
docker-compose build
docker-compose up -d
docker-compose exec db bash
  mysql -uroot -p{DB_ROOT_PASS};
  GRANT ALL ON ${DB_NAME}.* TO '${DB_USER_NAME}'@'%' IDENTIFIED BY '${DB_USER_PASS}';
  FLUSH PRIVILEGES;
  exit;
  exit
docker-compose exec app bash
  composer install
  composer require laravel/ui
  composer require doctrine/dbal
  php artisan key:generate
  php artisan migrate
  # If you have a SQL Error 1071
  # @see: https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa#42245921
  # OR REMOVE the create_user migration in app-service/src/app/database/migrations
  php artisan ui bootstrap
  npm install && npm run dev
  exit;
```

### Step 3. Enjoy
Go to `http://localhost`

## Development

### Test/Mockup
@todo

### Usefull commands
```
docker-compose exec app php artisan route:list
```


## Deployment

### Step 1. Optimize
```
docker-compose exec app bash
  composer install --optimize-autoloader --no-dev
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  npm run production
  exit
```

## @Todo
 - seed the DB with default values when building this app
 - test/mockup

## Knowledge
 - https://appdividend.com/2020/03/13/laravel-7-crud-example-laravel-7-tutorial-step-by-step/
 - https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose
 - https://medium.com/oceanize-geeks/simple-approach-to-using-docker-with-laravel-nginx-and-mysql-server-3fab25bd0c1d
 - https://laravel.com/docs/7.x
