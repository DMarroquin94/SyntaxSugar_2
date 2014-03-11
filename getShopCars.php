<?php require_once("includes/connection.php");

$carsToReturn = array();
$variables ="";
$data = array();

$cQuery = "SELECT DISTINCT c.id, c.title,c.year,c.model,c.price,c.driver, pic.source FROM Car c, Car_pictures pic WHERE c.id = pic.carId and c.canShop = 1";
$carQuery = mysqli_query($conn, $cQuery);


if(!$carQuery){
	die("Database query failed: ".mysqli_error($conn));
}
else{

	while($row = $carQuery->fetch_row()){
		$variables .=implode(',',$row) ."\n";
	}
	// echo var_dump($carQuery);
}
echo $variables;
  
mysqli_close($conn);
?>
