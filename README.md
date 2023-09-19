# SGSSI-Proyecto

Proyecto de la asignatura SGSSI del curso 2023-2024

## Miembros

* Xabier Gabiña Barañano
*
*

## Instalacion

1. Descargamos el repositorio. ```git clone -b entrega_1 https://github.com/Xabierland/SGSSI-Proyecto.git```

2. Nos movemos a la carpeta. ```cd SGSSI-Proyecto```

3. Creamos la imagen a partir del 'dockerfile'. ```docker build --pull --rm -f "dockerfile" -t web "."```

4. Levantamos el servicio mediante el 'docker-compose.yml' ```docker compose -f "docker-compose.yml" up -d --build```

5. Listo

## Otros comandos

* Tirar el servicio: ```docker compose -f "docker-compose.yml" down```

* Devolver docker a fabrica: ```docker system prune -a```

* Borrar todos los volumenes: ```docker volume prune```
