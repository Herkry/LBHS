<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
        body{ font: 14px sans-serif; }
        
		
		.wrapper{ width: 350px; padding: 20px; 
		margin: auto;
		
		border-radius: 25px;
		
		background-color: white;
	
		}
        #constant{
      background-color: white;
      height: 100%;
      padding: 0%;
	  }
	  #sublabel13{
	width:200px;
	height:20px;
	border:1px solid;
	margin: 10px;
	float: right;
	
	margin-left: 100px;
	padding-top:1px;
	text-align: center;
	color: #626567;
	font-family: "Angsana New", Angsana, serif;
    font-size:20px;
	border-radius: 25px;
}
    .navbar {
    
      background-image:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(myArt.jpg);
      font-family: "Angsana New", Angsana, serif;
      font-size:20px;

    }

		#back{
		
	
			padding-top: 0px;
			
		}
		
		#label3{
      height:550px;
      padding-top: 30px;
    
	  margin-top:20px;
  
      }
  
   #sublabel31{
	    width:800px;
	    height:170px;
      float: bottom;
	    margin:auto;
      padding-top: 20px;
	    font-size:30px;
	    font-family: "Angsana New", Angsana, serif;
	    color: white;
	    text-align:left;
	    padding:30px;
	
	    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
		border-radius: 25px;
      }
   #sublabel32{
     width:600px;
	   height:150px;
  
	   margin:auto;
	   margin-top: 30px;
     font-family:"Angsana New", Angsana, serif;
     font-size:25px;
     text-align: left;
    
     padding:30px;
     color:white;
     background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
	 border-radius: 25px;
     }

#sublabel33{
     width:250px;
     height:50px;
     

     padding-top:11px;
     text-align: center;
     font-family: "Angsana New", Angsana, serif;
     font-size:20px;
     border-radius: 25px;
     background-color: #CB4335;
	 border-radius: 25px;
    
}



        #map{
            height:500px;
            width:100%;
			padding:0px;
      margin-bottom:20px;
        }
		#search{
          width:200px;
        
		  display:inline;
		  padding-left:0px;
		  
	
		  
		  
		}
		#specialist{
			float: left;
			margin-right:50px;
			padding-top:10px;
			width:200px;
		
		}

    .notification {
  background-color: #0B0B3B;
  color: white;
  text-decoration: none;
  margin-left: 15px;
  position: relative;
  display: inline-block;

}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}


		#radius{
			float: left;
			padding-top:10px;
			width:200px;
			margin-right:50px;

		}
		.buttons{
			float:left;
			padding-top:30px;
			width:200px;
		}

		footer {
	  background-color: black;
      padding: 25px;
	  height: 70px;
    }


   #top-cont{
     border:1px solid;
     height:75px;
     margin:5px;
     padding-left:10px;
   }

	
    </style>
</head>
<body>  			
			
<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
	  Geolocation Based Healthcare
    <div style="margin: 10px; float: right; margin-left: 100px; padding-top:1px; text-align: center; color: #626567; font-family: 'Angsana New', Angsana, serif; font-size:20px;"><img src= "profile.png" style="margin-right:10px;" height="50" width="50" /><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
	

	
  </div>

</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active" ><a href="#" style="color: white;">Home</a></li>
        <li><a href="dash2.php" class="notification"  style="color: white;"><span>Appointments</span><span class="badge">1</span></a></li>
        <li><a href="prescription.php" class="notification"  style="color: white;"><span>Prescription</span><span class="badge">1</span></a></li>
        <li><a href="emergency1.php"style="color: white;">Emergency</a></li>
	    	<li><a href="history.php"style="color: white;">Medical History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
   
      <div id="top-cont">

		   <div id="search">

		   <div id="specialist" class="form-group">
        <label>Search Specialist</label>
		

          
         <select name="zoom-to-area-text" id="zoom-to-area-text" class="form-control">
           <?php
           require('dbConnection.php');
	         $conn= connect();
	         $sql= mysqli_query($conn, "SELECT DISTINCT `docSpecialty` FROM doctor");
	         $row= mysqli_num_rows($sql);
	  
	        while($row = mysqli_fetch_array($sql)){
		      echo "<option value='".$row['docSpecialty']."'>".$row['docSpecialty']."</option>";
		  
	        }
	        echo "</select>";
           ?>
         </select> 

				
		   </div>
		   

		   <div class="buttons">
		   <input id="show-listings" type="button" class="btn btn-primary" value="Show Listings">

		  </div>
		  
		  <div class="buttons">
		
		   <input id="hide-listings" type="button" class="btn btn-primary" value="Hide Listings">

		  </div>
		  

		  
		  <div class="buttons">

           <input id="zoom-to-area" class="btn btn-primary" type="button" value="Zoom">
          </div>

            <div class="buttons">
                <input id="zoom-to-area" class="btn btn-primary" type="button" style="background-color:#CB4335; border-color:#CB4335;" value="Automatic Scheduling">
            </div><br>

            
            <div>
                <span class="text"> Within </span>
                <select id="max-duration">
                    <option value="10">10 min</option>
                    <option value="15">15 min</option>
                    <option value="30">30 min</option>
                    <option value="60">1 hour</option>
                    <option value="300">5 hours</option>
                    <option value="60000">10 hours </option>
                </select>
                 <select id="mode">
                    <option value="DRIVING">drive</option>
                    <option value="WALKING">walk</option>
                    <option value="BICYCLING">bike</option>
                    <option value="TRANSIT">transit ride</option>
                </select>
                <span class="text">of</span>
                <input id="search-within-time-text" type="text" placeholder="Ex: Google Office NYC or 75 9th Ave, New York, NY">
                <input id="search-within-time" type="button" value="Go">

                <span class="text"> Draw a shape to search within it for homes!</span>
                <input id="toggle-drawing"  type="button" value="Drawing Tools">
            </div>



		   
        </div>
        

    </div>
           
        
        <div id="map">
      
		   <script>
      /*var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };
	  */
		//Creating map
		//var map;
		
		//Create a new blank array for all the listing markers and also create marker and position of user variables, also creating map variable here, also create contentAll(InfoWindow info variable) variable here
        var markersAll = [];
        var markerUser;
        var pos;
        var map;
        var contentAll;
        var arrayContentAlls = [];
        var arrayQueues = []

     // This global polygon variable is to ensure only ONE polygon is rendered.
     var polygon = null;
		
		//Create a new blank array for all the locations and their details.
		var locationsAll = [];

        
		
    function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
			center: new google.maps.LatLng(-33.863276, 151.207977),
			zoom: 12
      });
      var infoWindow = new google.maps.InfoWindow;
		
		
		  //Finding user location
		  var infoWindowUser = new google.maps.InfoWindow;

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
          };
			
			markerUser = new google.maps.Marker({
			    position: pos,
			    map: map,
			    title: 'Your Position'
            });
            

          //infoWindowUser.setPosition(pos);
          //infoWindowUser.setContent('Location found.');
          //infoWindowUser.open(map);
          map.setCenter(pos);
          

			    markerUser.addListener('click', function() {
			      if (infoWindow.marker != marker) {
                   
                    infoWindowUser.setContent(markerUser.title);
                    infoWindow.open(map, marker);
				
				      // Make sure the marker property is cleared if the infowindow is closed.
				      infoWindow.addListener('closeclick', function() {
				      infoWindow.marker = null;
				      });
			      }
          });
			
        }, function() {
            handleLocationError(true, infoWindowUser, map.getCenter());
            });

        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindowUser, map.getCenter());
        }
      

        function handleLocationError(browserHasGeolocation, infoWindowUser, pos) {
          infoWindowUser.setPosition(pos);
          infoWindowUser.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
          infoWindowUser.open(map);
        }	




			
		//Incremental Here to track no. of entries/markers
        var p = -1;
        //window.alert("Harry");
        
		
		//Change this depending on the name of your PHP or XML file
        downloadUrl('/LBHS/hospital_maps.xml', function(data) {
            //window.alert("Harry");
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var docFname = markerElem.getAttribute('docFname');
                var docLname = markerElem.getAttribute('docLname');
                var docPhone = markerElem.getAttribute('docPhone');
                var docSpecialty = markerElem.getAttribute('docSpecialty');  
                var hospId = markerElem.getAttribute('hospId');
                var hospName = markerElem.getAttribute('hospName');
                var hospAddress = markerElem.getAttribute('hospAddress');
                var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('hospLat')),
                  parseFloat(markerElem.getAttribute('hospLong')));				  
				    /* 
				    var position = point;
				    var title = hospName;
				    // Create a marker per location, and put into markers array.
				    var marker = new google.maps.Marker({
					    map: map,
					    position: position,
					    title: title,
					    animation: google.maps.Animation.DROP,
					    id: i
				    });
				    // Push the marker to our array of markers.
				    markers.push(marker);
				    */ 
				  

			        //InfoWindow Content
              
                  

                  // Initialize the drawing manager.
                    var drawingManager = new google.maps.drawing.DrawingManager({
                        drawingMode: google.maps.drawing.OverlayType.POLYGON,
                        drawingControl: true,
                        drawingControlOptions: {
                            position: google.maps.ControlPosition.TOP_LEFT,
                            drawingModes: [
                              google.maps.drawing.OverlayType.POLYGON
                           ]
                       }
                    });





                    contentAll = "<b>Dr. "+docFname+"</b><br>"+docSpecialty+"<br>"+docPhone+"<br>"+hospName+"<br><br><form action = '' method = 'post'> <input type = 'hidden'  id='submit' name = 'submit'  value = '"+docFname+"'/>  <input type = 'submit'  value = 'See Dr."+docFname+"' class='btn btn-primary'  /></form>";
                    p = p + 1;
                    arrayContentAlls[p] = contentAll;
                    arrayQueues;
                    //window.alert(arrayContentAlls[x]);
                    

                    var infowincontent = document.createElement('div');
                    var strong = document.createElement('strong');
                    strong.textContent = "Dr. "+docFname;
                    infowincontent.appendChild(strong);

                    infowincontent.appendChild(document.createElement('br'));
                    var text = document.createElement('text');
                    text.textContent = docSpecialty ;
                    infowincontent.appendChild(text);

                    infowincontent.appendChild(document.createElement('br'));
                    var text = document.createElement('text');
                    text.textContent = docPhone;
                    infowincontent.appendChild(text);

                    infowincontent.appendChild(document.createElement('br'));
                    var text = document.createElement('text');
                    text.textContent = hospName;
                    infowincontent.appendChild(text);
                    // icon = customLabel[type] || {};
			  
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        title: docSpecialty
                        //label: contentAll
                    });

                    //Calling showlistings and hidelistings functions
                    document.getElementById('show-listings').addEventListener('click', showListings);
                    document.getElementById('hide-listings').addEventListener('click', hideListings);
                    
                    ////Add listener for search-within- time button////
                    document.getElementById('search-within-time').addEventListener('click', searchWithinTime);
                    
                    document.getElementById('toggle-drawing').addEventListener('click', function() {
                    toggleDrawing(drawingManager);
                    });


                    // Push the marker to our array of markers.
                    markersAll.push(marker);




                    

              //window.alert(p);
              //window.alert(arrayContentAlls[p]);
              // marker.addListener('click', function() {
			        // if (infoWindow.marker != marker) {
              //           //var now =  arrayContentAlls[p];
                        
              //           infoWindow.setContent(arrayContentAlls[p]);
              //           infoWindow.open(map, marker);
				
				      // // Make sure the marker property is cleared if the infowindow is closed.
				      // infoWindow.addListener('closeclick', function() {
				      //  infoWindow.marker = null;
				      // });
			        // }
              // });



              
              // marker.addListener('click', function() {

              //   for(var f = 0; f < markersAll.length; f++){
              //     window.alert(arrayContentAlls[f]);
			        //     if (infoWindow.marker != marker) {
                        
              //           infoWindow.setContent(arrayContentAlls[f]);
              //           infoWindow.open(map, marker);
				
				      //           // Make sure the marker property is cleared if the infowindow is closed.
				      //           infoWindow.addListener('closeclick', function() {
				      //           infoWindow.marker= null;
				      //           });
			        //     }
              //    // window.alert(arrayContentAlls[f]);
              //   }

              // });
             
              
			
			
                    // Add an event listener so that the polygon is captured,  call the
                    // searchWithinPolygon function. This will show the markers in the polygon,
                    // and hide any outside of it.
                    marker.setMap(map);
                    drawingManager.addListener('overlaycomplete', function(event) {
                        // First, check if there is an existing polygon.
                        // If there is, get rid of it and remove the markers
                        if (polygon) {
                          polygon.setMap(null);
                          hideListings(markersAll);
                        }
                        // Switching the drawing mode to the HAND (i.e., no longer drawing).
                        drawingManager.setDrawingMode(null);
                        // Creating a new editable polygon from the overlay.
                        polygon = event.overlay;
                        polygon.setEditable(true);
                        // Searching within the polygon.
                        searchWithinPolygon(polygon);
                        // Make sure the search is re-done if the poly is changed.
                        polygon.getPath().addListener('set_at', searchWithinPolygon);
                          polygon.getPath().addListener('insert_at', searchWithinPolygon);
                     });
                    
            }); //foreach loop
          }); //downloadUrl function
        } //initMap
        
        //Distance Function
        //searchWithinTime();
        

//Function for downloadurl----------------------------------------------------------------------------------------------------------
function downloadUrl(url, callback) {  
    var request = window.ActiveXObject ? 
        new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;   
    request.onreadystatechange = function() {    
        if (request.readyState == 4) {            
            callback(request);    
        } 
    };   
    request.open('GET', url, true);  
    request.send(null); 
}

//Function for downloadurl----------------------------------------------------------------------------------------------------------






//Function for toggleDrawing----------------------------------------------------------------------------------------------------------
function toggleDrawing(drawingManager) {
        if (drawingManager.map) {
          drawingManager.setMap(null);
          // In case the user drew anything, get rid of the polygon
          if (polygon !== null) {
            polygon.setMap(null);
          }
        } else {
          drawingManager.setMap(map);
        }
}


//Function for toggleDrawing----------------------------------------------------------------------------------------------------------





//Function for searchWithinPolygon----------------------------------------------------------------------------------------------------------
// This function hides all markers outside the polygon,
      // and shows only the ones within it. This is so that the
      // user can specify an exact area of search.
      function searchWithinPolygon() {
        for (var i = 0; i < markersAll.length; i++) {
          if (google.maps.geometry.poly.containsLocation(markersAll[i].position, polygon)) {
            
            var specialty = document.getElementById('zoom-to-area-text').value;
            if(specialty == markersAll[i].title){
                markersAll[i].setMap(map);
            }
            
          } else {
            markersAll[i].setMap(null);
          }
        }
      }

//Function for searchWithinPolygon----------------------------------------------------------------------------------------------------------







//Showing and Hiding Listings----------------------------------------------------------------------------------------------------------
    function showListings() {
        //var bounds = new google.maps.LatLngBounds();
        // Extend the boundaries of the map for each marker and display the marker
        for (var i = 0; i < markersAll.length; i++) {
            var specialty = document.getElementById('zoom-to-area-text').value;
            if(specialty == markersAll[i].title){
                markersAll[i].setMap(map);
            }
            
          //bounds.extend(markersAll[i].position);
        }
        //map.fitBounds(bounds);
      }

      // This function will loop through the listings and hide them all.
      function hideListings() {
        for (var i = 0; i < markersAll.length; i++) {
            markersAll[i].setMap(null);
        }
      }
//Showing and Hiding Listings----------------------------------------------------------------------------------------------------------


//Search Within Time function----------------------------------------------------------------------------------------------------------

function searchWithinTime() {
        // Initialize the distance matrix service.
        var distanceMatrixService = new google.maps.DistanceMatrixService;
        
        /////Set address to user position coordinates/////
        var address = pos;

        ////Make if stmt Code below useless////
        // Check to make sure the place entered isn't blank.
        if ((2+2) == (5)) {
          window.alert('You must enter an address.');
        } else {
          hideListings();
          showListings();
          // Use the distance matrix service to calculate the duration of the
          // routes between all our markers, and the destination address entered
          // by the user. Then put all the origins into an origin matrix.
          var origins = [];

          ////Changed markers to markersAll////
          for (var i = 0; i < markersAll.length; i++) {
            origins[i] = markersAll[i].position;
          }
          var destination = pos;
          var mode = document.getElementById('mode').value;
          // Now that both the origins and destination are defined, get all the
          // info for the distances between them.
          distanceMatrixService.getDistanceMatrix({
            origins: origins,
            destinations: [destination],
            travelMode: google.maps.TravelMode[mode],
            unitSystem: google.maps.UnitSystem.IMPERIAL,
          }, function(response, status) {
            if (status !== google.maps.DistanceMatrixStatus.OK) {
              window.alert('Error was: ' + status);
            } else {
              displayMarkersWithinTime(response);
            }
          });
        }
      }

//Search Within Time function----------------------------------------------------------------------------------------------------------







//Finding Distances-------------------------------------------------------------------------------------------------------------------
// This function will go through each of the results, and,
// if the distance is LESS than the value in the picker, show it on the map.

      function displayMarkersWithinTime(response) {
        var maxDuration = document.getElementById('max-duration').value;
        var origins = response.originAddresses;
        var destinations = response.destinationAddresses;
        // Parse through the results, and get the distance and duration of each.
        // Because there might be  multiple origins and destinations we have a nested loop
        // Then, make sure at least 1 result was found.
        var atLeastOne = false;
        for (var i = 0; i < origins.length; i++) {
          var results = response.rows[i].elements;
          for (var j = 0; j < results.length; j++) {
            var element = results[j];
            if (element.status === "OK") {
              // The distance is returned in feet, but the TEXT is in miles. If we wanted to switch
              // the function to show markers within a user-entered DISTANCE, we would need the
              // value for distance, but for now we only need the text.
              var distanceText = element.distance.text;
              // Duration value is given in seconds so we make it MINUTES. We need both the value
              // and the text.
              var duration = element.duration.value / 60;
              var durationText = element.duration.text;

              

              if (duration <= maxDuration) {

                ////Change markers to markersAll////
                //the origin [i] should = the markers[i]
                
                var specialty = document.getElementById('zoom-to-area-text').value;
              if(specialty == markersAll[i].title){
                  markersAll[i].setMap(map);
              }
              
                // markersAll[i].setMap(map);
                atLeastOne = true;

                ////Added contentAll to InfoWindow////
                // Create a mini infowindow to open immediately and contain the
                // distance and duration
                var infowindow = new google.maps.InfoWindow({
                  content: arrayContentAlls[i] + durationText + ' away, ' + distanceText +
                    '<div><input type=\"button\" value=\"View Route\" onclick =' +
                    '\"displayDirections(&quot;' + origins[i] + '&quot;);\"></input></div>'
                });

                ////Change markers to markersAll////

                var specialty = document.getElementById('zoom-to-area-text').value;
                if(specialty == markersAll[i].title){
                  window.alert("Done");
                  infowindow.open(map, markersAll[i]);
                  // Put this in so that this small window closes if the user clicks
                  // the marker, when the big infowindow opens
                  markersAll[i].infowindow = infowindow;
                  google.maps.event.addListener(markersAll[i], 'click', function() {
                  this.infowindow.close();
                });

               }




              }
            }
          }
        }
        if (!atLeastOne) {
          window.alert('We could not find any locations within that distance!');
        }
      }

//Finding Distances-------------------------------------------------------------------------------------------------------------------







//Finding Routes-------------------------------------------------------------------------------------------------------------------
function displayDirections(origin) {
        hideListings();
        showListings();
        var directionsService = new google.maps.DirectionsService;

        ////Changed destination address to user location////
        // Get the destination address from the user entered value.
        var destinationAddress = pos;
        // Get mode again from the user entered value.
        var mode = document.getElementById('mode').value;
        directionsService.route({
          // The origin is the passed in marker's position.
          origin: origin,
          // The destination is user entered address.
          destination: destinationAddress,
          travelMode: google.maps.TravelMode[mode]
        }, function(response, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            var directionsDisplay = new google.maps.DirectionsRenderer({
              map: map,
              directions: response,
              draggable: true,
              polylineOptions: {
                strokeColor: 'green'
              }
            });
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
  }

//Finding Routes-------------------------------------------------------------------------------------------------------------------
















// //Finding Distances-------------------------------------------------------------------------------------------------------------------

//         var destination = pos; //User Location
//         var origins = [];
//           for (var i = 0; i < markersAll.length; i++) {
//             origins[i] = markersAll[i].position;
//             markersAll[i].title = "Harry";
//             markerUser.title = "Harry";
//           }

          


//           var service = new google.maps.DistanceMatrixService();
//           service.getDistanceMatrix(
//             {
//                 origins: origins,
//                 destinations: [destination],
//                 travelMode: 'DRIVING',
//                 transitOptions: TransitOptions,
//                 drivingOptions: DrivingOptions,
//                 unitSystem: UnitSystem,
//                 avoidHighways: Boolean,
//                 avoidTolls: Boolean,
//             }, callback);

//             function callback(response, status ) {
//                 if (status == 'OK') {
//                     var origins = response.originAddresses;
//                     var destinations = response.destinationAddresses;

//                     for (var i = 0; i < origins.length; i++) {
//                         var results = response.rows[i].elements;
//                         for (var j = 0; j < results.length; j++) {
//                             var element = results[j];
//                             var distanceText = element.distance.text;
//                             var durationText = element.duration.text;
//                             var from = origins[i];
//                             var to = destinations[j];

//                             //the origin [i] should = the markers[i]
//                             markersAll[i].setMap(map);
//                             var infowindow = new google.maps.InfoWindow({
//                                 content: durationText + ' away, ' + distanceText +
//                                         '<div><input type=\"button\" value=\"View Route\" onclick =' +
//                                         '\"displayDirections(&quot;' + origins[i] + '&quot;);\"></input></div>'
//                             });
//                             infowindow.open(map, markersAll[i]);
//                             // Put this in so that this small window closes if the user clicks
//                             // the marker, when the big infowindow opens
//                             markersAll[i].infowindow = infowindow;
                            
//                             google.maps.event.addListener(markersAll[i], 'click', function() {
//                             this.infowindow.close();
//                             });

//                         }
//                     }
//                 }
//             }
// //Finding Distances-------------------------------------------------------------------------------------------------------------------


// //Finding Directions-------------------------------------------------------------------------------------------------------------------
//             function displayDirections(origin) {
//                 var directionsService = new google.maps.DirectionsService;
//                 // Get the destination address from the user entered value.
//                 var destinationAddress = destination;
//                 directionsService.route({
//                     // The origin is the passed in marker's position.
//                     origin: origin,
//                     // The destination is user entered address.
//                     destination: destinationAddress,
          
//                 }, function(response, status) {
//                         if (status === google.maps.DirectionsStatus.OK) {
//                             var directionsDisplay = new google.maps.DirectionsRenderer({
//                                 map: map,
//                                 directions: response,
//                                 draggable: true,
//                                 polylineOptions: {
//                                 strokeColor: 'green'
//                             }
//                         });
//                         } else {
//                             window.alert('Directions request failed due to ' + status);
//                         }
//                 });
//             }
                
   
        
// //Finding Directions----------------------------------------------



      // function downloadUrl(url, callback) {
      //   var request = window.ActiveXObject ?
      //       new ActiveXObject('Microsoft.XMLHTTP') :
      //       new XMLHttpRequest;

      //   request.onreadystatechange = function() {
      //     if (request.readyState == 4) {
      //       request.onreadystatechange = doNothing;
      //       callback(request, request.status);
      //     }
      //   };

      //   request.open('GET', url, true);
      //   request.send(null);
      // }
      
      
    
    // var msg = 56;
    //   window.location.href = "http://localhost/ICSProject/map_process.php?msg=" + msg;
      
	  
	  
	  
	  //Functions YET to be used
	  // This function populates the infowindow when the marker is clicked. We'll only allow
      // one infowindow which will open at the marker that is clicked, and populate based
      // on that markers position.
	  function populateInfoWindow(marker, infowindow) {
        // Check to make sure the infowindow is not already opened on this marker.
        if (infowindow.marker != marker) {
          infowindow.marker = marker;
          infowindow.setContent('<div>' + "Harry" + '</div>');
          infowindow.open(map, marker);
          // Make sure the marker property is cleared if the infowindow is closed.
          infowindow.addListener('closeclick', function() {
            infowindow.marker = null;
          });
        }
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyCX_XcVwDhTZdtx8-mkuitLN48uuBT_FE4&v=3&callback=initMap">
    //src=
    //    "https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyCX_XcVwDhTZdtx8-mkuitLN48uuBT_FE4&v=3&callback=initMap"
    </script>
       </div>
		   
		   
		   <div id="back">

		   
		   </div>

      


<?php
//Get SQL Functions
$link = connect();



// get the docName parameter from Map and patientId from  SESSION VARIABLE, and other DB parameters
if (isset($_POST['submit'])) {
$docName = $_POST['submit'];

//$patId = $_POST["patId"];




$patId = $_SESSION["id"];
$listStatus = "Being Assisted";


$selectDocId = "SELECT docId, hospId FROM doctor WHERE docFname = '$docName'";

$result1 = $link->query($selectDocId);
//$docId = 0;
//$hospId = 0;
while ($row = $result1->fetch_assoc()){

    $docId = $row['docId'];
    $hospId = $row['hospId'];

    // Checker 
    $checker = mysqli_query($link, "SELECT waitListId FROM waitinglist WHERE patId = '$patId' AND listStatus = '$listStatus' ");
    if(mysqli_num_rows($checker)==0){
        $insertPatWaitingList = "INSERT INTO waitinglist(docId, patId, hospId, listStatus, appointment_date) VALUES('$docId', '$patId', '$hospId' ,'$listStatus', now())";
        setData($insertPatWaitingList);

        $selectDocQueue = "SELECT docQueue FROM doctor WHERE docFname = '$docName'";
        $result2 = $link->query($selectDocQueue);
        //$docQueue = 0;
        while ($row = $result2->fetch_assoc()){
              $docQueue = $row['docQueue'];

              $docQueue = trim($docQueue + 1);

              $changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docFname = '$docName'";
              setData($changeDocQueue);

              //header("Location:dash2.php");

              }
    }
    else{
       

        echo'<script>'.'alert("Impossible action. You have already a pending appointment"); window.location.replace("home.php");'.'</script>';

    }

}

}

?>











		   <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
       
</body>
</html>


