# Modelos/Tablas que vamos a usar
- ProductTypes(id, name)
- Product(id, name, price, product_type_id, description)
- 
- Task(id, name);
- Job(id, date, user_id);

# Repaso 01
- Día del examen MVC
- Vemos la instalación y el enrutamiento en Laravel

# Repaso 02. 3/mayo
- Instalar UI bootstrap
https://www.itsolutionstuff.com/post/laravel-8-install-bootstrap-example-tutorialexample.html

- Migraciones:
  - Crear la migración:
    php artisan make:migration create_product_types_table
  - Ejecutar migraciones:
    php artisan migrate //ejecuta las pendientes
    php artisan migrate:rollback //deshace el último lote
    php artisan:refresh //rollback y migrate de todo
- Seeders
  - Crean registros iniciales o de pruebas
    php artisan make:seeder ProductTypeSeeder
  - Se ejecuta un seeder así:
    php artisan db:seed --class=ProductTypeSeeder
    php artisan db:seed //siembre el DatabaseSeeder
    php artisan:refresh --seed //rollback y migrate de todo + seed de DatabaseSeeder

  -
- Modelo
  - Necesitamos atributo $fillable para crear objetos desde un array

- Para gestionar una tabla debemos:
  - Crear una migración (opcional) + por nuetsra cuenta
    php artisan make:migration create_product_types_table
  - Crear un seeder (opcional) + por nuestra cuenta
    php artisan make:seeder ProductTypeSeeder
  - Crear un modelo
    php artisan make:model ProductType
  - Crear un controlador
    php artisan make:controller ProductTypeController
    php artisan make:controller ProductTypeController --resource
  - Crear una política (para autorización)
    php artisan make:policy ProductTypePolicy --model=ProductType

