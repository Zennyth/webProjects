const express = require('express')
const app = express()

app.use(express.static(__dirname + '/'))
app.get('/', function (req, res) {
  res.sendFile(__dirname + '/pages/portfolio.html');
})
app.get('/build/three.module.js', function (req, res) {
  res.sendFile(__dirname + '/node_modules/three/build/three.module.js');
})
app.get('/assets/build/three.module.js', function (req, res) {
  res.sendFile(__dirname + '/node_modules/three/build/three.module.js');
})

app.get('/chatBot/',(req,res)=>{
	const apiai = require('apiai');
	var appAi = apiai("76c063eeb599448ca764e8d4ecff1bb7");
	var request = appAi.textRequest(req.query.message, {
	    sessionId: '123456789'
	});
	 
	request.on('response', function(response) {
		console.log(response.result.fulfillment.speech);
		if(response.result.parameters){
			if(response.result.parameters.section){
				res.json({"responseBot" : response.result.fulfillment.speech, "section" : response.result.parameters.section});
			}
			else
	    		res.json({"responseBot" : response.result.fulfillment.speech});
		}
	});
	 
	request.on('error', function(error) {
		res.json({"error" : error});
	    console.log(error);
	});
	request.end();
})
app.listen(8080, function () {
  console.log('Example app listening on port 8080!')
})