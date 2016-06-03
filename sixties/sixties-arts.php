<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-arts (no sidebar)
 *
 * @file           sixties-arts.php
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
<title>The Arts</title>
<meta name="description" content="Exceptional innovation defined the burgeoning campus and community arts scene during the 1960s. In less than four years – between 1965 and 1969 – the Center for New Music, the Center for New Performing Arts, the International Writing Program, and the intermedia program at the School of Art and Art History – the first of its kind in the country – were established."/>
<meta name="keywords" content="Art in Iowa, The Arts in Iowa, Art in the 60s, Images of the Sixties, Video of the Sixties, The Arts, Iowa, 1960s, 1960's, 60's alumni, University of Iowa"/>
</head>
	<div id="sixties-content">
		<div id="opening-text">
			<div class="custom-heading">
			The Arts
			</div>
			<p>
				Exceptional innovation defined the burgeoning campus and community arts scene during the 1960s. In less than four years – between 1965 and 1969 – the Center for New Music, the Center for New Performing Arts, the International Writing Program, and the intermedia program at the School of Art and Art History – the first of its kind in the country – were established.
		</div>
<div class="owl-carousel sixtiesImages">
<?php
echo do_shortcode('[pods name="slide" template="Slide (standard)" orderby="slide_sort_order" where="slidesyndication.slug=\'the-arts\'"]');
 ?>
</div>
</div>

<?php get_footer(); ?>
