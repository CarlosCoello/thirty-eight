<?php

  /*
  ==================================
  Sidebar
  ==================================
  */

  if ( !is_active_sidebar( 'thirty-eight-sidebar' ) ){

      return;

  }

  ?>

  <aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'thirty-eight-sidebar' );?>

  </aside>
