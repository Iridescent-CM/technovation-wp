<?php global $wp_embed; ?>

<ul class="fl-toc">
	<?php for ( $i = 0; $i<count($settings->nav_item); $i++ ) : ?>
		<li>
			<a href="#<?php echo $settings->nav_item[ $i ]->nav_id; ?>"><?php echo $settings->nav_item[ $i ]->name; ?></a>
		</li>
	<?php endfor; ?>
</ul>