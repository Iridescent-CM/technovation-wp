<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Underscores_Technovation
 */

?>

	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar(); ?>
		<div class="site-info">
			&copy; <?php echo date('Y'); ?> Technovation. All Rights Reserved. Technovation is a 501c3 nonprofit organization in the United States.
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>