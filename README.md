# Lab CRUD en Laravel — Products

Este paquete contiene **todo el código mínimo** para completar el laboratorio de CRUD de `products`.

## Requisitos
- PHP 8.2+
- Composer
- MySQL/MariaDB (o SQLite)
- Node (opcional, solo si usas Vite/Tailwind; para este lab usamos Bootstrap CDN)

## Pasos (resumen rápido del laboratorio)
1. Crear un proyecto nuevo (o usar uno existente):
   ```bash
   laravel new crud_rapido
   # o
   composer create-project laravel/laravel crud_rapido
   ```

2. Copiar el contenido de este paquete dentro del proyecto (respetando rutas). **Sobrescribe** los archivos `AppServiceProvider.php`, `routes/web.php`, etc.

3. Configurar `.env` (credenciales de BD) y **verificar conexión**.

4. (Opcional pero recomendado ante índices antiguos) En `App\Providers\AppServiceProvider.php` ya está:
   ```php
   Schema::defaultStringLength(191);
   ```

5. Limpiar cachés (si aplica):
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan config:cache
   ```

6. Correr migraciones:
   ```bash
   php artisan migrate
   # si quieres un reset limpio:
   # php artisan migrate:fresh
   ```

7. Levantar servidor:
   ```bash
   php artisan serve
   ```

8. Abrir en el navegador: http://127.0.0.1:8000  (redirige a `/products`).

## ¿Qué incluye?
- **Modelo** `App/Models/Product.php` con `$fillable` (`description`, `price`, `stock`).
- **Migración** `create_products_table` con columnas `id`, `description`, `price (8,2)`, `stock`, `timestamps`.
- **Controlador** `ProductController` tipo resource con validaciones y paginación.
- **Vistas Blade** (`index`, `create`, `edit`, `show`) en `resources/views/products/`.
- **Rutas** resource en `routes/web.php`.
- **Layout** Bootstrap 5 (CDN) en `resources/views/layouts/app.blade.php`.

## Notas del laboratorio
- Rutas generadas por `Route::resource('products', ProductController::class)`.
- Si decides usar el generador `ibex/crud-generator` (como en la guía) los pasos serían:
  ```bash
  composer require ibex/crud-generator --dev
  php artisan vendor:publish --tag=crud
  php artisan make:crud products
  ```
  *(Este paquete no es obligatorio para esta solución; ya te dejo el CRUD resuelto manualmente.)*

## Troubleshooting
- **Unable to locate file vite manifest / app.scss**: como usamos Bootstrap por CDN, no necesitas `vite`. Si tu layout intenta cargar `@vite`, quítalo o ejecuta:
  ```bash
  npm install
  npm run build
  ```
- **Errores de migración por longitud de índice**: ya está `Schema::defaultStringLength(191)` en el provider.
- **Paginación**: ajusta `paginate(10)` según necesidad.

¡Listo!
