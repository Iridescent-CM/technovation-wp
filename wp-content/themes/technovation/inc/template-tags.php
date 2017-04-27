<?php

function technovation_excerpt( $limit ) {
	echo '<p>' . wp_trim_words( get_the_excerpt(), $limit ) . '</p>';
}