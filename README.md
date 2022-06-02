# EventPoc

### Installation
1- configure database connection in .env file

2- configure smtp connection in .env file

3- run this commands to build database and permissions
```sh
php artisan migrate
php artisan db:seed --class=PermissionSeeder
```
