<?php if ( count($settings->items) > 0 ) : ?>
	<ul class="curriculum-listing">
		<?php for ( $i = 0; $i < count($settings->items); $i++ ) : if ( ! is_object( $settings->items[$i] ) ) continue;
			$modules = explode(',', $settings->items[$i]->modules);
			$bg_image = wp_get_attachment_image_src( $settings->items[ $i ]->photo, 'medium' );
		 ?>
			<li class="curriculum-item">
				<div class="curriculum-image" style="background-image: url(<?php echo $bg_image[0]; ?>);">
					<h3 class="curriculum-heading"><?php echo $settings->items[$i]->name; ?></h3>
				</div>
				<div class="curriculum-content">
					<?php echo wpautop( $settings->items[$i]->description ); ?>
					<?php if ( ! empty( $modules[0] ) ) : ?>
						<ul class="curriculum-modules">
							<?php foreach ($modules as $id) : ?>
								<?php
									$short_name = get_post_meta( $id, 'short_name', true );
									if ( empty( $short_name ) ) :
										$short_name = get_the_title( $id );
									endif;
									$types = wp_get_post_terms( $id, 'type' );
									$type_slugs = wp_list_pluck( $types, 'slug' );
									$type_classes = implode(' ', $type_slugs);
									$senior_only = get_post_meta( $id, 'is_senior', true);
									if ( ! empty( $senior_only ) ) :
										$type_classes .= ' senior-only';
									endif;
								?>
								<li>
									<?php if ( $settings->linktomodules == 'yes' ) : ?>
										<a href="<?php echo get_permalink( $id ); ?>" class="<?php echo $type_classes; ?>">
											<?php echo $short_name; ?>
											<?php if ( $senior_only == 'yes' ) : ?>
												<i>Senior Division only</i>
											<?php endif; ?>
										</a>
									<?php else : ?>
										<span class="<?php echo $type_classes; ?>">
											<?php echo $short_name; ?>
											<?php if ( $senior_only == 'yes' ) : ?>
												<i>Senior Division only</i>
											<?php endif; ?>
										</span>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php else : ?>
						<ul class="curriculum-modules">
							<li>
								<span class="general">Coming Soon</span>
							</li>
						</ul>
					<?php endif; ?>
				</div>
			</li>
		<?php endfor; ?>
	</ul>
<?php endif; ?>