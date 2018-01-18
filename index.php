<?php
print_r($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Geo Check</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	.footer {
	   position: fixed;
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   text-align: center;
	}
	</style>
</head>
<body>
<div class="container">
  <center>

  <img src="logowebmp.png" class="img-circle" style=" max-height: 75px;">
  <h1>Geo Check</h1>
  <h3>Attivare la posizione GPS sul dispositivo prima di cliccare sul bottone sottostante</h3>
  <p><button type="button" class="btn btn-warning" onclick="getLocation()">Invia Coordinate</button></p> 
  <p id="demo"></p>     
  </center>
	<div class="footer">
	  <p>Studio Agazzani S.r.l. capitale sociale 77.468,53 i.v. via Malta, 6/c - 25124 Brescia - tel. 030.2942302 - fax 030.2426367 - P.IVA / C.F. 03005690171</p>
	</div>  
</div>






<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        //x.innerHTML = "Geolocation is not supported by this browser.";
		alert("Attivare la posizione GPS sul dispositivo");
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
	
	if(position == null)
	{
	    alert("Attivare la posizione GPS sul dispositivo");
	}
	if(position.coords.latitude == "")
	{
	    alert("Attivare la posizione GPS sul dispositivo");
	}
	//var http = new XMLHttpRequest();
	//var url = "https://www.donkeylab.com/geosend.php";
	//var params = "lat="+position.coords.latitude+"&long="+position.coords.longitude;
	//http.open("POST", url, true);

	//Send the proper header information along with the request
	//http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	/*
	http.onreadystatechange = function() {//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) {
			alert(http.responseText);
		}
	}
	http.send(params);
	*/
	var _lat = null;
	var _long = null;
	
	_lat = position.coords.latitude;
	_long = position.coords.longitude;
	
	if(_lat != null)
	{
		var f = document.createElement('form');
		f.action='http://www.donkeylab.com/geosend.php';
		f.method='POST';
		f.target='_blank';
		//f.enctype="multipart/form-data"

		var k=document.createElement('input');
		k.type='hidden';k.name='lat';
		k.value=_lat
		f.appendChild(k);

		var j=document.createElement('input');
		j.type='hidden';j.name='long';
		j.value=_long
		f.appendChild(j);

		//var z=document.getElementById("FileNameId")
		//z.setAttribute("name", "IDProof");
		//z.setAttribute("id", "IDProof");
		//f.appendChild(z);

		document.body.appendChild(f);
		f.submit()
	}
	else
	{
		alert("Attivare la posizione GPS sul dispositivo");
	}

	
	
}
</script>

</body>
</html>
