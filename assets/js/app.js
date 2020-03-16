var express = require("express");  
var app = express();  

app.use(express.static("public"));

app.get("/", function(req, res){
	res.sendFile(__dirname + "/public/html/etc.html");
})

app.listen(8080);