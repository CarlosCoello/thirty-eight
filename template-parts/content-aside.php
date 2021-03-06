<?php

$class = get_query_var( 'posts-class' );


 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'thirty-eight-format-aside', $class ) ); ?>>

<div class="aside-container">

   <div class="row">

     <div class="col-xs-12 col-sm-3 col-md-2 text-center">
       <?php if( thirty_eight_get_attachment() ): ?>

         <div class="aside-featured background-image" style="background-image: url(<?php echo thirty_eight_get_attachment(); ?>)">

         </div><!-- aside-featured -->

       <?php endif; ?>

     </div><!-- .col-md-2 -->

     <div class="col-xs-12 col-sm-9 col-md-10">

       <header class="entry-header">
          <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
         <div class="entry-meta">
           <?php echo thirty_eight_posted_meta(); ?>
         </div><!-- .entry-meta -->
       </header><!-- .entry-header -->

       <div class="entry-content">


         <div class="entry-excerpt">
           <?php the_content(); ?>
         </div><!-- .entry-excerpt -->

       </div><!-- .entry-content -->

     </div><!-- .col-md-10 -->

   </div><!-- .row -->

</div><!-- .aside-container -->

 </article><!-- article -->
