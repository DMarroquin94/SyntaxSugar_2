var currentPage = window.location.pathname;
var cars =[];

// $(document).load(function(){
	if(currentPage.split("gallery").length > 1){
		var x = $.get("getCarPictures2.php", function(obj){
			return(obj)
		}).fail(function(){
			console.log('something went wrong');
		}).success(function(obj){
			$('#gallery').html(obj);
			console.log(obj);
			$('.galley > input').unveil(null, function(){
// console.log(pic);
				$(this).load(function(){
					$('.galley > input').each(function(index){
						var pic = $(this);

						setTimeout( function () {
							pic.addClass('visible');
						}, (index * 1000));
					});
				});
			});


			// $('#gallery').html(obj);
			// $('.galley > input').unveil(null,function() {
			// 	$(this).load(function() {
			// 		this.style.opacity = 1;
			// 	});
			// });
	});
		$('#gallery').on('click', '.galley input[type="image"]', function(){
			var id = $(this).attr('data-id');
			$.get("getOneCar.php", {carId:id},function(obj){}).success(function(obj){	
				var detailArray = obj.trim().split('\n');
				var x = detailArray[0].split(',');
				var title = x[1];
				if(detailArray.length > 1){
					var elements ="";
					var mainPic ="";
					for(var m =0; m <detailArray.length; m++){
						var picArray = detailArray[m].split(',');
						if(m==0){mainPic = picArray[0]}
							elements += '<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><input type="image" class="img-responsive thumb-nail" src="images/gallery/'+picArray[0]+'"/></div>';
					}
			// console.log(elements);
			$('#insert').html(elements);
			$('#m-main').html('<img id="main" class="img-responsive thumb-nail" src="images/gallery/'+mainPic+'"/>');
		}else{
			detailArray = obj.trim().split(',');
			$('#m-main').html('<img id="main" class="img-responsive thumb-nail" src="images/gallery/'+detailArray[0]+'"/>');
			$('#insert').html('');
		}


		$('#m-title').html('<h1>'+title+'</h1>');		
		$('#responsive').modal('show');

	});
		});

$('#insert').on('click','.thumb-nail',function(){
	var source=$(this).attr('src');
	console.log(source);
	$('#main').attr('src', source);
});
}
else if(currentPage.split("shop").length > 1){
	$.get("getShopCars.php", function(obj){}).success(function(obj){
		var detailArray, carArray = [];
		var element ="";

		carArray = obj.split('\n');
		for(var count = 0; count<carArray.length;count++){
			detailArray = carArray[count].split(',');
			element += '<div class="col-sm-6 col-md-4 col-lg-3"><a href="product.php"><img src="images/shop/'+detailArray[6]+'"/><h4>'+detailArray[2]+'</h4><h5>'+detailArray[4]+'</h5></div>';
		}
		$('#store').html(element);
	});	
}
else{
	console.log('not gallery page');
}



// function loadImage(obj, id){
	
// 	obj.removeClass('invisible').addClass('visible');
// 	// $('#gallery').append(element);
// }
// var galleryArray = obj.split(",");
// $('#gallery').append(galleryArray[x]);
// for(var x = 0; x < galleryArray.length;x++){

// 	var queryEle = $(galleryArray[x].attr('id'));
// 	var element = "";
// 	if(x%5==0){
// 		element+='<div class="galley col-sm-4 col-md-3 col-lg-offset-1 col-lg-2">';
// 	}
// 	else{
// 		element+='<div class="galley col-sm-4 col-md-3 col-lg-2">';
// 	}

// 	element+=galleryArray[x]+"/></div>";
// 	$('#gallery').append(queryEle);
// 	loadImage(queryEle);
// }
