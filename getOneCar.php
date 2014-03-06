<?php require_once("includes/connection.php");

if(isset($_GET['carId']))
{
$carId = $_GET['carId'];
$moviesToReturn = array();
$variables ="";
$data = array();

$cQuery = "SELECT DISTINCT c.*, pic.source FROM Car c, Car_pictures pic WHERE c.id = $carId and c.id = pic.carId";
$carQuery = mysqli_query($conn, $cQuery);


if(!$carQuery){
	die("Database query failed: ".mysqli_error($conn));
}
else{
while($row = $carQuery->fetch_row()){
		$variables .= "\n".$row[0].','.$row[1].','.$row[2].','.$row[3].','.$row[4]. ','. $row[5] .','.$row[6].','.$row[7];
	}
	echo $variables;
}
}
else{
	echo "User Id is null".$_GET['carId'];
}
  
mysqli_close($conn);
?>