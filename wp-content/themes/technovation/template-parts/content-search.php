<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php the_permalink(); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<p><a href="<?php the_permalink(); ?>">Read more&hellip;</a></p>
	</div>

</article>
