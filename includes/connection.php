<?php
	require("constants.php");
	global $conn;
	//1. Create a database connection
	$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS, DB_NAME);
	if(mysqli_connect_errno($conn) )
	{
  		echo "Failed to connect to mySQL: ".mysqli_connect_errno();
	}
	
	//2. Select a database to use
	$db_select = mysqli_select_db($conn, DB_NAME);
	if(!$db_select){
		die("Database selection failed: ".mysql_error());
	}
	
?>