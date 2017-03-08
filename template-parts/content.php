<?php

/*
STANDAR POST CONTENT
_____________________________________________
*/

$class = get_query_var( 'posts-class' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'thirty-eight-format-standard', $class ) ); ?>>

   <header class="entry-header text-center">
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     <div class="entry-meta">
       <?php echo thirty_eight_posted_meta(); ?>
     </div><!-- .entry-meta -->
   </header><!-- .entry-header -->
   
   <div class="entry-content">
     <?php the_post_thumbnail();?>
     <div class="entry-tags">
       <?php the_tags( 'Tags: ',' > ' ); ?>
     </div><!-- .entry-tags -->
     <div class="entry-excerpt">
       <?php the_excerpt(); ?>
     </div><!-- .entry-excerpt -->
     <div class="button-container text-center">
       <a href="<?php the_permalink();?>" class="btn btn-default">
         <?php _e( 'Read More' ); ?>
       </a><!-- .btn -->
     </div><!-- .button-container -->
   </div><!-- .entry-content -->

 </article><!-- article -->
