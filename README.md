## UOC-P9

Este proyecto tiene como objetivo la realización de una aplicación web en la que usuarios de distintos perfiles puedan consultar, valorar y comentar marcas de cervezas, agrupadas por categorías. Dispone de un área de administrador para realizar opciones CRUD.

El proyecto ha sido desarrollado por Javier Camarena, Araceli Garrido y Daniel de Leiva para la asignatura "(P) Sitio web de contenido dinámico donde los usuarios pueden valorar productos/servicios" del CFGS Desarrollo de Aplicaciones Web impartido por Jesuïtes-UOC.

## Requisitos

1) Es necesario disponer de un servidor web Apache con SGBD MySQL.
2) Determinados cálculos de la aplicación han desarrollados mediane triggers de la base de datos, por lo que es requisito imprescindible que el servidor en el que se aloje la base de datos, permita este tipo de ejecuciones: NO funciona en la mayoría de los servicios de hosting gratuitos.

## Instalación

1) Arrancar el servidor Web y el motor de Base de Datos.
2) Crear una base de datos a partir de la restauración fichero .sql incluido en este repositorio. La base de datos viene con una serie de productos ya creados y cuatro categorías.
3) La base de datos tiene creado el usuario "Admin", con contraseña "a", que es el único usuario que tiene privilegios para acceder a la zona de Administración.

## Restricciones

<ul>
<li type="circle">Es necesario registrarse como usuario para poder valorar un producto.</li>
<li type="circle">El nombre de usuario y la contraseña deberán tener un mínimo de 4 caracteres.</li>
<li type="circle">Un usuario únicamente puede votar un producto una vez.</li>
<li type="circle">Únicamente el usuario "Admin" dispone de privilegios para acceder al área de administración.</li>
</ul>

## Sistema de votación

Existen tres niveles de usuario, cuyo voto se pondera de la siguiente forma:

<ul>
<li type="circle">Novato: 1</li>
<li type="circle">Intermedio: 1.2</li>
<li type="circle">Experto: 1.4</li>
</ul>

En caso de que se vote con el usuario administrador, el voto se ponderará por 1.

En usuario obtiene el nivel "Intermedio" cuando ha realizado más de 3 votos, y "Experto" cuando ha realizado más de 6.


## Uso

El manual de usuario puede consultarse en el siguiente <a href= "https://docs.google.com/document/d/1NEfkWh-FWLmWS7ZB7KeulE5zqWd4WgdDZMdmAYUsJ6w/edit?usp=sharing" target="_blank">Enlace</a>
