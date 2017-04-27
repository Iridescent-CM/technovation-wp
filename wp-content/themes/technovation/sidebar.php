<?php
/**
 * The sidebar containing the footer widget area.
 *
 * @package Technovation
 */

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-footer' ); ?>
</aside>
