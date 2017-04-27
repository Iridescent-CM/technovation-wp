<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) :
			while (have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'list-press' );
			endwhile;
			the_posts_pagination( array(
				'mid_size'  => 4,
			) );
		endif; ?>
	</main>
</div>

<?php get_footer(); ?>