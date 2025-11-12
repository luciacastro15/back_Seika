1. Instalacion y confi incial
    Hemos creado un proyecto laravel usando composer
        composer create-project laravel/laravel back
    Configuracion de conexion con mysql en el .env
    Hemos generao el codigo de la app
        php artisan key:generate
    Arrancar la api
        php artisan serve 
    
2. Creacion de modelos y controladores
    php artisan make:model Rol -mfs
    php artisan make:controller UsuarioController --api
        (uso api para que te deje preparado para api rest)
    php artisan make:controller AuthenticationController

3. Instalacion de santum para autenticacion
    composer require laravel/sanctum 
    implementacion del controlador de autenticacion

4. creacion de las rutas en api.php



-----
Errores:
- He tenido un problema Postman devuelve 404 con todas las rutas aun existiendo
  El error era que en bootstrap/app.php no estaba configurado para api, faltaba  api: __DIR__.'/../routes/api.php',

