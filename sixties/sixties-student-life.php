<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-student-life (no sidebar)
 *
 * @file           sixties-student-life.php
 * @package        Responsive
 * @author         Ethan DeGross
 * @license        GNU General Public License v2 or later
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page1.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
<head>
<title>Student Life</title>
<meta name="description" content="Hair styles and fashions, visitation hours in dorms, rules of conduct, and more: Campus life changed dramatically in just one decade. Your mid-term exam essay question: Compare and contrast various aspects of student life between 1960 and 1970."/>
<meta name="keywords" content="Student Life in Iowa, Images of the Sixties, Video of the Sixties, Student Life, Iowa, 1960s, 1960's, 60's alumni, University of Iowa"/>
</head>
	<div id="sixties-content">
		<div id="opening-text">
			<div class="custom-heading">
			Student Life
			</div>
			<p>
Hair styles and fashions, visitation hours in dorms, rules of conduct, and more: Campus life changed dramatically in just one decade. Your mid-term exam essay question: Compare and contrast various aspects of student life between 1960 and 1970.	</p>
		</div>

		<div class="owl-carousel sixtiesImages">
		<?php
		echo do_shortcode('[pods name="slide" template="Slide (standard)" orderby="slide_sort_order" where="slidesyndication.slug=\'student-life\'"]');
		 ?>
	 </div>
</div>
<?php get_footer(); ?>
