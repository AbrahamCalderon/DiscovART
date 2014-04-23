<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
	$title = $_POST["title"];
	$l = $_POST["l"];
	$w = $_POST["w"];
	$primecolor = $_POST["primecolor"];
	$primematerial = $_POST["primematerial"];
	$artcategory = $_POST['artcategory'];
	$src = "";

	if ($fn) {
		echo "alert(\"inside if statement$$$$$$$$$$$$$$\")";
		// AJAX call
		file_put_contents(
			'user_art/' . $fn,
			file_get_contents('php://input')
		);
		//echo "$fn uploaded";
		$src = 'user_art/' . $fn;
		insertIntoDB($l, $w, $primecolor, $primematerial, $title, $artcategory, $src);
		exit();

	}
	else {
		
		echo "alert(\"inside else statement------------------->\")";
		// form submit
		$files = $_FILES['fileselect'];

		//foreach ($files['error'] as $id => $err) {
			if ($err == UPLOAD_ERR_OK) {
				$fn = $files['name'];
				//[$id];
				move_uploaded_file(
					$files['tmp_name'][$id],
					'user_art/' . $fn
				);
				//echo "<p>File $fn uploaded.</p>";
			}
		//}
		
		
		$src = 'user_art/' . $fn;
		insertIntoDB($l, $w, $primecolor, $primematerial, $title, $artcategory, $src);

	}
}



function insertIntoDB($l, $w, $primecolor, $primematerial, $title, $artcategory, $src){
	
	$con = connect();
	
	$query = "INSERT INTO artwork (width, length, color, material, title, category, src) VALUES ($w, $l, \"$primecolor\", \"$primematerial\", \"$title\", \"$artcategory\", \"$src\")";	
	
	if (!mysqli_query($con,$query)){
	  die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
	
	retrieveArtwork($title, $src);
}

//Retrieves and dynamically sends data to browser for display (ajax)
function retrieveArtwork($title, $src){
	$con = connect();
	
	$query = "SELECT width, length, color, material, title, category, src FROM artwork WHERE src=\"$src\" AND title=\"$title\"";	
	
	$result = mysqli_query($con, $query);
	
	$retString = "";
	
	while($row = mysqli_fetch_array($result)){

         $retString = $retString . "<div class=\"col-md-4\"><div id=\"painting".$row['id']."\" class=\"painting\" draggable=\"true\"><img src=\"".$row['src']."\" width=\"190\" height=\"190\" alt=\"".$row['title']."\"><p>\"".$row['title']."\"</p></div></div>";
	}
	mysqli_close($con);
	
	echo $retString;
}