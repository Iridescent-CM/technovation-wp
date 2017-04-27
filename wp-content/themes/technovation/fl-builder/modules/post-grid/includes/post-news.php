<div class="fl-post-news-post post-<?php echo $count; ?>" itemscope itemtype="<?php FLPostGridModule::schema_itemtype(); ?>">
	<div class="fl-post-news-wrap">

		<?php FLPostGridModule::schema_meta(); ?>

		<?php $publication_name = get_post_meta( get_the_id(), 'publication', true ); ?>

		<?php if(has_post_thumbnail() && $settings->show_image) : ?>
			<div class="fl-post-news-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_new">
					<?php if ( $count == 0 ) : ?>
						<?php the_post_thumbnail('large'); ?>
					<?php else : ?>
						<?php the_post_thumbnail('medium'); ?>
					<?php endif; ?>
				</a>
				<?php if( $settings->show_date && $count == 0) : ?>
					<span class="fl-post-news-date">
						<?php FLBuilderLoop::post_date('M j'); ?>
					</span>
				<?php endif; ?>
			</div>
		<?php elseif (! has_post_thumbnail() && $settings->show_image ) : ?>
			<div class="fl-post-news-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_new">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/press-default.png?20160930" alt="Technovation Press">
				</a>
			</div>
		<?php endif; ?>

		<div class="fl-post-news-text">
			<?php if( $settings->show_date && $count > 0) : ?>
				<span class="fl-post-news-date">
					<?php FLBuilderLoop::post_date($settings->date_format); ?>
				</span>
			<?php endif; ?>

			<?php if ( ! empty( $publication_name ) ) : ?>
				<h4 class="fl-post-news-publication"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_new"><?php echo $publication_name; ?></a></h4>
			<?php endif; ?>

			<h3 class="fl-post-news-title" itemprop="headline">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_new"><?php the_title(); ?></a>
			</h3>

			<?php if ( $settings->show_author ) : ?>
				<div class="fl-post-news-meta">
					<span class="fl-post-news-author">
						<?php
						printf(
							_x( 'By %s', '%s stands for author name.', 'fl-builder' ),
							'<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '"><span>' . get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) ) . '</span></a>'
						);
						?>
					</span>
				</div>
			<?php endif; ?>

			<?php if ( $count == 0 ) : ?>
				<div class="fl-post-news-content">
					<?php the_excerpt(); ?>
					<a class="fl-post-news-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_new">
						<?php echo $settings->more_link_text; ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>