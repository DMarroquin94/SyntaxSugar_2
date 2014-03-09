<?php require_once("includes/connection.php");

if(isset($_GET['carId']))
{
$carId = $_GET['carId'];
$moviesToReturn = array();
$variables ="";
$data = array();

$cQuery = "SELECT DISTINCT pic.source,c.title FROM Car c, Car_pictures pic WHERE c.id = $carId and c.id = pic.carId";
$carQuery = mysqli_query($conn, $cQuery);


if(!$carQuery){
	die("Database query failed: ".mysqli_error($conn));
}
else{
while($row = $carQuery->fetch_row()){
		$variables .= "\n".$row[0].','.$row[1];
	}
	echo $variables;
}
}
else{
	echo "User Id is null".$_GET['carId'];
}
  
mysqli_close($conn);
?>