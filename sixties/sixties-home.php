<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-home (no sidebar)
 *
 * @file           sixties-home.php
 * @package        Responsive
 * @author         Ethan DeGross
 * @license        GNU General Public License v2 or later
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page1.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-full" class="grid col-940">
	<div class="header section">

		<div class="section-inner">
			<div id="uptight-and-laidback">
			<a href="http://dsps.lib.uiowa.edu/sixties/"><img class="alignnone size-full wp-image-13" src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/03/1960s_WebDesign_BigTitleBlock.png" alt="Black background, with title Uptight and Laid back, Iowa City in the 1960's" width="1386" height="797" /></a>
			</div>

			<div id="whole_header_menu" align="center">
				<a href="https://dsps.lib.uiowa.edu/sixties/student-life/">
				<div id="menu_item_1" class="header_menu">
				Student Life
			</div></a>
				<a href="https://dsps.lib.uiowa.edu/sixties/politics-protests/">
				<div id="menu_item_2" class="header_menu">
				Politics & Protest
			</div></a>
			<a href="https://dsps.lib.uiowa.edu/sixties/the-arts/">
				<div id="menu_item_3" class="header_menu">
				The Arts
				</div><a/>
				<a href="https://dsps.lib.uiowa.edu/sixties/civil-rights/">
				<div id="menu_item_4" class="header_menu">
				Civil Rights
			</div></a>
			<a href="https://dsps.lib.uiowa.edu/sixties/pop-culture/">
				<div id="menu_item_5" class="header_menu">
				Pop Culture
			</div></a>
			<a href="https://dsps.lib.uiowa.edu/sixties/feminism-gay-rights/">
				<div id="menu_item_6" class="header_menu">
				Feminism & Gay Rights
			</div></a>
			<a href="https://dsps.lib.uiowa.edu/sixties/military-service/">
				<div id="menu_item_7" class="header_menu">
				Military Service
			</div></a>
				<a href="http://dsps.lib.uiowa.edu/sixtiesmap/">
				<img class="alignnone size-full wp-image-13" src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/03/1960s_WebDesign_Map_Button-1.png" alt="A circular button with the text, Visit 1960's map of Iowa City, Iowa" style="margin-top:15px !important; margin-right:0px; margin-left:0px;"/>
				</a>
				<a href="https://dsps.lib.uiowa.edu/sixties/submission-page/">
				<img class="alignnone size-full wp-image-13" src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/03/1960s_WebDesign_Gallery_Button-1.png" alt="A circular button with the text, see submitted gallery content here" style="margin-top:15px !important; margin-right:0px; margin-left:0px;"/>
			</a>
			</div>
		</div>
			</div>

	<div id="sixties-content">
		<div id="opening-text">
			<div class="custom-heading">
			Welcome to Iowa City in the Sixties
			</div>
			<?php iinclude_page(18); ?>
		</div>
		<div id="sixties-map">
			<div class="custom-heading">
				Map & Timeline
			</div>
			<div align="center">
				<a href="http://dsps.lib.uiowa.edu/sixtiesmap/">
			<img src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/02/1960s_WebDesign_MAP.png" alt="1960s_WebDesign_MAP" width="1597" height="975" class="alignnone size-full wp-image-93" />
				</a>
			</div>
			</div>


				<div id="showcase-video">
						<div class="custom-heading">
							Videos
						</div>
						<div id="showcase-video-content" align="center">



											<video width="320" height="240" preload="none" controls poster="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/1960s_WebDesign_Video03-1.png">
												<source src="http://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/videoA.mov" type="video/mp4">
												<source src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/videoD.mp4" type="video/mp4">
												Your browser does not support the video tag.
											</video>
											<video width="320" height="240" preload="none"controls poster="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/1960s_WebDesign_Video01-1.png">
												<source src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/videoE.mp4" type="video/mp4">
												Your browser does not support the video tag.
											</video>
											<video width="320" height="240" preload="none" controls poster="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/1960s_WebDesign_Video02-1.png">
												<source src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/videoF.mp4" type="video/mp4">
												Your browser does not support the video tag.
											</video>
						</div>
			</div>

					<!-- If in the future we get more videos and decide to go with YouTube, or Vimeo.

					<div class="owl-carousel sixtiesVideo">
					    <div class="item-video" data-merge="3"><a class="owl-video" href="http://vimeo.com/23924346"></a></div>
					    <div class="item-video" data-merge="1"><a class="owl-video" href="https://www.youtube.com/watch?v=JpxsRwnRwCQ"></a></div>
					    <div class="item-video" data-merge="2"><a class="owl-video" href="http://www.youtube.com/watch?v=FBu_jxT1PkA"></a></div>
					    <div class="item-video" data-merge="1"><a class="owl-video" href="http://www.youtube.com/watch?v=oy18DJwy5lI"></a></div>
					    <div class="item-video" data-merge="2"><a class="owl-video" href="http://www.youtube.com/watch?v=H3jLkJrhHKQ"></a></div>
					    <div class="item-video" data-merge="3"><a class="owl-video" href="https://www.youtube.com/watch?v=g3J4VxWIM6s"></a></div>
					    <div class="item-video" data-merge="1"><a class="owl-video" href="http://www.youtube.com/watch?v=0fhoIate4qI"></a></div>
					    <div class="item-video" data-merge="2"><a class="owl-video" href="https://www.youtube.com/watch?v=EF_kj2ojZaE"></a></div>
					</div>
						</div>
					-->



		<div id="showcase-audio">
				<div class="custom-heading">
					Audio
				</div>
					<div id="showcase-audio-content" align="center">
						<div id="audio-box-2">
								<img src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/newA_1960s_WebDesign_FrankPatton_Audio.png"/>
							<audio controls preload="none">
								<source src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/echoesOldGold.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
							</audio>
						</div>

						<div id="audio-box-3">
								<img src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/new_1960s_WebDesign_Smothers_Audio.png"/>
							<audio controls preload="none">
									<source src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/03/WalcoffTape-5-SmothersBrothersInterviewAt-IMU-1962_01.mp3" type="audio/mpeg">
								Your browser does not support the audio element.
							</audio>
						</div>

						<div id="audio-box-4">
								<img src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/new_1960s_WebDesign_Judy_Audio.png"/>
							<audio controls preload="none">
								<source src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/03/WalcoffTape-6-JudyWalcoffonFashion-1958.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
							</audio>
						</div>
					</div>
		</div>


		<div id="showcase-photograph" align="left">
				<div class="custom-heading" align="left">
					Glimpses into the Sixties
				</div>
				<div class="owl-carousel sixtiesImages">
				<?php
				echo do_shortcode('[pods name="slide" template="Slide (standard)" orderby="slide_sort_order" where="slidesyndication.slug=\'sixties-main-photos\'"]');
				 ?>
			 </div>
		</div>


		<div id="sixties-footer">
			<div id="sixties-footer-inner">
			<a href="https://dsps.lib.uiowa.edu/sixties/submission-page/" target="blank"><img class="alignnone size-full wp-image-91" src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/02/footer-submit-text.png" alt="footer-submit-text" width="1480" height="257" />
			</div>
		</a>
		<div id="sixties-footer-inner1">
			<img class="alignnone size-full wp-image-91" src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/1960s_Contact_Transparent.png" alt="Contact-us-text"/>
		</div>
	</a>
			<div id="sixties-footer-inner2">
				<span style="color:white; font-family: roboto slab;">Questions, comments, suggestions?</span></br>
				Contact David McCartney</br>
				lib-spec@uiowa.edu
			</div>

			<div id="sixties-footer-logo">
				<a href="https://www.uiowa.edu/">
					<img src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/UIowa_Libraries_Logo_NEW_IOWA_1.png"/>
				</a>
			</div>
			<div id="sixties-footer-logo1">
				<a href="https://www.lib.uiowa.edu/">
					<img src="https://dsps.lib.uiowa.edu/sixties/wp-content/uploads/sites/7/2016/04/UIowa_Libraries_Logo_NEW2_1.png"/>
			</a>
			</div>
		</div>
	</div>
</div>

	<?php if ( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-header', get_post_type() ); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta', get_post_type() ); ?>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data', get_post_type() ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

	else :

		get_template_part( 'loop-no-posts', get_post_type() );

	endif;
	?>
</div><!-- end of #content-full -->

<?php include	 'footer.php'; ?>
