var PICINDEX = 7;
var currentPage = window.location.pathname;
var cars =[];
if(currentPage.split("gallery")){
	var x = $.get("getMovies.php", function(obj){

		// console.log(obj);
		
		return(obj)
	}).done(function(){
		// console.log('done');
	}).fail(function(){
		console.log('something went wrong');
	}).success(function(obj){
		var carArray =[];
		var storedCarsArray= [];
		carArray = obj.trim().split("\n");
		// console.log(carArray);
		for(var x= 0; x< carArray.length;x++){
		var detailArray= carArray[x].split(",");
		// console.log(detailArray);
		if($.inArray(detailArray[0], storedCarsArray) ==-1){

				var element;
				if(x==0 || x%5==1){
					element ='<div class="galley col-sm-4 col-md-3 col-lg-offset-1 col-lg-2">';
				}else{
					element= '<div class="galley col-sm-4 col-md-3 col-lg-2">';
				}

				element+='<input type="image" class="img-responsive" data-id="'+detailArray[0]+'" src="images/' + detailArray[7];
				element+= '"/></div>';
				// console.log(element);
				$('#gallery').append(element);
				storedCarsArray.push(detailArray[0]);
			}
			else{
				// console.log('is in array!');

			}
		}
				// card++;
			});

}
else{
	console.log('false');
}

$('#gallery').on('click', '.galley input[type="image"]', function(){
	var id = $(this).attr('data-id');
	$.get("getOneCar.php", {carId:id},function(obj){
		
	}).success(function(obj){

		var detailArray =[];
		var carArray =[];
		var picArray= [];

		carArray = obj.trim().split('\n');

		if(carArray.length > 1){
			var elements ="";
			// detailArray = carArray[0].split(',');
			for(var i =0; i < carArray.length; i++){

				detailArray = carArray[i].split(',');
				// console.log(detailArray);
				picArray[i] = detailArray[PICINDEX];
				// console.log(picArray);
			}
			// console.log(detailArray);
			// console.log(picArray);
			for(var m =0; m < picArray.length; m++){
				elements += '<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><img class="img-responsive" src="images/'+picArray[m]+'"/></div>';
			}
			// console.log(elements);
			$('#insert').html(elements);
			$('#m-main').html('<img class="img-responsive" src="images/'+picArray[0]+'"/>');
		}else{
			detailArray = obj.trim().split(',');
			$('#m-main').html('<img class="img-responsive" src="images/'+detailArray[PICINDEX]+'"/>');
			$('#insert').html('');
		}
		
		
		$('#m-title').html('<h1>'+detailArray[1]+'</h1>');		
		$('#responsive').modal('show');

	});
	
});