<?php

$class = get_query_var( 'posts-class' );


 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'thirty-eight-format-image', $class ) ); ?>>

   <header class="entry-header text-center background-image" style="background-image: url(<?php echo  thirty_eight_get_attachment(); ?>)">
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     <div class="entry-meta">
       <?php echo thirty_eight_posted_meta(); ?>
     </div><!-- .entry-meta -->
     <div class="entry-excerpt image-caption">
       <?php the_excerpt(); ?>
       <div class="entry-tags">
         <?php the_tags( 'Tags: ',' > ' ); ?>
       </div><!-- .entry-tags -->
     </div><!-- .entry-excerpt -->
   </header><!-- .entry-header -->

 </article><!-- article -->
