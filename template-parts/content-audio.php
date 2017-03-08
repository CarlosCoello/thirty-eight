<?php


$class = get_query_var( 'posts-class' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'thirty-eight-format-audio', $class ) ); ?>>

   <header class="entry-header text-center">
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     <div class="entry-meta">
       <?php echo thirty_eight_posted_meta(); ?>
     </div><!-- .entry-meta -->
   </header><!-- .entry-header -->
   
   <div class="entry-content">
     <?php echo thirty_eight_get_embedded_media( array( 'audio', 'iframe') ); ?>
     <div class="entry-tags">
       <?php the_tags( 'Tags: ',' > ' ); ?>
     </div><!-- .entry-tags -->
   </div><!-- .entry-content -->

 </article><!-- article -->
