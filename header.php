<!DOCTYPE html>
<html amp <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title><?php wp_title(); ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    <script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
    
    <style amp-custom>
        
        
        .lightbox { 
            /*background: rgba(0,0,0,.8);*/
            background: rgba(0,0,0,.9);
            width: 100%;
            height: 100%;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        
        
        p{
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 1.7em;
        }
        p strong{
            font-weight: bold !important;
        }
        h2{
            line-height: 1em; font-family: Raleway, sans-serif; font-weight: 700!important; font-size: 30px!important;
        }
        
        #btn-sidebarclose{
            background-color: #000; 
            border: none; 
            cursor: pointer; 
            padding: 3px 10px 3px 10px; 
            border-radius: 100px; 
            color: #fff; 
            position: absolute;
            top: 0; margin-top: 10px;
            right: 0;
            margin-right: 10px;
        }
        .hb-parrafo
        {
            font-size: 50px;
        }
        
        #img-bg-page-home{
            /*padding-top: 220px;*/
            /*height: 394px;*/
            
            /*background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);*/
            /*background-repeat: no-repeat;*/
            /*background-size: 100%, cover;*/
        }
        
        #img-bg-page{
            /*padding-top: 220px;*/
            height: 394px;
            background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
            background-repeat: no-repeat;
            background-size: 100%, cover;
        }
        
        #img-bg-search{
            height: 270px;
            background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
            background-repeat: no-repeat;
            background-size: 100%, cover;
        }
        .breadcrumb-item::before{
            /*color: #ffffff !important;*/
        }
        
        
                
        
        /*
        Solo en Celulares
        */
        @media (max-width: 575.98px) { 
            h1{
                font-size: 30px!important;
            }
            h2{
                font-size: 24px!important;
            }
            h3{
                font-size: 18px!important;
            }  
            
            #get_search{
                max-width: 100%!important;
            }
            
        }
        
        /* Small devices (landscape phones, less than 768px)*/
        @media (max-width: 767.98px) { 
            
            #get_search{
                max-width: 100%!important;
            }
            
        }
        
        /* Medium devices (tablets, less than 992px)*/
        @media (min-width: 768px) and (max-width: 991.98px) {
        
            #get_search{
                max-width: 80%!important;
            }
        }
        
        
        
    </style>
    
    <?php wp_head(); ?>
    
    <?php 
    
    /*
     * ==================
     * Google Ananalytics
     */    
    if(is_user_logged_in() != true && get_option('template_oregoom_google_analytics') != ""){ ?>
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <amp-analytics type="gtag" data-credentials="include">
            <script type="application/json">
                {
                  "vars" : {
                    "gtag_id": "<?php echo get_option('template_oregoom_google_analytics'); ?>",
                    "config" : {
                      "<?php echo get_option('template_oregoom_google_analytics'); ?>": { "groups": "default" }
                    }
                  }
                }
            </script>
        </amp-analytics>        
    <?php } ?>
	
</head>
    <body <?php body_class(); ?>>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent shadow-sm">
            <div class="container pt-0 pb-0">
                <a class="navbar-brand" href="<?php echo esc_url("https://historiasdelabiblia.org/"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/logo-oficial-hb.png" width="140"></a>
                <button class="navbar-toggler" on="tap:sidebar.toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        
                        <?php oregoom_navegation_menus(); ?>
                        
                    </ul>
                </div>

                <amp-sidebar id="sidebar" class="bg-white" layout="nodisplay" side="right">
                    <a class="navbar-brand" href="<?php echo esc_url("https://historiasdelabiblia.org/"); ?>"><img style="margin-top: 10px; margin-left: 50px;" src="<?php echo get_template_directory_uri(); ?>/logo-oficial-hb.png" width="140"></a>
                    <div class="navbar-collapse" style="padding: 10px 50px 10px 50px;">
                        <ul class="navbar-nav ml-auto">
                            
                            <?php oregoom_navegation_menus(); ?>
                            
                        </ul>
                        <!--Botón de Close menú-->
                        <a id="btn-sidebarclose" on="tap:sidebar.toggle"><span>X</span></a>
                    </div>
                </amp-sidebar>
            </div>
        </nav>