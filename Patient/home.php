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
     margin: auto;
     margin-top: 30px;
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
		#radius{
			float: left;
			padding-top:10px;
			width:200px;
			margin-right:50px;

		}
		#buttons{
			float:left;
			padding-top:30px;
			width:200px;
		}

		footer {
	  background-color: black;
      padding: 25px;
	  height: 200px;
    }




	
    </style>
</head>
<body>  			
			
<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
	  Geolocation Based Healthcare
	  <div id="sublabel13">
		  <img src= "profile.png" height="20" width="20" />
		  <?php echo htmlspecialchars($_SESSION["username"]); ?>
	  </div>
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
        <li><a href="dash1.php" style="color: white;">Appointments</a></li>
        <li><a href="emergency1.php"style="color: white;">Emergency</a></li>
		<li><a href="prescription.php"style="color: white;">Prescription</a></li>
		<li><a href="history.php"style="color: white;">Medical History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

		   <div id="search">

		   <div id="specialist" class="form-group">
                <label>Search Specialist</label>
				<input type="text" id="zoom-to-area-text" class="form-control">
				
		   </div>
		   
		   <div id="radius" class="form-group">
                <label>Radius</label>
				<input type="text" name="search" class="form-control">
		   </div>
		   <div id="buttons">
		   <input id="show-listings" type="button" class="btn btn-primary" value="Show Listings">

		  </div>
		  
		  <div id="buttons">
		
		   <input id="hide-listings" type="button" class="btn btn-primary" value="Hide Listings">

		  </div>
		  

		  
		  <div id="buttons">

           <input id="zoom-to-area" class="btn btn-primary" type="button" value="Zoom">
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
		
		//Create a new blank array for all the listing markers and also create marker and position of user variables, also creating map variable here
        var markersAll = [];
        var markerUser;
        var pos;
        var map;
		
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
        var i = 0;
        
		
		//Change this depending on the name of your PHP or XML file
        downloadUrl('/LBHS/hospital_maps.xml', function(data) {
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


                    var contentAll = "<b>Dr. "+docFname+"</b><br>"+docSpecialty+"<br>"+docPhone+"<br>"+hospName+"<br><br><form action = 'saveMapDocInfoPr.php' method = 'post'> <input type = 'hidden'   name = 'submit'  value = '"+docFname+"'/>  <input type = 'submit'  value = 'See Dr."+docFname+"' class='btn btn-primary'  /></form>";

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
                        //label: icon.label
                    });

                    //Calling showlistings and hidelistings functions
                    document.getElementById('show-listings').addEventListener('click', showListings);
                    document.getElementById('hide-listings').addEventListener('click', hideListings);
                   

                    // Push the marker to our array of markers.
                    markersAll.push(marker);

              
              
              marker.addListener('click', function() {
			        if (infoWindow.marker != marker) {
                        infoWindow.setContent(contentAll);
                        infoWindow.open(map, marker);
				
				      // Make sure the marker property is cleared if the infowindow is closed.
				      infoWindow.addListener('closeclick', function() {
				       infoWindow.marker = null;
				      });
			        }
              });
              
			
			
			        
                    marker.setMap(map);

            }); //foreach loop
          }); //downloadUrl function
        } //initMap
        
        //Distance Function
        //searchWithinTime();
        




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


//Finding Distances-------------------------------------------------------------------------------------------------------------------

        var destination = pos; //User Location
        var origins = [];
          for (var i = 0; i < markersAll.length; i++) {
            origins[i] = markersAll[i].position;
            markersAll[i].title = "Harry";
            markerUser.title = "Harry";
          }
          var service = new google.maps.DistanceMatrixService();
          service.getDistanceMatrix(
            {
                origins: origins,
                destinations: [destination],
                travelMode: 'DRIVING',
                transitOptions: TransitOptions,
                drivingOptions: DrivingOptions,
                unitSystem: UnitSystem,
                avoidHighways: Boolean,
                avoidTolls: Boolean,
            }, callback);

            function callback(response, status ) {
                if (status == 'OK') {
                    var origins = response.originAddresses;
                    var destinations = response.destinationAddresses;

                    for (var i = 0; i < origins.length; i++) {
                        var results = response.rows[i].elements;
                        for (var j = 0; j < results.length; j++) {
                            var element = results[j];
                            var distanceText = element.distance.text;
                            var durationText = element.duration.text;
                            var from = origins[i];
                            var to = destinations[j];

                            //the origin [i] should = the markers[i]
                            markersAll[i].setMap(map);
                            var infowindow = new google.maps.InfoWindow({
                                content: durationText + ' away, ' + distanceText +
                                        '<div><input type=\"button\" value=\"View Route\" onclick =' +
                                        '\"displayDirections(&quot;' + origins[i] + '&quot;);\"></input></div>'
                            });
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
//Finding Distances-------------------------------------------------------------------------------------------------------------------


//Finding Directions-------------------------------------------------------------------------------------------------------------------
            function displayDirections(origin) {
                var directionsService = new google.maps.DirectionsService;
                // Get the destination address from the user entered value.
                var destinationAddress = destination;
                directionsService.route({
                    // The origin is the passed in marker's position.
                    origin: origin,
                    // The destination is user entered address.
                    destination: destinationAddress,
          
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
                
   
        
//Finding Directions----------------------------------------------











			


      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
      
      


    //Inserting Data into DB-----------------------------------------------------------------------------------------------------------------------------------------



    //Inserting Data into DB----------------------------------------------------------------------------------------------------------------------------------------
	  var msg = 56;
      window.location.href = "http://localhost/ICSProject/map_process.php?msg=" + msg;
      
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
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
		   
		           		   <div id="label3">
		      <div id="sublabel31">
			      Doctor Around You:<br>
			  </div>
			  <div id="sublabel32">
			      Name:<br>Distance:<br>Working hours:<br>
				 
			  </div>
			  <div id="sublabel33">

				 
				     <a href="dash2.php" style="color: #FDFEFE">Automatic Scheduling</a>
				 

				 
			  </div>
		   </div>
		   
		   </div>

      
		   <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
       
</body>
</html>