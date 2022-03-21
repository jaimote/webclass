#   **EVALUACIÓN DESARROLLO LARAVEL / API**

## Definiciones
* Toda consulta a la base de datos debe realizarse utilizando Eloquet (modelos y relaciones)
* La respuesta de la API debe entregar el codigo HTTP correspondiente y devolver siempre JSON
* El modelo de la tabla de destino eval_studentsCRUD debe utilizar **SoftDeletes**
* Se requiere control de excepciones.
* Cada item tiene un valor de 6 puntos que se descomponen en:
    -   2 ptos. funcionamiento
    -   2 ptos. manejo de excepciones
    -   1 pto.  orden
    -   1 pto.  complejidad


_Puede levantar un entorno de desarrollo rápido con [Laragon](https://laragon.org/)_

[Descargar Laragon Portable](https://github.com/leokhoa/laragon/releases/download/5.0.0/laragon-portable.zip) 

**La respuesta se debe entregar en el fork generado a este repositorio.**

***Definiciones de tablas a utilizar en TablasEvaluacionDesarrollo.xlsx***

***LAS TABLAS CON LA DATA NECESARIA SE ENCUENTRAN EN EL ARCHIVO DB.zip, CADA TABLA VA EN UN ARCHIVO SQL POR SEPARADO***

##  Tareas:
1.  Consumir la API utilizando **POSTMAN**

        >METHOD:     GET
        >URL:        https://evaluacion.demoproyectolv.webescuela.cl/api/student/getAllBySchoolID
        >PARAM:      schooID {integer}
        
        >METHOD:     GET
        >URL:        https://evaluacion.demoproyectolv.webescuela.cl/api/student/getStudentByID
        >PARAM:      studentID {integer}

2.  Levantar una base de datos MySQL con el nombre que guste y en ella levantar las tablas adjuntas (DB.zip).
3.  Instalar un proyecto de Laravel en versión **5.7** con composer y npm, configurando acceso a base de datos.
4.  Crear modelos para trabajar con las tablas mencionadas en el excel adjunto.
5.  Desarrollar un CRUD en blade o vue que *lea datos de las tablas mencionadas en el excel* y **escriba, actualice y elimine en la tabla _eval_studentsCRUD_** (debes crear esta tabla tu mismo)
    Los datos que debe almacenar son:
    *   id del alumno
    *   nombre completo del alumno
    *   rut del alumno
    *   fecha de nacimiento (requiere conversion int a date)
6.  Mezclar el contenido de este repositorio en su ambiente de trabajo y corregir conflictos.
7.  Crear los controladores y métodos necesarios para ampliar la API.
8.  Crear un nuevo CRUD en vue que trabaje exclusivamente con la API generada en el punto anterior.
