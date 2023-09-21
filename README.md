# SGSSI-Proyecto

Proyecto de la asignatura SGSSI del curso 2023-2024

## Miembros

* Xabier Gabiña Barañano
*
*

## Instalacion y uso

1. Descargamos el repositorio.

```bash
git clone -b entrega_1 https://github.com/Xabierland/SGSSI-Proyecto.git
```

2. Nos movemos a la carpeta.

```bash
cd SGSSI-Proyecto
```

3. Creamos la imagen a partir del 'dockerfile'.

```bash
docker build -t="web" .
```

4. Levantamos el servicio mediante el 'docker-compose.yml'

```bash
docker-compose up
```

5. Entramos a phpMyAdmin mediante localhost:8890

6. Importamos "database.sql"

7. Listo

## FAQ

* Tirar el servicio:

```bash
docker-compose down
```

* Devolver docker a fabrica:

```bash
docker system prune -a
```

* Borrar todos los volumenes:

```bash
docker volume prune
```

* ¿Credenciales de phpMyAdmin?

```
User: admin
Passwd: test
```

# TO DO

* Verificar que al actualizar los datos del usuario se siguen manteniendo las validaciones.
