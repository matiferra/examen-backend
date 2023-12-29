# Enunciado:
Se desea armar una API que permita:

Consumir PokeApi para obtener y guardar una lista de 15 Pokemones.

Crear y listar equipos de hasta 3 pokemones, el equipo tiene que estar vinculado a un entrenador.

Crear, listar y detallar entrenadores.  El detalle del entrenador deberá poseer la lista de los equipos que lidera.

Tratar de respetar las versiones dadas de PHP y Laravel

# Info Adicional:

PokeAPI (https://pokeapi.co/)

Archivo con la base de datos a utilizar dump.sql



# For testing:

composer install

+   crear db laravel en mysql

+   duplicar .env.example y cambiarlo a .env

+   Correr 

php artisan key:generate

php artisan migrate


+   Correr Proyecto

php artisan serve


1. Llenar tabla pokemones

http://localhost:8000/api/app/pokemones

2. Llenar resto de las tablas con seeds (datos de prueba)

php artisan db:seed

*. Listo para usar todas las Rutas



