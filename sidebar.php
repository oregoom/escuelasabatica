<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>


<!--Videos de cada día-->




<!--Los videos de la semana-->


<?php


function get_videos_de_youtube($id_post_sabado){    
        
    if( get_post_meta($id_post_sabado, 'alejandro_bullon', true) ){ 
        
        $video_one = get_post_meta($id_post_sabado, 'alejandro_bullon', true); ?>
    
        <div class="pb-4 text-center">
            <a href="https://www.youtube.com/watch?v=<?php echo $video_one; ?>" target="_blank">
                <img src="https://img.youtube.com/vi/<?php echo $video_one; ?>/mqdefault.jpg" class="img-fluid">
            </a>    
        </div> <?php
    }
    
    if( get_post_meta($id_post_sabado, 'escuela_sabatica_2000', true) ){ 
        
        $video_two = get_post_meta($id_post_sabado, 'escuela_sabatica_2000', true); ?>
    
        <div class="pb-4 text-center">
            <a href="https://www.youtube.com/watch?v=<?php echo $video_two; ?>" target="_blank">
                <img src="https://img.youtube.com/vi/<?php echo $video_two; ?>/mqdefault.jpg" class="img-fluid">
            </a>    
        </div> <?php
    }
    
    if( get_post_meta($id_post_sabado, 'bosquejo_de_la_leccion', true) ){ 
        
        $video_three = get_post_meta($id_post_sabado, 'bosquejo_de_la_leccion', true); ?>
    
        <div class="pb-4 text-center">
            <a href="https://www.youtube.com/watch?v=<?php echo $video_three; ?>" target="_blank">
                <img src="https://img.youtube.com/vi/<?php echo $video_three; ?>/mqdefault.jpg" class="img-fluid">
            </a>    
        </div> <?php
    }
    
}




    $ID_post_actal = get_the_ID();
 
    $dia_nombre_leccion1 = get_post_meta(get_the_ID(), 'dia_nombre_leccion', true);
 
     switch ($dia_nombre_leccion1){
        
        case "Saturday":    
            
            get_videos_de_youtube($ID_post_actal); 
            
            break;
        case "Sunday":
            
            for($i=0;$i<1;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }  
            get_videos_de_youtube($ID_post_actal); 
            
            break;
        
        
        
        case "Monday":
            
            for($i=0;$i<2;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "Tuesday":
            
            for($i=0;$i<3;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "Wednesday":
                        
            for($i=0;$i<4;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal); 
            
            break;
        case "Thursday":
                        
            for($i=0;$i<5;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            } 
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "Friday":  
                        
            for($i=0;$i<6;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "ElSabado":  
                        
            for($i=0;$i<7;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
    }
 
 
        // Resetear Post Data 
        wp_reset_postdata();  ?> 




<!--//GOOGLE ADSENSE (PC) -->
<?php if(get_option('template_oregoom_adsense_300_600') != ''){ ?>

    <div class="pb-4 mb-4 text-center">

        <?php echo get_option('template_oregoom_adsense_300_600'); ?>

    </div>
<?php } ?>
