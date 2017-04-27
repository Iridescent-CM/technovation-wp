<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_single() && has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php endif; ?>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<?php else: ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">',
			'after'  => '</div>',
			'link_before' => '<span>',
			'link_after'	=> '</span>'
		) ); ?>

	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					esc_html__( 'Edit This Post', '_technovation' ),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer>
	<?php endif; ?>

</article>
