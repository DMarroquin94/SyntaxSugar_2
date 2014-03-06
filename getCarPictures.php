<?php require_once("includes/connection.php");

if(isset($_GET['carId']))
{
$carId = $_GET['carId'];
$moviesToReturn = array();
$variables ="";
$data = array();

$cQuery = "SELECT * FROM `Car_pictures` WHERE `carId` = $carId";
$carQuery = mysqli_query($conn, $cQuery);


if(!$carQuery){
	die("Database query failed: ".mysqli_error($conn));
}
else{
	while($row = $carQuery->fetch_row()){
		$variables .= "\n".$row[2] .':'.$row[1];
	}
	echo $variables;
}
}
else{
	echo "User Id is null".$_GET['carId'];
}
  
mysqli_close($conn);
?>