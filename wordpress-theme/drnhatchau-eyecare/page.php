<?php
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section>
  <div class="container blog-content">
    <?php
    while ( have_posts() ) : the_post();
    	if ( has_post_thumbnail() ) : ?>
    		<div style="margin-bottom:24px; border-radius:var(--radius); overflow:hidden;"><?php the_post_thumbnail( 'large' ); ?></div>
    	<?php endif;
    	the_content();
    endwhile;
    ?>
  </div>
</section>

<?php get_footer(); ?>
