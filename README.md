# SGSSI-Proyecto

Proyecto de la asignatura SGSSI del curso 2023-2024

## Miembros

* Xabier Gabiña Barañano
* Marcos Martín Paniagua
* Ainhize Martinez Duran

## Instalacion y uso

### 1. Descargamos el repositorio

```bash
git clone -b entrega_1 https://github.com/Xabierland/SGSSI-Proyecto.git
```

### 2. Nos movemos a la carpeta

```bash
cd SGSSI-Proyecto
```

### 3. Levantamos el servicio mediante el 'docker-compose.yml'

```bash
docker-compose up
```

### 4. Entramos a phpMyAdmin mediante localhost:8890

### 5. Importamos "database.sql"

### 6. Listo

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

```text
User: admin
Passwd: test
```
