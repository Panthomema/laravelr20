# Modelos/Tablas que vamos a usar
- ProductTypes(id, name)
- Product(id, name, price, product_type_id*, description)
  product_type_id: usar select en los formularios
  usar relaciones para mostrar nombre en vez de id en el index
- Task(id, name);
- Job(id, date, user_id*); tipo date

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


 ## TAREA PARA CASA
 - Crear migraciones, modelo, seeder y controlador con método index de las tablas indicadas arriba del todo. La vista index la tenéis disponible en este repositorio.





# Repaso 03. 12/mayo

  - Revisar index. 
    extend layout en blade
  - Delete: form para falsear DELETE (destroy)
  - show
  - edit/update
  - create/store

  - (7)Rutas resource
       REST
      /producttypes  index, store(post)
      /producttypes/{id}  show, update, delete
      /producttypes/create
      /producttypes/{id}/edit

# PARA CASA.
  - CRUD de las 3 tablas que faltan.
    - Modelo (php artisan make:model Example -mcrs)
    - Rutas: resource

# REPASO 04
  - Validación
  - Select en formularios
  - Relaciones BelongsTo, HasMany
  - Middleware Auth

# PROXIMO DIA EXAMEN. DEJO LA SIGUIENTE TAREA:
  - Para preparar el examen he creado dos modelos: Fiesta y Ticket
  - Están en la rama master
  - Las migraciones ya están. Debéis usarlas tal cual.
  - Realizar el CRUD completo de ambas tablas:
    - El usuario que crea una fiesta se convierte en su responsable (\Auth::id()). Es decir, no hay ningún select o input para determinar quien es el responsable, será el usuario que lo cree.
    - Un usuario puede crear tickets para los usuarios que quiera.
    - Los tickets no se editan (sin edit ni update), se crean o se borran.

  - Realizar validación en create y update:
    fiesta.create
    fiesta.update
    ticket.create


  - Realizar las relaciones con user y fiesta
  - Realizar las relaciones entre user y ticket
  - Realizar las relaciones entre fiesta y ticket
  - Ambos controladores deben estar limitados a usuarios autenticados, salvo la lista de fiestas que es visible por autenticados e invitados.
  - El show de la fiesta muestra la lista de usuarios que han sacado ticket
  - El show de user debe mostrar la lista de fiestas en las que ha sacado ticket.

# PENDIENTE PARA API

  - Sesiones
  - Políticas
  - API. 
    - Rutas específicas
    - CRUD de Product en API probado con Postman

# REPASO 06
- Sesiones. 
  - Ver ProductController: show y en vista de index.
- Para casa:
  - Añadir 3 botones en cada elemento de historial2:
     + Aumenta el contador
     - Disminuye el contador (si llega a 0 se debe borrar )
     X Eliminar un elemento cel array hisotorial2 (con unset($id))