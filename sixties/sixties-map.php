<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  sixties-map
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

#get_header('map'); ?>
	<link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/3.2/js/dojo/dijit/themes/claro/claro.css"/>
<!--	<link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/3.2/js/esri/css/esri.css" /> -->
	<link rel="stylesheet" type="text/css" href="../../scripts/maps/esri.css" />
	<link rel="stylesheet" type="text/css" href="../../scripts/maps/mapStyle.css.iowa.css"/>
	<!--<link rel="stylesheet" type="text/css" href="mapStyle.css.uncompressed.css"/>-->
    <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'/>  
	<script type="text/javascript">
      var djConfig = {
        parseOnLoad: true
      };
    </script>
    
    
    <!--MAIN LAYOUT CONTAINER-->
    <div id="mainWindow" dojoType="dijit.layout.BorderContainer" design="sidebar" gutters="false" style="width:100%; height:100%;">   	
	
		<div id="helpDialog" data-dojo-type="dijit.Dialog" title="Welcome!" style="display: none;width:500px">
			<div data-dojo-type="dijit.layout.ContentPane" title="dialog_cp">
				Welcome to the 1960s! This application is brought to you by the <a href="http://www.lib.uiowa.edu/studio/" target="_blank">University of Iowa Libraries' Digital Scholarship & Publishing Studio</a>.
				<p>Toggle layers on or off on the table of contents left hand side by clicking on the check box. You use the sliders below each layer to adjust opacity.
				You can also add and remove actual historic campus map layers in the same way by clicking on the "campus maps" tab at the top of the table of contents</p>
				<p>Click on the objects in the map to read more information about them.</p>
				<br><br>
				
			<button data-dojo-type="dijit.form.Button" type="button">Close
				<script type="dojo/on" data-dojo-event="click" data-dojo-args="evt">
					require(["dojo/dom"], function(dom){
						dijit.registry.byId('helpDialog').hide();
					});
				</script>
			</button>
			</p>
			</div>
		</div>
	    


  
	<!--HEADER CONTAINER-->
	    <div id="header" dojoType="dijit.layout.ContentPane" data-dojo-props="layoutPriority:2" region="top" style="height:60px;position:relative;">
	        	<div id="header_text">
					<a href="http://dsps.lib.uiowa.edu/sixties/"> <img src="../../scripts/maps/images/topslab_map.png" alt="The Nineteen Sixties" height="58" width="520"/></a>
					
						<!--h3 element where "current year:" is displayed-->
			<h3 id="current_year">SELECTED YEAR:  		
				
				<!--span where the current year is dynamically displayed-->
				<span id="currentTimeExtent"></span>
				
			</h3>
			
				</div>
				
					
		</div>
		
	<!--LEFT CONTAINER-->
      <div id="left" dojoType="dijit.layout.ContentPane" data-dojo-props="layoutPriority:4, splitter:false" region="left">
			
			<!--tab container-->
			 <div id="tab-cont" data-dojo-type="dijit.layout.TabContainer">
			 
			 <!--tabs-->
				<li id="cp3" data-dojo-type="dijit.layout.ContentPane" title="Layers" data-dojo-props="selected:true"></li>
		        <li id="cp2" data-dojo-type="dijit.layout.ContentPane" title="Campus Maps"></li>
				<li id="cp1" data-dojo-type="dijit.layout.ContentPane" title=""></li>
		        
			 </div>
			

			
			<a class="help_a" href="#" onClick="openHelpDialog()">About This Project</a>
			
      </div>
	  
	<!--Time Slider / footer area-->
      <div class="footer" dojotype="dijit.layout.ContentPane" data-dojo-props="layoutPriority:5"  region="bottom">
    	
		<!-- div where the time slider will be placed -->
		<div id="timeSliderDiv"></div>
	
	  </div>	
		

      <!--Map CONTAINER-->
      <div id="map" dojoType="dijit.layout.ContentPane" data-dojo-props="splitter:true" region="center" gutters="false" style="margin:4px 4px 4px 4px; border:solid thin #000000; background-color:inherit;position:relative">
		
		
		<!-- Span to house the "Loading" image-->
		<span class = "overlay-map loading" id="loading">
			<img src="../../scripts/maps/images/Loading_icon.gif" height="150px" width="180px" alt="Loading..."/>
		</span> 
		
		<!--The dropdown menu for changing the basemap-->
		<div class="overlay-map top-right">
			<button id="dropdownButton"  label="Basemaps"  dojoType="dijit.form.DropDownButton"/>
			<div dojoType="dijit.Menu" id="basemapMenu"></div>
		</div>
		
	</div>
</div>	
<!--Scripts placed at the end to reduce load time bottleneck in the <head> -->
  	  <script type="text/javascript" src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=3.3"></script>
      <script type="text/javascript" src="../../scripts/maps/mapScript.js.iowa.js"></script>



<?php #get_footer(); ?>
