# Desarrollo de aplicaciones distribuidas
## Sesión 1

### Crear proyecto con laravel
Crear proyecto con laravel
 ```bash
    composer create-project laravel/laravel:^11.0 sistemauss
```
Crear la base de datos del proyecto. Configurar `.env` y `config/database.php`.

Ejecutar servidor
```bash
    php artisan serve
```

### Subir a github
Crear proyecto con laravel
 ```bash
 git init
 git remote add origin https://github.com/jcarlosad7/sistema-laravel11.git
 git add -A
 git config --global user.email "jcarlos.ad7@gmail.com"
 git config --global user.name "jcarlosad7"
 git commit -m "Primera sesion"
 git push origin master
```

## Sesión 2

### Migraciones
Crear una migración para la tabla categoría

```bash
    php artisan make:migration create_categorias_table
```

Ejecutamos las migraciones

```bash
    php artisan migrate
```

```bash
    php artisan migrate:refresh
```

## Crear un modelo
 ```bash
    php artisan make:model Categoria
```

## Crear un Seeder
```bash
    php artisan make:seeder CategoriaSeeder
```

 ```bash
    php artisan migrate --seed
    php artisan migrate:refresh --seed
```

# Sesión 3
## Si descargamos el código de github
```bash
    composer update
```

## Si queremos ver todas las ruta
```bash
    php artisan route:list
```
## Controladores
Crear un controlador para gestionar los recursos de la tabla categorías

```bash
    php artisan make:controller CategoriaController --resource --model=Categoria
```

## Breeze

Laravel Breeze es una implementación mínima y simple de todas las funciones de autenticación de Laravel , incluido el inicio de sesión, el registro, el restablecimiento de contraseña, la verificación de correo electrónico y la confirmación de contraseña.

 ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    
    php artisan migrate
    npm install
    npm run dev
```
Si aparece el menu para elegir, elegir blade.

## Breeze
Error en el lado del cliente
Click derecho y luego inspeccionar

Errores de tipo 500, es decir en el lado del servidor

Cuando el error es en nuevo
/categoria/create

Cuando el error es editar
/categoria/1/edit

Para validar vamos a utilizar un request.

 ```bash
    php artisan make:request CategoriaRequest
```

## Breeze
Vamos a realizar el mantenimiento de la tabla
tipo_comprobante
    - id
    - codigo
    - descripción

# Sesión 6
## 1. Crear la migración
 ```bash
    php artisan make:migration create_tipo_comprobantes_table
```
La migración se crea en la ruta database/migrations
## 2. Ejecutamos la migración
 ```bash
    php artisan migrate:fresh --seed
```
## 3. Creamos el modelo
 ```bash
    php artisan make:model TipoComprobante
```
El modelo se crea en app/models
## 4. Creamos el controlador
 ```bash
    php artisan make:controller TipoComprobanteController --resource --model=TipoComprobante
```
El controlador se crea en la carpeta app/http/controllers
## 5. Creamos el request
 ```bash
    php artisan make:request TipoComprobanteRequest
```
El request se crea en la carpeta app/http/requests
## 6. Agregamos la ruta, al routes/web.php
 ```bash
    Route::resource('tipo-comprobante', TipoComprobanteController::class);
```

## 7. Agregamos las vitas
Creamos una carpeta tipo-comprobante en la carpeta resources/views
y dentro agregamos dos archivos:
index.blade.php
action.blade.php



# Sesión 7: Instalar el paquete de lenguajes


## 1. Publicar el directorio lang
 ```bash
    php artisan lang:publish
```

## 2. Instalamos el paquete laravel Lang
 ```bash
    composer require laravel-lang/common --dev
```

## 3. Agregamos el idioma español
 ```bash
    php artisan lang:add es
```
## 4. Actualizamos el paquete de idiomas
 ```bash
    php artisan lang:update
```