<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-map-savedontuse
 *
 * @file           sixties-feminism-gay-rights.php
 * @package        Responsive
 * @author         Andrew
 * @license        GNU General Public License v2 or later
 * @version        1.0.0
 * @filesource     wp-content/themes/responsive/full-width-page1.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header('map'); ?>
	<div id="sixties-content">
		<div id="opening-text">
			<div class="custom-heading">
			MAP!
			</div>
			<p>
           </p>
		</div>
</div>
<script type="text/javascript">
            //copy from http://gmaps-samples.googlecode.com/svn/trunk/versionchecker.html?v=2.86
            function getURLParam(name) {
              var regexS = "[\\?&]" + name + "=([^&#]*)";
              var regex = new RegExp(regexS);
              var results = regex.exec(window.location.href);
              return (results === null ? "" : decodeURIComponent(results[1]));
            }
            var gmaps_v = getURLParam('v');
            if (gmaps_v) gmaps_v = '&v='+gmaps_v;
            var script = '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false' + gmaps_v + '"></' + 'script>';
            document.write(script);
        </script>
        <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/arcgislink/src/arcgislink.js">
        </script>
        <script type="text/javascript">
		function init() {
  var myOptions = {
    zoom: 7,
    center: new google.maps.LatLng(41.658255, 3),//35.23, -80.84),
    mapTypeId: google.maps.MapTypeId.SATELLITE, //ROADMAP
    streetViewControl: true //my favorite feature in V3!
  };
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  //var url = 'https://gis.lib.uiowa.edu/gislib1/rest/services/Atlas/data2/MapServer'; //eclisiastical / typography
  var url = 'https://gis.lib.uiowa.edu/gislib1/rest/services/Atlas/borderstest/MapServer'; //a billion borders
 // var url = 'http://sampleserver1.arcgisonline.com/ArcGIS/rest/services/Demographics/ESRI_Population_World/MapServer';
  var cpc = new gmaps.ags.CopyrightControl(map);
  var dynamap = new gmaps.ags.MapOverlay(url, { opacity: 0.5 });
  dynamap.setMap(map);
}


    
window.onload = init;
        </script>



<div id="map_canvas" style="width:100%; height:100%">
        </div>



<?php get_footer(); ?>
