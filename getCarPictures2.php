<?php require_once("includes/connection.php");

$moviesToReturn = array();
$variables ="";
$data = array();

$cQuery = "SELECT DISTINCT c.id, pic.source FROM Car c, Car_pictures pic WHERE c.id = pic.carId AND c.canShop = 0 group by c.id ORDER BY c.id asc";
$carQuery = mysqli_query($conn, $cQuery);

// if(isset($_GET['min']))
// {
// 	$min = $_GET['min'];
// 	$max = $_GET['max'];
	if(!$carQuery){
		die("Database query failed: ".mysqli_error($conn));
	}
	else{
		$count = 0;
		while($row = $carQuery->fetch_row()){
			if($count%5==0){
				$variables.='<div class="galley col-xs-6 col-sm-4 col-md-3 col-lg-offset-1 col-lg-2">';
			}
			else{
				$variables.='<div class="galley col-xs-6 col-sm-4 col-md-3 col-lg-2">';
			}
			$variables .= '<input type="image" class="img-responsive"  data-id="'.$row[0].'" data-src="images/gallery/'.$row[1].'" /></div>';

			// $variables .='<input id="'.$count.'" type="image" class="img-responsive"  data-id="'.$row[0].'" src="images/gallery/'.$row[1].'" />';
			$count++;
		}
		echo $variables;
	}
// }


mysqli_close($conn);
?>