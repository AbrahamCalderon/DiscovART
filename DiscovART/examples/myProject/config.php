<?php
error_reporting (E_ALL & ~E_NOTICE);
//error_reporting (E_ALL | E_STRICT);

error_reporting (E_ALL & ~E_NOTICE);
//error_reporting (E_ALL | E_STRICT);


function connect() {

	$hostname = "localhost";
	$user = "root";
	$pass = "broncos98";
	$db = "discovart";

    try {
		$con=mysqli_connect($hostname,$user,$pass,$db);
    /*** echo a message saying we have connected ***/
    //	echo 'Connected to database<p>';
	return $con;
    }
    catch(SQLException $e) {
    	echo $e->getMessage();
	return null;
    }
}
?>