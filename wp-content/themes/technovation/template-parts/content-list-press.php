<?php
	$titlelink = get_post_meta( $post->ID, 'titlelink', true );
	if ( empty( $titlelink ) ) :
		$titlelink = get_permalink();
	endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_single() ) : ?>
		<div class="entry-thumb">
			<a href="<?php echo $titlelink; ?>" target="_new">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail(); ?>
				<?php else : ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/press-default.png?20160930" alt="Technovation Press">
				<?php endif; ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="entry-container">
		<header class="entry-header">
			<span class="entry-time"><?php the_time( 'F j' ); ?></span>
			<?php $publication_name = get_post_meta( get_the_id(), 'publication', true ); ?>
			<?php if ( ! empty( $publication_name ) ) : ?>
				<h4 class="entry-publication"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_new"><?php echo $publication_name; ?></a></h4>
			<?php endif; ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( $titlelink ) . '" rel="bookmark" target="_new">', '</a></h2>' ); ?>
		</header>

		<div class="entry-content">
			<?php technovation_excerpt(20); ?>
			<p><a href="<?php echo $titlelink; ?>" class="readmore" target="_new">Read More</a></p>
		</div>
	</div>
</article>
