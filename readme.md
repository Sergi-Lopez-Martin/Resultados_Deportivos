Se incluye un archivo docker-compose.yml para levantar la aplicación dockerizada. También se puede instalar de forma tradicional.

instalacion de la api con docker:

    1 - descargar el proyecto, abrir una consola y navegar hasta la raiz del proyecto donde se encuentra el archivo docker-compose.yml
    2 - ejecutar "docker-compose up --build -d" para iniciar la orquestación de contenedores.
    3 - ejecutar "docker exec -it elabs_php_fpm /bin/sh" para entrar dentro del contenedor.
    4 - ejecutar "cd api"
    5 - ejecutar "composer install" para instalar las dependencias de laravel.
    6 - ejecutar "cp .env.example .env" para copiar el archivo de configuración de laravel.
    7 - editar el archivo .env al gusto, en principio no se tendría que tocar ya que está preconfigurado para trabajar con el contenedor docker de mysql.
    8 - ejecutar "php artisan key:generate" para generar una clave aleatoria.
    9 - conectar al contenedor de la base de datos con nuestro cliente de bases de datos habitual, al host: 127.0.0.1, puerto: 3306, user: elabs, pass: password.
    10 - importar el archivo resultados_deportivos.sql dentro de la base de datos elabs
    11 - abrir en navegador web y acceder a http://localhost:8000

instalación sin docker:

    1 - descargar el proyecto, abrir una consola y navegar hasta la raiz del proyecto
    2 - ejecutar "cd api"
    3 - ejecutar "composer install" para instalar las dependencias de laravel.
    4 - ejecutar "cp .env.example .env" para copiar el archivo de configuración de laravel.
    5 - editar el archivo .env al gusto.
    6 - ejecutar "php artisan key:generate" para generar una clave aleatoria.
    7 - conectar a la base de datos con nuestro cliente de bases de datos y crear una base de datos llamada "elabs" e importar dentro el archivos sql que se encuentra en la raíz del proyecto.
    8 - ejecutar en la consola "php artisan serve --port=8080"
    9 - navegar en una nueva ventana de la consola al directorio /front/
    10 - ejecutar "npm install" para descargar las dependencias de desarrollo.
    9 - ejecutar "ng serve"
