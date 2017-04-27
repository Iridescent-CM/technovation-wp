<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Technovation
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_technovation' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="logo-nav">
			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title">
				<?php else : ?>
					<p class="site-title">
				<?php endif; ?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else: ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</a>

				<?php if ( is_front_page() && is_home() ) : ?>
					</h1>
				<?php else : ?>
					</p>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'depth' => 1,
					'link_before' => '<span>',
					'link_after' => '</span>'
				) ); ?>
			</nav>
		</div>

		<nav id="secondary-navigation" class="secondary-navigation" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'secondary',
				'menu_id' => 'secondary-nav',
				'depth' => 1,
				'link_before' => '<span>',
				'link_after' => '</span>'
			) ); ?>
		</nav>

	</header>

	<?php if ( ! FLBuilderModel::is_builder_enabled()  || is_search() ) : ?>
		<?php
			$image_url;
			$image_id = get_post_thumbnail_id( $post->ID );

			if ( is_singular( array( 'post', 'page' ) ) && ! empty( $image_id ) ) {
				$image_url = wp_get_attachment_url( $image_id );
			} else {
				$image_url = get_header_image();
			}
		?>

		<div class="page-image-header" style="background-image:url(<?php echo $image_url; ?>);">
			<h1 class="page-image-title">
				<?php if ( is_404() ) : ?>
					Not Found
				<?php elseif ( is_archive() ) : ?>
					<?php the_archive_title(); ?>
				<?php elseif ( is_search() ) : ?>
					Search Results <span>for &ldquo;<?php echo get_search_query(); ?>&rdquo;</span>
				<?php else : ?>
					<?php single_post_title(); ?>
				<?php endif; ?>
			</h1>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">

