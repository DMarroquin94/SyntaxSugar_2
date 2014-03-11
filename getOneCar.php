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
	// $row = $carQuery->fetch_row();
while($row = $carQuery->fetch_row()){
	echo implode(',',$row) ."\n";
		// $variables .= $row[0].','.$row[1] . "\n";
	}

}
}
else{
	echo "Car Id is null".$_GET['carId'];
}
  
mysqli_close($conn);
?>