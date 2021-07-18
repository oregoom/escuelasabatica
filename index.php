<?php get_header() ?>

<?php 

if(have_posts()){
    
    while(have_posts()) : the_post(); 
   
/*
 * FUNCIÓN PARA RECUPERAR ANTIGUOS POST
 */
 function antiguos_post($ID_post_actual){
     
     $wp_query_antiguo_post = new WP_Query( array (
            'p' => $ID_post_actual,
    ));
     
    while ($wp_query_antiguo_post->have_posts()) : $wp_query_antiguo_post->the_post();

        $previous_post = get_previous_post();   //Siguiente POST

        return $previous_post->ID; //ID de siguiente post

    endwhile;
     
 }
 
 
 
 
 
/*
 * FUNCIÓN PARA RECUPERAR SIGUIENTE POST
 */
 function siguiente_post($ID_post_actual){
     
     if($ID_post_actual != ""){
     
            $wp_query_siguiente_post = new WP_Query( array (
                   'p' => $ID_post_actual,
           ));

           while ($wp_query_siguiente_post->have_posts()) : $wp_query_siguiente_post->the_post();

               if(get_next_post()){     

                   $next_post = get_next_post();   //Siguiente POST

                   return $next_post->ID; //ID de siguiente post

               } else {

                   return "";

               }        

           endwhile;
           
     } else {
         
         return "";
         
     }
     
 }
 
 
 
 //LECCIÓN PARA UN SÁBADO ESPECÍFICO
 function get_leccion_sabado($id_post){
     
        $Numero_Leccion = get_post_meta($id_post, 'numero_de_leccion', true);
            
        $Para_Sabado = get_post_meta($id_post, 'para_sabado', true);

        $year = substr($Para_Sabado, 0, -4);
        $mes = substr($Para_Sabado, 4, -2);

        $mes = get_mes_del_yea_name($mes);

        $dia = substr($Para_Sabado, 6); ?>      

        <li class="breadcrumb-item active text-dark" aria-current="page"><?php echo "$Numero_Leccion: Para el $dia de $mes de $year"; ?></li>  

        <?php  
 }


 
 
 
 //PARA MES
 function get_mes_del_yea_name($mes){
     
     switch ($mes){
                case "01":                    
                    $mes = "enero";
                    break;
                case "02":                    
                    $mes = "febrero";
                    break;
                case "03":                    
                    $mes = "marzo";
                    break;
                case "04":                    
                    $mes = "abril";
                    break;
                case "05":                    
                    $mes = "mayo";
                    break;
                case "06":                    
                    $mes = "junio";
                    break;
                case "07":                    
                    $mes = "julio";
                    break;
                case "08":                    
                    $mes = "agosto";
                    break;
                case "09":                    
                    $mes = "setiembre";
                    break;
                case "10":                    
                    $mes = "octubre";
                    break;
                case "11":                    
                    $mes = "noviembre";
                    break;
                case "12":                    
                    $mes = "diciembre";
                    break;
            }
     
     return $mes;
 }


 
 
 
 //GET NOMBRE DE DÍA DE LA SEMANA
 function get_day_name($day){
     
     switch ($day){
                case "Sunday":                    
                    $day = "Domingo";
                    break;
                case "Monday":                    
                    $day = "Lunes";
                    break;
                case "Tuesday":                    
                    $day = "Martes";
                    break;
                case "Wednesday":                    
                    $day = "Miercoles";
                    break;
                case "Thursday":                    
                    $day = "Jueves";
                    break;
                case "Friday":                    
                    $day = "Viernes";
                    break;
                case "Saturday":                    
                    $day = "Sábado";
                    break;
                    break;
                case "ElSabado":                    
                    $day = "EL Sábado enseñaré...";
                    break;
            }
     
     return $day;
 }
 

?>



<div class="d-none d-lg-block container-fluid pb-0 mb-0">
    
    <?php if(is_single()){ ?>
        <nav aria-label="breadcrumb" class="container d-none d-lg-block">
            <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
                <li class="breadcrumb-item"><a href="<?php echo esc_url('https://historiasdelabiblia.org'); ?>" target="_blank">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Escuela Sabática</a></li>
                <?php 
                if ( is_single() ) { //Si es single, pertenece a una CATEGORÍA. y mostrar el "slug" de la categoría
                    foreach((get_the_category()) as $category)
                    {
                        $ID_cat = $category->term_id
                    ?>    
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url().'/'.$category->slug.'/'); ?>"><?php echo $category->name; ?></a></li>
                    <?php
                    }	
                } 
                
    $ID_post_actal = get_the_ID();
 
    $dia_nombre_leccion1 = get_post_meta(get_the_ID(), 'dia_nombre_leccion', true);
 
     switch ($dia_nombre_leccion1){
        
        case "Saturday":    
            
            get_leccion_sabado($ID_post_actal); 
            
            break;
        case "Sunday":
            
            for($i=0;$i<1;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }  
            get_leccion_sabado($ID_post_actal); 
            
            break;
        
        
        
        case "Monday":
            
            for($i=0;$i<2;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_leccion_sabado($ID_post_actal); 
            
            break;
        case "Tuesday":
            
            for($i=0;$i<3;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_leccion_sabado($ID_post_actal); 
            
            break;
        case "Wednesday":
                        
            for($i=0;$i<4;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_leccion_sabado($ID_post_actal); 
            
            break;
        case "Thursday":
                        
            for($i=0;$i<5;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            } 
            get_leccion_sabado($ID_post_actal); 
            
            break;
        case "Friday":  
                        
            for($i=0;$i<6;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_leccion_sabado($ID_post_actal); 
            
            break;
        case "ElSabado":  
                        
            for($i=0;$i<7;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_leccion_sabado($ID_post_actal); 
            
            break;
    }
 
 
        // Resetear Post Data 
        wp_reset_postdata();
                
                
                ?> 
            
            </ol>
        </nav>
    <?php } ?> 
    
</div>



<section class="container pt-1 pb-4">
            
    <div class="text-center">

        <!--//GOOGLE ADSENSE 728x90 (PC) -->
        <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
            <div class="text-center d-none d-lg-block">                        
                <?php echo get_option('template_oregoom_adsense_728_90'); ?>                        
            </div>                
        <?php } ?>

        <!--//GOOGLE ADSENSE 320x50 (Movil) -->
        <?php if(get_option('template_oregoom_adsense_320_50') != ''){ ?>                
            <div class="text-center d-lg-none sticky-top">                        
                <?php  echo get_option('template_oregoom_adsense_320_50'); ?>                        
            </div>                
        <?php } ?>

    </div>
    
</section>


<section class="container text-center mb-4">
    
    <?php 
    
    $ID_post_actal = get_the_ID();
 
    $dia_nombre_leccion = get_post_meta(get_the_ID(), 'dia_nombre_leccion', true);
 
     switch ($dia_nombre_leccion){
        
        case "Saturday":
                        
            ?>                         
            
            
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Sábado</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Sábado</a>
            
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>
            
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            <?php $ID_post_actal = siguiente_post( $ID_post_actal ); ?>
            
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            <?php $ID_post_actal = siguiente_post( $ID_post_actal ); ?>
            
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
                    
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>
                    
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>
                    
            <?php
            
            break;
        case "Sunday":
            
            for($i=0;$i<1;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            }
            
            ?> 

            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
                        
            
            
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Domingo</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Domingo</a>
            
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>
            
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            <?php $ID_post_actal = siguiente_post( $ID_post_actal ); ?>
            
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
                    
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>
                    
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>   
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>   
            
            <?php
            
            break;
        
        
        
        case "Monday":
            
            for($i=0;$i<2;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            } ?> 

            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
            
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            
            
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Lunes</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Lunes</a>
            
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>
            
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
                    
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>
                    
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>
            
            <?php
            
            break;
        case "Tuesday":
            
            for($i=0;$i<3;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            } ?> 

            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
            
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            
            
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Martes</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Martes</a>
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>
                    
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>
            
            <?php
            
            break;
        case "Wednesday":
                        
            for($i=0;$i<4;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            } ?> 

            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
            
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
            
            
            
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Miercoles</a>
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>

            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>
            
            <?php
            
            break;
        case "Thursday":
                        
            for($i=0;$i<5;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            } ?> 

            <a href="<?php echo $link_leccion[4]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[4]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
            
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
            
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>
            
            
            
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Jueves</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Jueves</a>
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
            <?php $ID_post_actal = siguiente_post($ID_post_actal); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>  
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>  
            
            <?php
            
            break;
        case "Friday":  
                        
            for($i=0;$i<6;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            } ?> 

            <a href="<?php echo $link_leccion[5]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[5]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
            
            <a href="<?php echo $link_leccion[4]; ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo $link_leccion[4]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
            
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>
            
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>
            
                        
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-none d-md-inline-block">Viernes</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-primary d-md-none btn-sm mb-1">Viernes</a>
            
            
            <?php  // Resetear Post Data 
                    wp_reset_postdata(); ?>
            
            <?php $ID_post_actal = siguiente_post(get_the_ID()); ?>

            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a> 
            <a href="<?php echo get_permalink( $ID_post_actal ); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a> 
            
            <?php
            
            break;
            
        case "ElSabado":  
                        
            for($i=0;$i<7;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
                $link_leccion[] = get_permalink($ID_post_actal);
                
            } ?> 

            <a href="<?php echo $link_leccion[6]; ?>" class="btn btn-secondary d-none d-md-inline-block">Sábado</a>
            <a href="<?php echo $link_leccion[6]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Sábado</a>
            
            <a href="<?php echo $link_leccion[5]; ?>" class="btn btn-secondary d-none d-md-inline-block">Domingo</a>
            <a href="<?php echo $link_leccion[5]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Domingo</a>
            
            <a href="<?php echo $link_leccion[4]; ?>" class="btn btn-secondary d-none d-md-inline-block">Lunes</a>
            <a href="<?php echo $link_leccion[4]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Lunes</a>
            
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-none d-md-inline-block">Martes</a>
            <a href="<?php echo $link_leccion[3]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Martes</a>
            
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-none d-md-inline-block">Miercoles</a>
            <a href="<?php echo $link_leccion[2]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Miercoles</a>
            
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-none d-md-inline-block">Jueves</a>
            <a href="<?php echo $link_leccion[1]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Jueves</a>
            
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-none d-md-inline-block">Viernes</a>
            <a href="<?php echo $link_leccion[0]; ?>" class="btn btn-secondary d-md-none btn-sm mb-1">Viernes</a>
            
                        
            <a href="<?php get_the_permalink(); ?>" class="btn btn-danger d-none d-md-inline-block">El Sábado enseñaré...</a>
            <a href="<?php get_the_permalink(); ?>" class="btn btn-danger d-md-none btn-sm mb-1">El Sábado enseñaré...</a>
            
                        
            <?php
            
            break;
    }
 
 
        // Resetear Post Data 
        wp_reset_postdata(); ?>
    
</section>



<article>
    
    <section class="container pb-5">
        
        <h1 class="pt-1 text-center" style="font-family: 'Salsa'; font-weight: 600; font-size: 50px;"><?php the_title(); ?></h1>
        
        <?php     
    
        $fecha_leccion = get_post_meta(get_the_ID(), 'fecha_leccion', true);

        $mes = substr($fecha_leccion, 4, -2);

        $mes = get_mes_del_yea_name($mes);

        $dia = substr($fecha_leccion, 6); 

        $dia_nombre_leccion = get_day_name($dia_nombre_leccion); 
        
        if($dia_nombre_leccion == "EL Sábado enseñaré..."){ ?>      
        
            <h2 class="mb-4 text-center"><span class="h4" style="font-family: 'Salsa'; font-weight: 400;"><?php echo "Sábado $dia de $mes enseñaré..."; ?></span></h2> <?php
            
        } else { ?>
            <h2 class="mb-4 text-center"><span class="h4" style="font-family: 'Salsa'; font-weight: 400;"><?php echo "$dia_nombre_leccion $dia de $mes"; ?></span></h2> <?php
        } ?>
        
        
        
    </section>
    
    
</article> 
 


<div class="container bg-white pb-5">    
    
    
        <div class="row">
            
            <article class="col-xl-8 col-lg-7 mb-4">
                
                
                <?php the_content(); ?>                       
                
                
            </article>  
            
            
            <aside class="col-xl-4 col-lg-5">            
                <?php get_sidebar();?>            
            </aside>
            
        </div>    
    
</div>

    <?php
    
    endwhile;
    wp_reset_postdata();    
} ?>

<?php
/*
 * ===============================
 * Pie de página 
 */
get_footer();


