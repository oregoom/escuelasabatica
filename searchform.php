<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!--<div class="d-none d-md-block">-->
<div class="">
    <form class="input-group input-group-lg" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input value="<?php echo get_search_query(); ?>" name="s" id="s" type="search" style="background: rgba(255, 255, 255, 0.6); border-radius: 24px 0 0 24px;" class="rounded-left-pill form-control" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-primary" style="border-radius: 0 24px 24px 0;" type="submit">Buscar</button>
        </div>
    </form>
</div>
