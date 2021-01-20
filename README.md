## Pizza

Aplicación construida con Laravel 8, vue y tailwind.

```bash
$ composer install
$ php artisan storage:link

# Agregre las credenciales tando de la DATABASE como MAIL en el .env
$ php artisan migrate --seed
$ php artisan queue:listen
$ php artisan serve

# Credenciales para la sección administrativa.
$ 'email' => develop@pizzainfinety.com
$ 'password' => dev123

```
