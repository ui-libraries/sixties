// Developed and commented by Rob Shepard, GIS Specialist, University of Iowa Libraries
// Many parts of the code are derived from University of Minnesota's "Campus History" app, by permission:
// Kevin Dyke, University of Minnesota: "I don't care. Not only do I not care, I wholeheartedly endorse it. Thumbs up emoji."
// 

dojo.require("esri.tasks.query");
dojo.require("esri.map");
dojo.require("esri.layers.FeatureLayer");
dojo.require("esri.layers.wms");
dojo.require("esri.dijit.TimeSlider");
dojo.require("esri.dijit.BasemapGallery");
dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.layout.ContentPane");
dojo.require("dijit.layout.TabContainer");
dojo.require("dijit.layout.AccordionContainer");
dojo.require("dijit.Menu");
dojo.require("dijit.Dialog");
dojo.require("dijit.form.CheckBox");
dojo.require("dijit.form.ComboBox");
dojo.require("dijit.form.Button");
dojo.require("dijit.form.HorizontalSlider");
dojo.require("dojo.store.Memory");
dojo.require("esri.dijit.Popup");
//dojo.require("esri.dijit.PopupTemplate");
dojo.require("dojo.parser");
dojo.require("esri.InfoWindowBase");


var PORT,PROTOCOL,SERVER_NAME,SERVER_URL;
PROTOCOL="https:";
SERVER_NAME="gis.uspatial.umn.edu";
SERVER_URL=PROTOCOL+"//"+SERVER_NAME+"/arcgis/rest/services/Libraries/CampusHistory_";

var campusMapLayerUrl=SERVER_URL+"Mosaic/ImageServer",
protestsLayerUrl="https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/data/MapServer/1",
thePhotosLayerUrl="https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/datafeature/MapServer/0",
wmsUrl=PROTOCOL+"//geoint.lmic.state.mn.us/cgi-bin/wmsll?",
footprintUrl="https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/data/MapServer/2",
imagery1969url="https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/campus1969/MapServer",
imagery1972url="https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/campus1972/MapServer",

cdmsearchUrl="http://digital.lib.uiowa.edu/cdm/search/collection/aawiowa!aaws!api!birkby!dentistry!di!dp!drewelowe!flood!grantwood!ias!ictcs!jamesmorris!joh!kinnick!latinas!lemberger!osa!socjustice!weber!womensmvmt!yearbooks!/field/all!all/mode/all!all/conn/and!and/searchterm/1960-1970!";
//cdm search should be changed to "http://digital.lib.uiowa.edu/cdm/search/collection/aawiowa!aaws!api!birkby!dentistry!di!dp!drewelowe!flood!grantwood!ias!ictcs!jamesmorris!joh!kinnick!latinas!lemberger!osa!socjustice!weber!womensmvmt!yearbooks!/field/all!all/mode/all!all/conn/and!and/searchterm/1960-1970!"

//set the map initial extent here
function init(){var b=new esri.geometry.Extent({"xmin":-10190621.63516258,"ymin":5109623.32035132,"xmax":-10189092.894597005,"ymax":5110744.794875597,spatialReference:{wkid:3857}}),
d=new esri.Map("map",{extent:b});
createBasemapGallery(d);
dojo.connect(d,"onLoad",function(b){buildLayers(d)});
dojo.connect(d,"onUpdateStart",function(){esri.show(dojo.byId("loading"))});
dojo.connect(d,"onUpdateEnd",function(){esri.hide(dojo.byId("loading"))})}

function createBasemapGallery(b){var d=[],
c=new esri.dijit.Basemap({layers:[new esri.dijit.BasemapLayer({url:"https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/SIXTIESFAST/MapServer",displayLevels:[14,15,16,17,18,19]}),

new esri.dijit.BasemapLayer({url:"https://gis.lib.uiowa.edu/gislib1/rest/services/Sixties/SIXTIESFAST/MapServer",
displayLevels:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]})],id:"basemapGray",title:"60s"});
d.push(c);

c=new esri.dijit.Basemap({layers:[new esri.dijit.BasemapLayer({url:PROTOCOL+"//services.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer"})],
id:"basemapImagery",title:"Now"});
d.push(c);

c=new esri.dijit.Basemap({layers:[new esri.dijit.BasemapLayer({url:PROTOCOL+"//services.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer"})],
id:"basemapTopo",title:"Topo"});
d.push(c);
basemapGallery=new esri.dijit.BasemapGallery({showArcGISBasemaps:!1,basemaps:d,map:b});
dojo.forEach(basemapGallery.basemaps,
function(b){dijit.byId("basemapMenu").addChild(new dijit.MenuItem({label:b.title,onClick:dojo.hitch(this,function(){this.basemapGallery.select(b.id)})}))})}

function buildLayers(b){function d(b,a){var d=new esri.layers.ArcGISTiledMapServiceLayer(a,{id:"imagery"+b+"Layer",opacity:1,visible:!1});
c.push(d)}var c=[],
a=new esri.InfoTemplate;
a.setTitle("${Activity}");
a.setContent("<a href=${source}>${source}</a><a href=${photourl}>${photourl}</a>");

a=new esri.layers.FeatureLayer(protestsLayerUrl,{mode:esri.layers.FeatureLayer.MODE_SNAPSHOT,outFields:["Activity", "photourl", "source"],infoTemplate:a,id:"protestsLayer",
visible:!0});
c.push(a);


s=new esri.InfoTemplate;
s.setTitle("${Name}");
s.setContent("<img class='esriPopupMediaImage' src=${TMB2}><a href=${URL}>Click here for full-size image</a>");
//s.setPopup("<img class='esriPopupMediaImage' src='${TMB2}'>");
//the set content part is really close - it knows that there should be an image but it isn't reading the text for TMB2

a=new esri.layers.FeatureLayer(thePhotosLayerUrl,
{mode:esri.layers.FeatureLayer.MODE_SNAPSHOT,
outFields:["TMB2", "Name", "URL"],
infoTemplate:s,
id:"thePhotosLayer",
visible:!0});
c.push(a);

//var s = new PopupTemplate({
//  title: "Picture Info",
//  mediaInfos: [{
 //   "title": "",
 //   "caption": "",
 //   "type": "image",
 //   "value": {
 //     "sourceURL": "{TMB2}",
 //     "linkURL": "{URL}"
//    }
//  }]
//});

d(1940,imagery1969url);
d(1953,imagery1972url);

"http:"==PROTOCOL&&(a=new esri.layers.WMSLayerInfo({name:"bw1997",title:"1997 bw 7-county"}),

//a={extent:new esri.geometry.Extent({"xmin":-10190621.63516258,"ymin":5109623.32035132,"xmax":-10189092.894597005,"ymax":5110744.794875597,
//spatialReference:{wkid:3857}}),
//layerInfos:[a],spatialReferences:[3857]},
//a=new esri.layers.WMSLayer(wmsUrl,{resourceInfo:a,visible:!1}),
//a.id="wms1997Layer",
//a.setImageFormat("jpg"),
//c.push(a),a=new esri.layers.WMSLayerInfo({name:"metro",title:"2004 color MSP"}),

a={extent:new esri.geometry.Extent({"xmin":-10190621.63516258,"ymin":5109623.32035132,"xmax":-10189092.894597005,"ymax":5110744.794875597,
spatialReference:{wkid:3857}}),spatialReferences:[3857],
layerInfos:[a]},a=new esri.layers.WMSLayer(wmsUrl,{resourceInfo:a,visible:!1}),
a.id="wms2004Layer",
a.setImageFormat("jpg"),
c.push(a),
a=new esri.layers.WMSLayerInfo({name:"nga2008",title:"2008 color Twin Cities"}),

a={extent:new esri.geometry.Extent({xmin:475500,ymin:4964952,xmax:498043.2,ymax:4984500,
spatialReference:{wkid:3857}}),spatialReferences:[3857],layerInfos:[a]},
a=new esri.layers.WMSLayer(wmsUrl,{resourceInfo:a,visible:!1}),
a.id="wms2008Layer",a.setImageFormat("jpg"),c.push(a));
a=new esri.layers.ArcGISImageServiceLayer(campusMapLayerUrl,{id:"campusMapLayer",opacity:.7,visible:!1});
c.push(a);

var g="<span class='aka'>${Name:formatAllNames}</span><b>Year Built: </b> ${STDATE:yearFormat}${ENDATE:nameOrShapeChange}${ENDATE:yearRazedChange}<b><a id='cdmsearch' href=\""+
cdmsearchUrl+"${Name}\" target='_blank'>Search IDL for 1960s Era Connections</a></b>",
a=new esri.InfoTemplate;a.setTitle("${Name:formatInfoWindowTitle}");
a.setContent(g);

var g=(new esri.symbol.SimpleFillSymbol).setColor(new dojo.Color("#7A0019")),
e=new esri.layers.FeatureLayer(footprintUrl,{mode:esri.layers.FeatureLayer.MODE_SNAPSHOT,outFields:"Name Notes".split(" "),
infoTemplate:a,id:"footprintLayer"});
e.setSelectionSymbol(g);
b.addLayer(e);
dojo.connect(e,"onLoad",function(){b.addLayers(c);querycampusMapLayer(b);initSlider(b,e);searchBox(b,e)})}

function searchBox(b,d){var c=dojo.create("DIV",{id:"buildingSearchDiv","class":"overlay-map top-left hideSearch"},dojo.byId("map"));
dojo.create("INPUT",{id:"buildingSearch"},c);
c=dojo.create("BUTTON",{id:"buildingSearchButton"},c);
new dijit.form.Button({id:"buildingSearchButton","class":"button-gradient button-border",label:"Locate Building",onClick:function(){buildingQuery(dijit.byId("buildingSearch").get("value"),b,d)}},c);

var c=new esri.tasks.QueryTask(footprintUrl, protestsLayerUrl, thePhotosLayerUrl),a=new esri.tasks.Query;
a.f="pjson";
a.outFields=["label"];
a.returnGeometry=!1;
a.where="Name LIKE '%'";

c.execute(a,function(b){var a=[];b=b.features;for(var c=b.length;c--;)a.push({label:b[c].attributes.label});
a=new dojo.store.Memory({data:a});

new dijit.form.ComboBox({fetchProperties:{sort:[{attribute:"label",descending:!1}]},
id:"buildingSearch",name:"building",placeHolder:"Search for a building...",store:a,searchAttr:"label",labelAttr:"label",labelType:"text",queryExpr:"*${0}*",highlightMatch:"none",autoComplete:!1,ignoreCase:!0,
searchDelay:400,hasDownArrow:!0,maxHeight:250},"buildingSearch");
a=dojo.byId("buildingSearchDiv");
dojo.toggleClass(a,"hideSearch")})}

function buildingQuery(b,d,c){var a=new esri.tasks.Query;b=b.replace(/'/g,"''");
a.where="label = '"+b+"'";c.selectFeatures(a).then(function(b){b=b[0];
var a=(new Date(b.attributes.STDATE)).getUTCFullYear
f=(new Date(d.timeExtent.startTime)).getUTCFullYear();
//my change was:
//f=(new Date("12/31/1958")).getUTCFullYear();
d.timeSlider._bumpSlider(a-f);
b=b.geometry.getExtent();
d.setExtent(b,!0);
window.setTimeout(function(){c.clearSelection()},2500)},
function(b){console.log(b.message)})}

//for the image services, this classifies, queries and orders the "campus maps" note - this isn't used in this app, but I want to keep it for future additions
function querycampusMapLayer(b){var d=new esri.tasks.QueryTask(campusMapLayerUrl+"/"),
c=new esri.tasks.Query;
c.returnGeometry=!1;
c.outFields=["img_year","loc_yr2"];
c.where="";
d.execute(c,function(a){var c=[];
a=a.features;for(var d=a.length;d--;){var f=a[d].attributes,
h=f.img_year,
k=f.loc_yr2,
f=f.OBJECTID;
//original was:
c.push({year:(new Date(h)).getUTCFullYear(),UTCval:h,name:k,OID:f})}c=c.sort(function(b,a){return a.year-b.year});
//my change was:
//c.push({year:(new Date("12/31/1958"))})}c=c.sort(function(b,a){return a.year-b.year});
buildTabs(b,c)})}


//tabs and transparency settings
function buildTabs(b,d){function c(b,a){if("slider"==b)return"Move slider to make "+a+" more or less transparent";
if("checkbox"==b)return"Click to turn "+a+" on or off"}function a(b,a,d,f,h,e){e*=10;
d=dojo.create("DIV",{id:a+"Wrapper","class":"control-wrapper"},d);
var g=dojo.create("DIV",{id:a+"CheckBoxWrapper","class":"checkbox-wrapper"},d),
k=dojo.create("DIV",{id:a+"Slider",title:c("slider",h)},d);
d=dojo.create("INPUT",{type:"checkbox",id:a+"VisibilityCheckBox","class":"checkbox"},g);

dojo.create("LABEL",
{"for":a+"VisibilityCheckBox","class":"checkbox-label",innerHTML:f},g);

var m=new dijit.form.HorizontalSlider({name:a+"Slider",value:e,minimum:0,maximum:10,intermediateChanges:!0,discreteValues:11,showButtons:!0,"class":"slider",title:c("slider",h),
onChange:function(c){b.getLayer(a).setOpacity(c/10)}},k);
f=dijit.form.CheckBox;
e=!0===b.getLayer(a).visible?"checked":!1;

new f({name:a+"VisibilityCheckBox",checked:e,title:c("checkbox",h),onChange:function(c){var d;d=b.getLayer(a);
"esri.layers.WMSLayer"==
d.declaredClass?!1!==c?(!0!==d.visible&&d.setVisibility(!0),d.setVisibleLayers(d.layerInfos[0].name)):d.setVisibleLayers(""):(d.setVisibility(c),!0===d.visible&&d.setOpacity(m.value/10))}},d)}var g=dijit.byId("tab-cont"),
e=dojo.create("DIV",{id:"historic_maps_tab"});
a(b,"campusMapLayer",e,"Future Layers (not used)","historic campus maps",.7);

var f=dojo.create("DIV",{id:"accordion_div"},e);
dijit.byId("cp1").set("content",e);
aContainer=new dijit.layout.AccordionContainer({id:"accordion"},f);

//Individual DIVs here for each panel in the accordion container

//var h=dojo.create("DIV");
//h.id="Content_Before1921_div";

//var k=dojo.create("DIV");
//k.id="Content_1921_1950_div";

//var m=dojo.create("DIV");
//m.id="Content_1951_1980_div";

//var n=dojo.create("DIV");
//n.id="Content_Since1981_div";

//the "aContainer.addChild" part is needed for EACH content pane. Letter signifies var/div above; if we need it, the code is here

//aContainer.addChild(new dijit.layout.ContentPane({title:"Before 1921",content:h}));
//aContainer.addChild(new dijit.layout.ContentPane({title:"1921-1950",content:k}));
//aContainer.addChild(new dijit.layout.ContentPane({title:"1951-1980",content:m}));
//aContainer.addChild(new dijit.layout.ContentPane({title:"Since 1981",content:n}));
//aContainer.startup();

air_photos_tab=dojo.create("DIV",{id:"air_photos_tab"});
dijit.byId("cp2").set("content",air_photos_tab);
data_layers_tab=dojo.create("DIV",{id:"data_layers_tab"});

dijit.byId("cp3").set("content",data_layers_tab);a(b,"imagery1940Layer",air_photos_tab,"1969 Campus Map","1940 aerial photos",1);
a(b,"imagery1953Layer",air_photos_tab,"1972 Campus Map","1953 aerial photos",1);

"http:"==PROTOCOL&&(a(b,"wms1997Layer",air_photos_tab,"1997 Aerial Photos On/Off","1997 aerial photos",1),
a(b,"wms2004Layer",air_photos_tab,"2004 Aerial Photos On/Off","2004 aerial photos",1),
a(b,"wms2008Layer",air_photos_tab,"2008 Aerial Photos On/Off","2008 aerial photos",1));
a(b,"footprintLayer",data_layers_tab,"Campus Buildings","historic building footprints",.9);
a(b,"protestsLayer",data_layers_tab,"Protests","historic protests",.9);
a(b,"thePhotosLayer",data_layers_tab,"Photographs","thePhotosLayer",.9);

//see above - 3 - this part goes with the accordion container settings
(function(b,a){for(i=d.length;i--;){var c=d[i].year,f=d[i].UTCval,e=d[i].name,g=d[i].OID,l=dojo.create("BUTTON");
l.id="button"+g;1921>c?h.appendChild(l):1951>c?k.appendChild(l):1981>c?m.appendChild(l):1981<=c&&n.appendChild(l);

new dijit.form.Button({label:"<div> <img src='"+
(campusMapLayerUrl+"/")+g+"/info/thumbnail'class='thumbnail' height='65px' width='65px' alt='"+c+"'/> <span class = 'label-span'>"+e+"</span></div>",
value:f,ObjID:g,"class":"accordion-button button-gradient accordion-button-border",
onClick:function(){var a=dijit.registry.byId("campusMapLayerVisibilityCheckBox"),
c=a.checked,
d=dijit.registry.byId("campusMapLayerSlider").value/1,
f=b.getLayer("campusMapLayer");
!1===c&&(a.setChecked("checked"),
f.setOpacity(d));
changeTimeAndExtent(b,this.value,this.ObjID)}},
l.id)}})(b,d)}

//time slider controls
function initSlider(b,d){
var c=new esri.TimeExtent,
c=d.timeInfo.timeExtent;
timeSlider=new esri.dijit.TimeSlider({"class":"timeslider"},
dojo.byId("timeSliderDiv"));
b.setTimeSlider(timeSlider);

var c=c.offset(118,"esriTimeUnitsYears"),
//the offset defines the years it should be "offset" from the lowest date in dataset
a=new Date("12/31/1958"),
a=a.setFullYear(a.getFullYear()-1),
a=new Date("12/31/1974");
c.endTime=a;timeSlider.setThumbCount(1);
timeSlider.singleThumbAsTimeInstant(!0);
timeSlider.setThumbMovingRate(500);
timeSlider.createTimeStopsByTimeInterval(c,1,"esriTimeUnitsYears");

var g=dojo.map(timeSlider.timeStops,function(b,
a){return 0===a%20?b.getUTCFullYear():""}),
e=dojo.map(timeSlider.timeStops,function(b,a){return 0===a%1?b.getUTCFullYear():""});
700<b.width?b.timeSlider.setLabels(e):b.timeSlider.setLabels(g);
tickCount=1;
timeSlider.setTickCount(tickCount);
timeSlider.startup();
dojo.connect(b,"onResize",function(){700<b.width?b.timeSlider.setLabels(e):b.timeSlider.setLabels(g)});
dojo.connect(b.timeSlider._timer,"onStart",function(){b.getLayer("campusMapLayer").suspend()});
dojo.connect(b.timeSlider._timer,"onStop",

//the campus map layer MUST remain in place or the app breaks. The Time Slider is communicating with it.

function(){b.getLayer("campusMapLayer").resume()});
c=b.timeExtent.startTime.getUTCFullYear();
dojo.byId("currentTimeExtent").innerHTML=c;
dojo.connect(b,"onTimeExtentChange",function(a){a=dojo.byId("herky");

var c=b.timeExtent.startTime.getUTCFullYear();
dojo.byId("currentTimeExtent").innerHTML=c;1905>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1899",!0)):1905<=c&&1941>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1905",!0)):1941<=c&&1954>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1941",!0)):1954<=c&&1965>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1954",!0)):1965<=c&&1979>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1965",!0)):1979<=c&&1985>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1979",!0)):1985<=c&&1990>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1985",!0)):1990<=c&&2E3>c?(dojo.removeClass(a),
dojo.toggleClass(a,"g1990",!0)):2E3<=c&&(dojo.removeClass(a),
dojo.toggleClass(a,"g2000",!0))})}

function yearRazedChange(b,d,c){b=c.ENDATE;
return null===b?"":"<b>Year Changed/Razed: </b> "+(new Date(b)).getUTCFullYear()+"<br/>"}function nameOrShapeChange(b,d,c){b=c.STDATE;
c=new Date(c.ENDATE);
if("1"==b)return"<b>Year Name Changed: </b> "+c.getUTCFullYear()+"<br/>";
if("3"==b)return"<b>Year Name Changed and Footprint Altered: </b> "+c.getUTCFullYear()+"<br/>";
if("4"==b)return"";
if("9"==b)return"<b>Year Footprint Altered: </b> "+c.getUTCFullYear()+"<br/>";
if("0"==b)return""}

//query ContentDM for the image
function photoSearch(b,d,c){b=c.Name;
b=b.replace(/[^A-z0-9 ]/g,"");

return b=b.replace(/ /g,"%20AND%20")}function yearFormat(b,d,c){return(new Date(b)).getUTCFullYear()+"<br/>"}function formatInfoWindowTitle(b,d,c){b=c.Name;
return 57<b.length?b.slice(0,57)+"...":b}function formatAllNames(b,d,c){b=c.Name;
if((c=c.Name)&&b&&b!=c)return'<b>Other Names:</b><br/><span class="names-all">'+c.replace(/\|/g,"<br/>")+"</span><br/>"}

function changeTimeAndExtent(b,d,c){d=(new Date(d)).getUTCFullYear();
var a=(new Date(b.timeExtent.startTime)).getUTCFullYear();

b.timeSlider._bumpSlider(d-a);esri.request({url:campusMapLayerUrl+"/"+c+"/info",
content:{f:"pjson"},
callbackParamName:"callback"}).then(function(a){a=new esri.geometry.Extent(a.extent);
a.spatialReference=new esri.SpatialReference(3857);
b.setExtent(a,!0)},function(a){console.log(a.message)})}function openHelpDialog(){dijit.byId("helpDialog").show()}
function openCommentsDialog(){dijit.byId("commentsDialog").show()}dojo.addOnLoad(init);