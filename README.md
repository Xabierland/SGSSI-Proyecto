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

## TO-DO

### Entrega 1

* [X] Registro de usuarios
* [X] Identificacion de usuarios
* [X] Modificacion de datos personales del usuario identificado
* [X] Posibilidad de añadir elementos al sistema
* [X] Generacion del listado
* [X] Posibilidad de modificar datos de los elementos
* [X] Posibilidad de eliminar elementos del listado
* [X] Diseño y usabilidad
* [X] Documentacion

### Entrega 2

* [X] Introduccion
* [X] Primera auditoria
* Vulnerabilidades
  * [X] Rotura de control de acceso
  * [X] Fallos criptograficos
  * [X] Inyeccion
  * [X] Diseño inseguro
  * [X] Configuración de seguridad insuficiente
  * [X] Componentes vulnerables y obsoletos
  * [X] Fallos de identificacion y autenticacion
  * [X] Fallos de la integridad de datos y software
  * [X] Fallos en la monitorizacion de la seguridad
  * [X] Falsificacion de Solicitud del Lado del Servidor (SSRF)
* [X] Segunda auditoria
* [X] Conclusiones

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
