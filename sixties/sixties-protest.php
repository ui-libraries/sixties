<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-protest (no sidebar)
 *
 * @file           sixties-protest.php
 * @package        Responsive
 * @author         Ethan DeGross
 * @license        GNU General Public License v2 or later
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page1.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
	<div id="sixties-content">
		<div id="opening-text">
			<div class="custom-heading">
			Politics & Protest
			</div>
			<p>
Did you join a group or political movement? Did you march? Write a letter to the editor? Check out sample FBI files from the University Archives, rally posters, bumper stickers, and more. As Carol Hanisch wrote in her 1969 essay, “The personal is political.”		</div>

		<div class="owl-carousel sixtiesImages">
		<?php
		echo do_shortcode('[pods name="slide" template="Slide (standard)" orderby="slide_sort_order" where="slidesyndication.slug=\'politics-and-protest\'"]');
		 ?>
	 </div>

<?php get_footer(); ?>
