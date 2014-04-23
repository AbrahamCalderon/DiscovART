<?php
include "config.php";

/*
*	Functions to create the HTML divs for each artpiece
*/

function createPaintings(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"painting\"";
	$result = mysqli_query($con, $selectQuery);
	$html = "";
	
	while($row = mysqli_fetch_array($result))
	{	
         $html = $html."<div class=\"col-md-4\"><div id=\"painting".$row['id']."\" class=\"painting\" draggable=\"true\"><img src=\"".$row['src']."\" width=\"190\" height=\"190\" alt=\"".$row['title']."\"><p>\"".$row['title']."\"</p></div></div>";
	}
	
	$html = $html . "<div id=\"newArt\" class=\"col-md-4\"></div>";

	mysqli_close($con);
	return $html;
}

function createDrawings(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"drawing\"";
	$result = mysqli_query($con, $selectQuery);
	$html = "";
	
	while($row = mysqli_fetch_array($result))
	{	
         $html = $html."<div class=\"col-md-4\"><div id=\"painting".$row['id']."\" class=\"painting\" draggable=\"true\"><img src=\"".$row['src']."\" width=\"190\" height=\"190\" alt=\"".$row['title']."\"><p>\"".$row['title']."\"</p></div></div>";
	}

	//$html = $html . "<div id=\"newArt\" class=\"col-md-4\"></div>";
	
	mysqli_close($con);
	return $html;
}

function createHandcrafted(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"handcrafted\"";
	$result = mysqli_query($con, $selectQuery);
	$html = "";
	
	while($row = mysqli_fetch_array($result))
	{	
         $html = $html."<div class=\"col-md-4\"><div id=\"painting".$row['id']."\" class=\"painting\" draggable=\"true\"><img src=\"".$row['src']."\" width=\"190\" height=\"190\" alt=\"".$row['title']."\"><p>\"".$row['title']."\"</p></div></div>";
	}
	
	//$html = $html . "<div id=\"newArt\" class=\"col-md-4\"></div>";

	mysqli_close($con);
	return $html;
}

function createDigital(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"digital\"";
	$result = mysqli_query($con, $selectQuery);
	$html = "";
	
	while($row = mysqli_fetch_array($result))
	{	
         $html = $html."<div class=\"col-md-4\"><div id=\"painting".$row['id']."\" class=\"painting\" draggable=\"true\"><img src=\"".$row['src']."\" width=\"190\" height=\"190\" alt=\"".$row['title']."\"><p>\"".$row['title']."\"</p></div></div>";
	}
	
	//$html = $html . "<div id=\"newArt\" class=\"col-md-4\"></div>";

	mysqli_close($con);
	return $html;
}

/*
*	Functions to create the corresponding script (js) for each artpiece
*/

function initDigital(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"digital\"";
	$result = mysqli_query($con, $selectQuery);		
	$script = "";
	while($row = mysqli_fetch_array($result))
	{
        $script = $script."$('#painting".$row['id']."').data({ id:".$row['id'].", length:".$row['length'].", width:".$row['width'].", color:\"".$row['color']. "\", material: \"".$row['material']."\"});\n";
	}

	mysqli_close($con);
	return $script;
}

function initPaintings(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"painting\"";
	$result = mysqli_query($con, $selectQuery);		
	$script = "";
	while($row = mysqli_fetch_array($result))
	{
        $script = $script."$('#painting".$row['id']."').data({ id:".$row['id'].", length:".$row['length'].", width:".$row['width'].", color:\"".$row['color']."\", material: \"".$row['material']."\"});\n";
	}

	mysqli_close($con);
	return $script;
}

function initDrawings(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"drawing\"";
	$result = mysqli_query($con, $selectQuery);		
	$script = "";
	while($row = mysqli_fetch_array($result))
	{
        $script = $script."$('#painting".$row['id']."').data({ id:".$row['id'].", length:".$row['length'].", width:".$row['width'].", color:\"".$row['color']."\", material: \"".$row['material']."\"});\n";
	}

	mysqli_close($con);
	return $script;
}

function initHandcrafted(){
	$con = connect();
	$selectQuery = "SELECT * FROM artwork WHERE category = \"handcrafted\"";
	$result = mysqli_query($con, $selectQuery);		
	$script = "";
	while($row = mysqli_fetch_array($result))
	{
        $script = $script."$('#painting".$row['id']."').data({ id:".$row['id'].", length:".$row['length'].", width:".$row['width'].", color:\"".$row['color']."\", material: \"".$row['material']."\"});\n";
	}

	mysqli_close($con);
	return $script;
}
?>