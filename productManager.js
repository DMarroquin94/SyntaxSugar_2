
var fs = require('fs');
function AddProduct(){
	
}

function LoadProduct(callback){
	fs.readFile("json/products.json", function(err, data){
		if(err) throw err;
		// console.log(data);
		var obj = JSON.parse(data);
		console.log(obj);

		callback(obj);

	});
}

function GetProduct(num, callback){
	fs.readFile("json/products.json", function(err, data){
		if(err) throw err;
		// console.log(data);
		var obj = JSON.parse(data);
		console.log(obj.products[num] + " is json?");

		callback(obj.products[num]);

	});
}



exports.AddProduct = AddProduct;
exports.LoadProduct = LoadProduct;
exports.GetProduct = GetProduct;
