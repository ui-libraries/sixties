<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-civil-rights (no sidebar)
 *
 * @file           sixties-civil-rights.php
 * @package        Responsive
 * @author         Ethan DeGross
 * @license        GNU General Public License v2 or later
 * @version        1.0.0
 * @filesource     wp-content/themes/responsive/full-width-page1.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
<head>
<title>Civil Rights</title>
<meta name="description" content="The Rev. Martin Luther King, Jr.’s, first visit to Iowa in 1959. Establishment of the Committee on Human Rights in 1963. Students who volunteered in Freedom Summer in Mississippi in 1964. A spring practice boycott by Black football players in 1969. These events – and more – are documented here."/>
<meta name="keywords" content="Civil Rights in Iowa, Civil Rights in the 60s, Images of the Sixties, Video of the Sixties, Civil Rights, Iowa, 1960s, 1960's, 60's alumni, University of Iowa"/>
</head>
	<div id="sixties-content">
		<div id="opening-text">
			<div class="custom-heading">
			Civil Rights
			</div>
			<p>
				The Rev. Martin Luther King, Jr.’s, first visit to Iowa in 1959. Establishment of the Committee on Human Rights in 1963. Students who volunteered in Freedom Summer in Mississippi in 1964. A spring practice boycott by Black football players in 1969. These events – and more – are documented here.
		</div>

<div class="owl-carousel sixtiesImages">
<?php
echo do_shortcode('[pods name="slide" template="Slide (standard)" orderby="slide_sort_order" where="slidesyndication.slug=\'civil-rights\'"]');
 ?>
</div>
</div>
<?php get_footer(); ?>
