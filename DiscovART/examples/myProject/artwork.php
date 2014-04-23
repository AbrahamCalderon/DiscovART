<?php include "lib.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>DiscovART</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
<link href="range.css" rel="stylesheet">
<link href="carousel.css" rel="stylesheet">
<link href="mymain.css" rel="stylesheet">
<link href="customcolorpicker.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
		/*
       function fileSelected() {
           var file = document.getElementById('fileToUpload').files[0];
           if (file) {
               var fileSize = 0;
               if (file.size > 1024 * 1024)
                   fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
               else
                   fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

               document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
               document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
               document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
           }
       }*/

       function uploadFile() {
           var fd = new FormData();
           fd.append("fileToUpload", document.getElementById('fileselect').files[0]);
           var xhr = new XMLHttpRequest();
           //xhr.upload.addEventListener("progress", uploadProgress, false);
           //xhr.addEventListener("load", uploadComplete, false);
           //xhr.addEventListener("error", uploadFailed, false);
           //xhr.addEventListener("abort", uploadCanceled, false);
		   xhr.onreadystatechange=function(){
				alert("inside onchange method");
				if (xhr.readyState==4 && xhr.status==200){
					document.write("inise if of onreadystatechange method");
					document.getElementById("newArt").innerHTML=xhr.responseText;
				}
				else
					alert("WONT' WORK!!!");
		   }
           xhr.open("POST", "uploadNewArt.php");
           xhr.send(fd);
       }

       function uploadProgress(evt) {
           if (evt.lengthComputable) {
               var percentComplete = Math.round(evt.loaded * 100 / evt.total);
               document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
               document.getElementById('prog').value = percentComplete;
           }
           else {
               document.getElementById('progressNumber').innerHTML = 'unable to compute';
           }
       }

       function uploadComplete(evt) {
           /* This event is raised when the server send back a response */
           alert(evt.target.responseText);
       }

       function uploadFailed(evt) {
           alert("There was an error attempting to upload the file.");
       }

       function uploadCanceled(evt) {
           alert("The upload has been canceled by the user or the browser dropped the connection.");
       }
   </script>

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DivscovART</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>&nbsp;&nbsp;&nbsp;
<a href="#">Sign Up</a>
          </form>
<ul class="nav navbar-nav pull-right">
 <li class="#"><a href="index.html">Home</a></li>
 <li class="active"><a href="artwork.html">Art Work</a></li>
 <li class="locate.html"><a href="locate.html">Locate</a></li>
 <li><a href="index2.php">Contact</a></li>
 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About <span class="caret"></span></a>
 <ul class="dropdown-menu">
<li><a href="#">The team</a></li>
 </ul>	 
 </li>
</ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <!-- Carousel
    ================================================== -->

    <div class="container">
      
 <!-- CONTENT Div -->
 <div id="content" class="col-md-12">
 <h2>Featured Art</h2>
<div class="row">
<div class="col-md-3">kdkdkd</div>
<div class="col-md-3">dkdkdkd</div>
<div class="col-md-3">dkdkdkd</div>
<div class="col-md-3">dkdkdkd</div>
</div>
 </div>
<!--SIDEBAR -->
<div class="row">
<div id="sideBar" class="col-md-3 myFilterSidebar" style="margin-top: 20px">
<div class="panel panel-default">
 <div class="panel-heading">
<h2 class="panel-title">My Favorites</h2>
 </div>
 <div class="panel-body">
 <div id="favorites" class="widget">
<p>Drop Favorites Here</p>
<ul id="faves"></ul>
 </div><!--end favorites-->	
 </div>
</div>	

<div class="panel panel-default">
 <div class="panel-heading">
<h2 class="panel-title">Filter</h2>
 </div>
 <div class="panel-body">
       <div class="widget">
<h4>Dimensions</h4>
        <h5>Width (inches)</h5>
        <form name="form1" method="post" action="">
          <p>
<input id="slider" type="range" min="4" max="72" step="2" value="72" onchange="printValue('slider','rangeValue')"/>
<input id="rangeValue" type="text" size="2"/>
          </p>
<h5>Height (inches)</h5>
          <p>
<input id="slider1" type="range" min="4" max="72" step="2" value="72" onchange="printValue('slider1','rangeValue1')"/>
<input id="rangeValue1" type="text" size="2"/>
          </p><br>
 <h4>Color</h4>
<span class="colorpicker">
<span class="bgbox"></span>
<span class="hexbox"></span>
<span class="clear"></span>
<span class="colorbox">
<b class="selected" style="background:#000000" title="black"></b>
<b style="background:#8d8d8d" title="gray"></b>
<b style="background:#00b300" title="green"></b>
<b style="background:#0000ff" title="blue"></b>
<b style="background:#800080" title="purple"></b>
<b style="background:#e60000" title="red"></b>
<b style="background:#ffa500" title="orange"></b>
<b style="background:#a5682a" title="brown"></b>
<b style="background:#ffff00" title="yellow"></b>
<b style="background:white" title="none"></b>
</span>
</span>
<br><br>
<h4>Material</h4>
<input type="checkbox" id="woodBox" name="material" value="wood"> Wood<br>
<input type="checkbox" id="oilBox" name="material" value="oil"> Oil<br>
<input type="checkbox" id="charcoalBox" name="material" value="charcoal"> Charcoal<br>
<input type="checkbox" id="pencilBox" name="material" value="pencil"> Pencil<br>
<input type="checkbox" id="paintBox" name="material" value="paint"> Paint<br>
<input type="checkbox" id="clayBox" name="material" value="clay"> Clay<br>
<input type="checkbox" id="glassBox" name="material" value="glass"> Glass<br>
 </form><br>
 </div><!--end widgets-->	
 </div>
</div>	
  
        </div>	 	 

 <!-- GALLERY content -->
 <div id="content" class="col-md-8">
 <h2>Gallery</h2>
 <div class="row">
<!-- Nav tabs -->
<ul class="nav nav-tabs">
 <li><a href="#paintings" data-toggle="tab">Paintings</a></li>
 <li><a href="#drawings" data-toggle="tab">Drawings</a></li>
 <li><a href="#handCrafted" data-toggle="tab">Hand Crafted</a></li>
 <li><a href="#digital" data-toggle="tab">Digital</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
 <div class="tab-pane active" id="paintings">
 <br>
<div class="row">
	<?php echo createPaintings() ?>
</div>  
 </div>
 <div class="tab-pane" id="drawings">
 <br>
<div class="row">
	<?php echo createDrawings() ?>
</div>   
 </div>
 <div class="tab-pane" id="handCrafted">
 <br>
<div class="row">
	<?php echo createHandcrafted() ?>
</div>   
 </div>
 <div class="tab-pane" id="digital">
 <br>
<div class="row">
	<?php echo createDigital() ?>
</div> 
</div>
</div>
<div class="row">
<div class="col-md-9"><p style="padding-right: 20px"><a href="#">Browse more &raquo;</a></p></div>

<div>
<div class="col-md-9">
<button type="button" id="uploadBttn">Upload Artwork</button>
</div>













<div id="imageUploader">
<form id="form1" enctype="mulipart/form-data" method="POST" onSubmit="uploadFile()" action="">
	<input type="hidden" id="MAX_FILE_SIZE" name = "MAX_FILE_SIZE" value = "500000">
<div id="artInfo" class="col-md-9">
<table>
<tr>
<td><label>Title</label></td>
<td><input type="text" id="title" name="title"></input>
</tr>
<tr>
<td><label>Length (Max 72 in.):</label></td><td><input id="l" type="text" name="l"></input></td>
</tr>
<tr>
<td><label>Width (Max 72 in.):</label></td><td><input id="w" type="text" name="w"></input></td>
</tr>
<tr>
<td><label>Primary color :</label></td>
<td>
<select id="primecolor" name="primecolor">
<option value="" selected>--Choose one--</option>
<option value="black"><span style="color:white;font-weight:bold;background-color:black">black</span></option>
<option value="gray"><span style="color:black;font-weight:bold;background-color:lightgray">gray</span></option>
<option value="green"><span style="color:black;font-weight:bold;background-color:green">green</span></option>
<option value="blue"><span style="color:black;font-weight:bold;background-color:blue">blue</span></option>
<option value="purple"><span style="color:black;font-weight:bold;background-color:purple">purple</span></option>
<option value="red"><span style="color:black;font-weight:bold;background-color:red">red</span></option>
<option value="orange"><span style="color:black;font-weight:bold;background-color:orange">orange</span></option>
<option value="brown"><span style="color:black;font-weight:bold;background-color:brown">brown</span></option>
<option value="yellow"><span style="color:black;font-weight:bold;background-color:yellow">yellow</span></option>
</select>
</td>
</tr>
<tr>
<td><label>Category</label></td>
<td>
<select id="artcategyory" name="artcategory">
<option value="" selected>--Choose one--</option>
<option value="painting">painting</option>
<option value="drawing">drawing</option>
<option value="digital">digital</option>
<option value="handcrafted">handcrafted</option>
</select>
</td>
</tr>
<tr>
<td><label>Primary material: </label></td>
<td>
<select id="primematerial" name="primematerial">
<option value="" selected>--Choose one--</option>
<option value="photo">photo</option>
<option value="oil">oil</option>
<option value="wood">wood</option>
<option value="charcoal">charcoal</option>
<option value="pencil">pencil</option>
<option value="paint">paint</option>
<option value="clay">clay</option>
<option value="glass">glass</option>
</select>
</td>
</tr>
</table>
<br>
<div class="col-md-9">
   <label for="fileToUpload">
       Select a File to Upload</label>
   <input type="file" name="fileselect" id="fileselect" onchange="fileSelected();" />
</div>
<div class="col-md-9">
   <input type="submit" value="Submit" />
</div>
</form>
</div>


  </div>
</div>
</div><!-- END Content -->
</div><!-- end of CONTENT Div -->
 
 
      <footer class="footerRed">
 <div style="margin: auto;">
        <p class="text-center">&copy; DiscovART 2013</p>
</div>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../dist/js/customColorPicker.js"></script>
<script src="../../dist/js/jquery.ndd.js"></script>
<script src="../../dist/js/dragdrop.js"></script>
<script>

function printValue(sliderID, textbox) {
var x = document.getElementById(textbox);
var y = document.getElementById(sliderID);
x.value = y.value;
}

window.onload = function() { 
printValue('slider', 'rangeValue');
printValue('slider1', 'rangeValue1'); 
}

var ulButton = document.getElementById("uploadBttn");
var formDiv = document.getElementById("imageUploader");

ulButton.onclick = function(){
var isHidden = formDiv.style.display == 'none';
formDiv.style.display = isHidden ? 'block': 'none';
}

</script>

<script>
	<?php echo initDigital(); ?>
	<?php echo initPaintings(); ?>
	<?php echo initDrawings(); ?>
	<?php echo initHandcrafted(); ?>
/*
  //DIGITAL
$('#painting1').data({ id:1, length:24, width: 32, color: "blue", material: "photo"});
$('#painting2').data({ id:2, length:32, width: 24, color: "orange", material: "photo" });
$('#painting3').data({ id:3, length:28, width: 36, color: "blue", material: "photo" });
$('#painting4').data({ id:4, length:25, width: 32, color: "orange", material: "photo" });
$('#painting5').data({ id:5, length:28, width: 28, color: "gray", material: "photo" });
$('#painting6').data({ id:6, length:24, width: 16, color: "gray", material: "photo" });

  //PAINTINGS
  $('#painting7').data({ id:7, length:24, width: 18, color: "yellow", material: "paint" });
  $('#painting8').data({ id:8, length:36, width: 30, color: "red", material: "paint" });
  $('#painting9').data({ id:9, length:8, width: 11, color: "brown", material: "paint" });
  $('#painting10').data({ id:10, length:14, width: 27, color: "blue", material: "paint" });
  $('#painting11').data({ id:11, length:8, width: 11, color: "black", material: "oil" });
  $('#painting12').data({ id:12, length:8, width: 11, color: "gray", material: "oil" });
  $('#painting13').data({ id:13, length:8, width: 11, color: "purple", material: "oil" });

  //DRAWINGS
  $('#painting14').data({ id:14, length:24, width: 24, color: "black", material: "charcoal" });
  $('#painting15').data({ id:15, length:16, width: 28, color: "black", material: "charcoal" });
  $('#painting16').data({ id:16, length:15, width: 30, color: "black", material: "charcoal" });
  $('#painting17').data({ id:17, length:12, width: 16, color: "black", material: "pencil" });
  $('#painting18').data({ id:18, length:12, width: 24, color: "black", material: "pencil" });
  $('#painting19').data({ id:19, length:24, width: 28, color: "black", material: "pencil" });
  $('#painting20').data({ id:20, length:15, width: 30, color: "black", material: "pencil" });
  $('#painting21').data({ id:21, length:16, width: 32, color: "black", material: "charcoal" });

  //Handcrafted
  $('#painting22').data({ id:22, length:10, width: 8, color: "red", material: "clay" });
  $('#painting23').data({ id:23, length:8, width: 6, color: "brown", material: "clay" });
  $('#painting24').data({ id:24, length:8, width: 4, color: "white", material: "glass" });
  $('#painting25').data({ id:25, length:10, width: 10, color: "orange", material: "wood" });
  $('#painting26').data({ id:26, length:13, width: 5, color: "blue", material: "glass" });
  $('#painting27').data({ id:27, length:11, width: 8, color: "brown", material: "clay" });
  $('#painting28').data({ id:28, length:6, width: 12, color: "brown", material: "wood" });
*/
  </script>
  <script>
var theWidth = 72;
var theHeight = 72;
var color = ["black","gray","green","blue","purple","red","orange","brown","yellow"];

$(document).ready(function () {

var form = document.getElementById("imageUploader");
form.style.display = "none";


$("#slider").change(function() {
theWidth = $("#rangeValue").val();
filter(color);
});

$("#slider1").change(function() {
theHeight = $("#rangeValue1").val();
filter(color);
});	

$("#woodBox").change(function(){
filter(color);
});
$("#pencilBox").change(function(){
filter(color);
});
$("#clayBox").change(function(){
filter(color);
});
$("#oilBox").change(function(){
filter(color);
});
$("#charcoalBox").change(function(){
filter(color);
});
$("#paintBox").change(function(){
filter(color);
});
$("#glassBox").change(function(){
filter(color);
});

}); //End of .ready()

function filter(colorArray){
//alert("inside filter");
var currentWidth = theWidth;
var currentHeight = theHeight;
var pencilBoxState = $("#pencilBox").prop('checked') ? true:false;
var woodBoxState = $("#woodBox").prop('checked') ? true:false;
var clayBoxState = $("#clayBox").prop('checked') ? true:false;
var charcoalBoxState = $("#charcoalBox").prop('checked') ? true:false;
var paintBoxState = $("#paintBox").prop('checked') ? true:false;
var glassBoxState = $("#glassBox").prop('checked') ? true:false;
var oilBoxState = $("#oilBox").prop('checked') ? true: false;
filterItems(currentWidth, currentHeight, colorArray, woodBoxState, pencilBoxState, clayBoxState, charcoalBoxState, paintBoxState, glassBoxState, oilBoxState);
}

//Custom Color picker	
function OnCustomColorChanged(selectedColor, selectedColorTitle, colorPickerIndex) { 
//alert("Inside onCustomColorChanged method");
//here we use only one of the passed in parameters: selectedColorTitle 
var defColorArr = ["black","gray","green","blue","purple","red","orange","brown","yellow"];
var colorArr = [selectedColorTitle]; 
if(selectedColorTitle == 'none')
color = defColorArr;
else
color = colorArr;
filter(color);
}
function filterItems(widthCriteria, lengthCriteria, filterColors, isWoodChecked, isPencilChecked, isClayChecked, isCharcoalChecked, isPaintChecked, isGlassChecked, isOilChecked)
{
var materials = [];

if (isWoodChecked == true) materials.push("wood");
if (isPencilChecked == true) materials.push("pencil");
if (isClayChecked == true) materials.push("clay");
if (isCharcoalChecked == true) materials.push("charcoal");
if (isPaintChecked == true) materials.push("paint");
if (isGlassChecked == true) materials.push("glass");
if (isOilChecked == true) materials.push("oil");

$.each($('.tab-content div.painting'), function(i, item) {
$item = $(item); 
itemData = $item.data();
itemMaterial = itemData.material; //itemMaterial returns an index or -1 if not found.
materialMatch = materials.indexOf(itemMaterial);

if(itemData.width <= widthCriteria && itemData.length <= lengthCriteria) 
{
if(filterColors.indexOf(itemData.color) != -1){

if(materialMatch != -1){ // its a match
$item.animate({opacity: 1});
itemData.matching = true;
}
else if(materials.length === 0){ // its empty -- no materials were checked at all
$item.animate({opacity: 1});
itemData.matching = true;
}
else{
$item.animate({opacity: 0.5});
itemData.matching = false;
}
}
else{
$item.animate({opacity: 0.5});
itemData.matching = false;	
}

}

else
{
$item.animate({opacity: 0.5});
itemData.matching = false;
}
});	
}

function filterItemsByWidth(widthCriteria)
{
$.each($('.tab-content div.painting'), function(i, item) {
$item = $(item); 
itemData = $item.data();
if(itemData.width <= widthCriteria) 
{
$item.animate({opacity: 1});
itemData.matching = true;
}
else
{
$item.animate({opacity: 0.5});
itemData.matching = false;
}
});
}
//Added 12/6/2013
function filterItemsByLength(lengthCriteria)
{
$.each($('.tab-content div.painting'), function(i, item) {
$item = $(item); 
itemData = $item.data();
if(itemData.length <= lengthCriteria) 
{
$item.animate({opacity: 1});
itemData.matching = true;
}
else
{
$item.animate({opacity: 0.5});
itemData.matching = false;
}
});
}
</script>	
<script>
 $(function () {
$('#myTab a:last').tab('show')
 })
</script>
</script>
  </body>
</html>