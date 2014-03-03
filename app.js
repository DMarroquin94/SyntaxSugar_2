var express = require('express');
var app = express();
var productManager = require('./ProductManager');

app.disable("view cache");

app.get("/", function(request, response){
	response.sendfile('public/Index.html');
});

app.get("/get_all_products", function(request, response){

	console.log("Loading products...");
	productManager.LoadProduct(function(obj){
		response.writeHead(200, {"Content-Type" : "text/json"});
		// response.write(obj.toString());

		response.write(JSON.stringify(obj));
		response.end();
	});

});

app.get("/get_product", function(request, response){
	var num = request.query.id;
	console.log("getting product... " + num);

	productManager.GetProduct(num, function(obj){
		response.writeHead(200, {"Content-Type" : "text/json"});
		// console.log(obj + " hello?");
		response.write(JSON.stringify(obj));
		response.end();
	});

});

app.use(express.directory('public'));
app.use(express.static('public'));

app.listen(2974);