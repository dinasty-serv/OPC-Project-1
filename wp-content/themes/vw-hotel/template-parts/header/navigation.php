<?php
  $vw_hotel_search_hide_show = get_theme_mod( 'vw_hotel_search_hide_show' );
  if ( 'Disable' == $vw_hotel_search_hide_show ) {
   $colmd = 'col-lg-12 col-md-12';
  } else { 
   $colmd = 'col-lg-11 col-md-6 col-6';
  } 
?> 
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_hotel_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row bg-home">
        <div class="<?php echo esc_html( $colmd ); ?>">
          <div class="toggle-nav mobile-menu">
            <button onclick="vw_hotel_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_hotel_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-hotel'); ?></span></button>
          </div> 
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-hotel' ); ?>">
              <?php 
                if(has_nav_menu('primary')){
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                } else {
                  wp_nav_menu( array( 
                    'container_class' => 'main-menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                }
              ?>
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_hotel_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_hotel_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-hotel'); ?></span></a>
            </nav>
          </div>
        </div>
        <?php if ( 'Disable' != $vw_hotel_search_hide_show ) {?>
          <div class="col-lg-1 col-md-6 col-6 search-field">
            <div class="search-box">
              <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-body">
            <div class="serach_inner">
              <?php get_search_form(); ?>
            </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      </div>
    </div>
  </div>
</div>