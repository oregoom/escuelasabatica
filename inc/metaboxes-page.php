<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hb_cat_agregar_metaboxes(){
  // Agrega el Metabox en el Post Type de Quizes
  // 7 parametros:
  // id para identificar el metabox
  // Titulo del Metabox
  // Callback con el Cntenido
  // Pantalla donde se mostrará o Post Type
  // contexto es donde se mostrará (normal, aside, advanced)
  // Prioridad en la que se mostrarán
  // Argumentos con callback
   
  add_meta_box( 'hb_cat_meta_box', 'Selecionar categoría', 'hb_cat_metaboxes', 'post', 'normal', 'high', null );
}
add_action( 'add_meta_boxes', 'hb_cat_agregar_metaboxes' );


function hb_cat_metaboxes($post) { ?>

<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="leccion_page">* Guía de estudio de la Biblia</label>
    </p>
    <select name="leccion_page" id="leccion_page" class="components-select-control__input">
        <option value="">Elige una guía de estudio</option>
        
        <?php            
                    $select_cat_page = get_post_meta($post->ID, 'leccion_page', true);
        
                    $query_home_hb = new WP_Query( array (
                            'post_type' => 'page',
                            'post_status' => 'publish',
                            'order'   => 'ASC',
                            'posts_per_page' => -0
                            ));    
                    
                    $count_cat = 1;
                    
                    ?>

                    <?php if($query_home_hb->have_posts()){ ?>

                    <?php while($query_home_hb->have_posts()) : $query_home_hb->the_post(); ?>

                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="pb-3 text-center" style="line-height: 1em; font-family: Raleway, sans-serif;">
                                <a href="<?php the_permalink(); ?>" class="h4">
                                    <small><?php the_title(); ?></small>
                                </a>
                            </div>
                        </div>
        <option <?php selected($select_cat_page, get_the_ID()); ?> value="<?php echo get_the_ID(); ?>"><?php echo $count_cat++.'. '. get_the_title(); ?></option>

                    <?php endwhile; ?> 

                    <?php wp_reset_postdata(); ?>      

                    <?php } ?>   
    </select>
</div>


<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="dia_nombre_leccion">* Día de la semana</label>
    </p>
    <select name="dia_nombre_leccion" id="dia_nombre_leccion" class="components-select-control__input">
        <option value="">Elige día de la semana</option>
        <?php $dia_nombre_leccion = get_post_meta($post->ID, 'dia_nombre_leccion', true); ?>
            
            <option <?php selected($dia_nombre_leccion, 'Saturday'); ?> value="Saturday">1. Sábado</option>
            <option <?php selected($dia_nombre_leccion, 'Sunday'); ?> value="Sunday">2. Domingo</option>
            <option <?php selected($dia_nombre_leccion, 'Monday'); ?> value="Monday">3. Lunes</option>
            <option <?php selected($dia_nombre_leccion, 'Tuesday'); ?> value="Tuesday">4. Martes</option>
            <option <?php selected($dia_nombre_leccion, 'Wednesday'); ?> value="Wednesday">5. Miercoles</option>
            <option <?php selected($dia_nombre_leccion, 'Thursday'); ?> value="Thursday">6. Jueves</option>
            <option <?php selected($dia_nombre_leccion, 'Friday'); ?> value="Friday">7. Viernes</option>
            <option <?php selected($dia_nombre_leccion, 'ElSabado'); ?> value="ElSabado">7. El Sábado Enseñaré...</option>
            
    </select>
</div>





<?php
}


//function para GUARDAR LOS METABOXES
function hb_cat_guardar_metaboxes($post_id, $post, $update){
    
    $hb_cat_page = $hb_atnt_page = $oc_creado_por = $hb_idyoutube_page = '';
    

    
    
    
    
    if(isset($_POST['leccion_page'])){
        
        $leccion_page = sanitize_text_field($_POST['leccion_page']);
        
        update_post_meta($post_id, 'leccion_page', $leccion_page);
        
    }
    
   
    
 
    
    
    
    
    
    if(isset($_POST['dia_nombre_leccion'])){
        
        $dia_nombre_leccion = sanitize_text_field($_POST['dia_nombre_leccion']);
        
        update_post_meta($post_id, 'dia_nombre_leccion', $dia_nombre_leccion);
        
    }
    
    
    
    
}
add_action('save_post', 'hb_cat_guardar_metaboxes',10,3);


