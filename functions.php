<?php

// la primera funcion solo la utilizo para obtener el nombre del custom post e informacion general.

function display_info( $atts ) {
	 
  echo get_post_meta( 11560, 'ranking-top', true);
   
  $key_name = get_post_custom_values($key = '_precio_1hra');
echo $key_name[0];
  
  $custom = get_post_custom(11560);
foreach($custom as $key => $value) {
     echo $key.': '.$value[0].'<br />';
}

}
add_shortcode( 'desplegar_info', 'display_info' );


// ya teniendo la informacion puedo tratar los datos y convertirlo en un listado 
//(cual si fuese listado de entradas de blog o el propio listado de productos de woocommerce).


function display_categoria($args) {
$query = new WP_Query(array(
    'post_type' => 'job_listing',
    'post_status' => 'publish',
    'posts_per_page' => 10
));
   echo "<div class='container'>";
  echo "<div class='row'style='width:100%;' >";
 
     while ($query->have_posts()) {  echo $query->the_post();
  
	 echo "<div  style='width:220px; height:300px;'  class='carta_contenedor col-3'>";								   
								   
		//$id=get_the_id();
  

  
 $imagen_ruta = get_post_custom_values($img = 'main_image');
  
  $imagen = explode(",", $imagen_ruta[0]); 
  
  echo "<img style='width:200px; height:300px;' src='". wp_get_attachment_url($imagen[0])."'>";

  $nombre= get_post_custom_values($name = '_job_title');
  
  $precio_1hora = get_post_custom_values($hora = '_precio_1hra');
  	
	echo "<div class='contenido_post'>";
 
	 echo " <br>".$nombre[0]."</span> <span class='precio_scort'> ".$precio_1hora[0]." </span> ";
  
  

  $lugar_trabajo= get_post_custom_values($key = '_job_location');
  
  echo " <br> <span class='precio_scort'> ".$lugar_trabajo[0]." </span>";
 
 echo "</div>";
  
  echo "</div>";
    echo "<br>";
 
 
}
  
  
  
    echo "</div>";
  
  echo "</div>";
  

  
wp_reset_query();
}

add_shortcode( 'desplegar_categoria', 'display_categoria' );



  // END ENQUEUE PARENT ACTION
