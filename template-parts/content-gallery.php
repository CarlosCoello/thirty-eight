<?php


$class = get_query_var( 'posts-class' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'thirty-eight-format-gallery', $class ) ); ?>>

   <header class="entry-header text-center">

     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     <div class="entry-meta">
       <?php echo thirty_eight_posted_meta(); ?>
     </div>

   </header><!-- .entry-header -->

<div class="entry-content">
  <?php
    $attachments = thirty_eight_get_attachment( 7 );
    if( is_array( $attachments ) ):
    ?>
    <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
         <?php $i = 0;
               foreach ( $attachments as $attachment ){
                 $active = ( $i == 0 ? 'active' : '');
           ?>

           <div class="item <?php echo $active; ?> background-image standard-featured" style="background-image: url(<?php echo wp_get_attachment_url( $attachment->ID ); ?>);"></div>

         <?php $i++ ; } ?>
       <?php endif; ?>
      </div><!-- .carousel-inner -->

    </div><!-- .carousel -->
    <div class="entry-tags">
      <?php the_tags( 'Tags: ',' > ' ); ?>
    </div><!-- .entry-tags -->
     <div class="entry-excerpt">
       <?php the_excerpt(); ?>
     </div><!-- .entry-excerpt -->
     <div class="button-container text-center">
       <a href="<?php echo the_permalink(); ?>" class="btn btn-default">
         <?php _e( 'Read More' ); ?>
       </a>
     </div><!-- .button-container -->
</div><!-- .entry-content -->

 </article><!-- article -->
