<?php require_once("includes/connection.php");

$carsToReturn = array();
$variables ="";
$data = array();

$cQuery = "SELECT DISTINCT c.*, pic.source FROM Car c, Car_pictures pic WHERE c.id = pic.carId";
$carQuery = mysqli_query($conn, $cQuery);


if(!$carQuery){
	die("Database query failed: ".mysqli_error($conn));
}
else{

	while($row = $carQuery->fetch_row()){
		$variables .="\n".$row[0].','.$row[1].','.$row[2].','.$row[3].','.$row[4]. ','. $row[5] .','.$row[6].','.$row[7];
	}
	// echo var_dump($carQuery);
}
echo $variables;
  
mysqli_close($conn);
?>
