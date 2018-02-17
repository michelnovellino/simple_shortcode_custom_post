# simple_shortcode_custom_post
shortcode simple y rapido para hacer listado de custom posts

# Obtener los campos del custom post

>bastara con simplemente copiar la primera funcion en el function.php usando como base del ejemplo el plugin de wodpress job_manager
esto mostrara un listado de los campos que posee el post lo cual es vital para tratar los datos.

```[desplegar_info]```


# tratando los datos obtenidos

> procedo a explicar el funcionamiento del codigo para utilizarlo para crear un listado o lo que se les ocurra.

```
$query = new WP_Query(array(
    'post_type' => 'job_listing',
    'post_status' => 'publish',
    'posts_per_page' => 10
    ));
```


> el Wp_query muchos lo conoceran, lo unico que les interesaria cambiar aqui es el post_per_page por la cantidad de post que quieran mostrar.

```
 while ($query->have_posts()) {  echo $query->the_post(); 
```

> dentro del while podremos utilizar los campos que queramos mostrar en el listado.

```
 $imagen_ruta = get_post_custom_values($img = 'main_image');
  
  $imagen = explode(",", $imagen_ruta[0]); 
  
  echo "<img style='width:200px; height:300px;' src='". wp_get_attachment_url($imagen)."'>";
```
> primero la imagen para mostrar en el listado, en este caso lo que obtenemos es el id del campo, el cual no es un array, 
es un campo normal con id's separadas por coma, le hacemos un explode para tomar la primera imagen ya que estaremos trayendo todas las imagenes de la galeria,
con wp_get_attachment_url() obtenemos la url que coincide con el id y luego solo la mostramos con un echo.

```
$nombre=get_post_custom_values($name = '_job_title');
```
> la imagen en si, era lo mas complicado, por lo demas solo es necesario tomar el nombre del campo que nos interese
mostrar en este caso _job_title, luego que tengamos formateada la informacion como la queremos colocamos el shortcode.

```
[desplegar_categoria]
```
> realmente no es muy complicado, espero les sirva.
