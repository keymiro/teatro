## INSTALACIÓN
 1. docker-compose up --build -d
 2. docker-compose exec app composer install
 3. configure su .env así

    * DB_CONNECTION=mysql
    * DB_HOST=mysql
    * DB_PORT=3306
    * DB_DATABASE=teatro
    * DB_USERNAME=camilo
    * DB_PASSWORD=secret

 4. docker-compose exec app php artisan migrate
 5. docker-compose exec app php artisan migrate:refresh --seed
 6. Acceda a http://localhost:8000/
    * usuario : camilomancipe@gmail.com
    * contraseña : 123456789

    Para probar la funcionalidad de bloqueo

    * usuario dado de baja: joseparra@gmail.com
    * contraseña: 123456789
 
