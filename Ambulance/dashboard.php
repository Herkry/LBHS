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
  <title>Emergency</title>
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

	
		
		#label3{
      height:550px;
      padding-top: 30px;
    
  
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
     }



#label3{
      height:200px;

    
	  
  
      }
  
   #sublabel31{
	    width:600px;
	    height:70px;
    
	    margin:auto;
        padding-top:15px;
	    font-size:30px;
	    font-family: "Angsana New", Angsana, serif;
	    color: white;
	    text-align:center;
	
	    border-radius: 25px;
	    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
      }
   #sublabel32{
     width:600px;
	   height:150px;
       margin-top:20px;
       margin-bottom:20px;
     margin:auto;

     font-family:"Angsana New", Angsana, serif;
     font-size:22px;
     text-align: left;
    
     padding:30px;
     color:white;
     background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
     border-radius: 25px;
     }

     #sublabel33{
     width:250px;
     height:50px;
     float:left;
     margin-top: 15px;
     margin-left:20px;
     padding-top:11px;
     text-align: center;
     font-family: "Angsana New", Angsana, serif;
     font-size:20px;
     border-radius: 25px;
     background-color: #CB4335;
    
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

    .buttons{
			float:left;
			padding-top:30px;
			width:200px;
      position:fixed;
      top: 170px;
      right: 30px;
		}

		#radius{
			float: left;
			padding-top:10px;
			width:200px;
		    

		}


		footer {
	  background-color: black;
      padding: 25px;
	  height: 60px;
    }




    #radio{
  text-align: left;
  font-family: Georgia, "Times New Roman", serif;
  border: 1px solid;
  margin: 8px;
  padding-top:10px;
  padding-left:10px;
}
.btn-switch {
  font-size: 3em;
	position: relative;
	display: inline-block;		
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
  
}
.btn-switch__radio {
	display: none;

}
.btn-switch__label {
	display: inline-block;	
	padding: .75em .50em .75em .75em;
	vertical-align: top;
	font-size: 0.5em;
	font-weight: 530;
	line-height: 1;
	color: #666;
  cursor: pointer;
	transition: color .2s ease-in-out;
}
.btn-switch__label + .btn-switch__label {
  padding-right: .25em;
	padding-left: 25;
}
.btn-switch__txt {
	position: relative;
	z-index: 2;
  display: inline-block;
   min-width: 5em;
	opacity: 1;
	pointer-events: none;
	transition: opacity .2s ease-in-out;
}
.btn-switch__radio_no:checked ~ .btn-switch__label_yes .btn-switch__txt,
.btn-switch__radio_yes:checked ~ .btn-switch__label_no .btn-switch__txt {
	opacity: 0;
}
.btn-switch__label:before {
	content: "";
	position: absolute;
	z-index: -1;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: #f0f0f0;
	border-radius: 1.5em;

  border: 1px solid;
	box-shadow: inset 0 .0715em .3572em rgba(43,43,43,.05);
	transition: background .2s ease-in-out;
}
.btn-switch__radio_yes:checked ~ .btn-switch__label:before {
	background: #6ad500;
}
.btn-switch__label_no:after {
	content: "";
	position: absolute;
	z-index: 1;
	top: .2em;
	bottom: .5em;
	left: .5em;
	width: 2em;
	background: #fff;
	border-radius: 1em;	
  
	pointer-events: none;
	box-shadow: 0 .1429em .2143em rgba(43,43,43,.2), 0 .3572em .3572em rgba(43,43,43,.1);
	transition: left .2s ease-in-out, background .2s ease-in-out;
}
.btn-switch__radio_yes:checked ~ .btn-switch__label_no:after {
	left: calc(100% - 2.5em);
	background: #fff;
}
.btn-switch__radio_no:checked ~ .btn-switch__label_yes:before,
.btn-switch__radio_yes:checked ~ .btn-switch__label_no:before {
	z-index: 1;
}
.btn-switch__radio_yes:checked ~ .btn-switch__label_yes {
	color: #fff;
}

    

.notification-box {
  position: fixed;
  z-index: 99;
  top: 150px;
  right: 90px;
  width: 50px;
  height: 50px;
  text-align: center;
}
.notification-bell {
  animation: bell 1s 1s both infinite;
}
.notification-bell * {
  display: block;
  margin: 0 auto;
  background-color: #04B4AE;
  box-shadow: 0px 0px 15px #fff;
}
.bell-top {
  width: 6px;
  height: 6px;
  border-radius: 3px 3px 0 0;
}
.bell-middle {
  width: 25px;
  height: 25px;
  margin-top: -1px;
  border-radius: 12.5px 12.5px 0 0;
}
.bell-bottom {
  position: relative;
  z-index: 0;
  width: 32px;
  height: 2px;
}
.bell-bottom::before,
.bell-bottom::after {
  content: '';
  position: absolute;
  top: -4px;
}
.bell-bottom::before {
  left: 1px;
  border-bottom: 4px solid #fff;
  border-right: 0 solid transparent;
  border-left: 4px solid transparent;
}
.bell-bottom::after {
  right: 1px;
  border-bottom: 4px solid #fff;
  border-right: 4px solid transparent;
  border-left: 0 solid transparent;
}
.bell-rad {
  width: 8px;
  height: 4px;
  margin-top: 2px;
  border-radius: 0 0 4px 4px;
  animation: rad 1s 2s both infinite;
}
.notification-count {
  position: absolute;
  z-index: 1;
  top: -6px;
  right: -6px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  font-size: 18px;
  border-radius: 50%;
  background-color: #ff4927;
  color: #fff;
  animation: zoom 3s 3s both infinite;
}
@keyframes bell {
  0% { transform: rotate(0); }
  10% { transform: rotate(30deg); }
  20% { transform: rotate(0); }
  80% { transform: rotate(0); }
  90% { transform: rotate(-30deg); }
  100% { transform: rotate(0); }
}
@keyframes rad {
  0% { transform: translateX(0); }
  10% { transform: translateX(6px); }
  20% { transform: translateX(0); }
  80% { transform: translateX(0); }
  90% { transform: translateX(-6px); }
  100% { transform: translateX(0); }
}
@keyframes zoom {
  0% { opacity: 0; transform: scale(0); }
  10% { opacity: 1; transform: scale(1); }
  50% { opacity: 1; }
  51% { opacity: 0; }
  100% { opacity: 0; }
}
@keyframes moon-moving {
  0% {
    transform: translate(-200%, 600%);
  }
  100% {
    transform: translate(800%, -200%);
  }
}


  
    </style>
</head>
<body>  			
			
<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
	  Geolocation Based Healthcare
    <div style="margin: 10px; float: right; margin-left: 100px; padding-top:1px; text-align: center; color: #626567; font-family: 'Angsana New', Angsana, serif; font-size:20px;"><img src= "profile.png" style="margin-right:10px;" height="50" width="50" /><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
	  <div id="sublabel13">
		  
		  
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
        <li  ><a href="#" style="color: white;">My Dashboard</a></li>
        <li><a href="#" style="color: white;">Past Requests</a></li>
       
  
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
      <!--This search div id include The radio button, the notification bell and the 'Show Patient' button-->
		   <div id="search">


		   

      <!--The radio button  Start Here-->
      <!--To refer to what have been posted in the radio button use - POST["switch"]-->     
           <div id="radio">

				 
           <p class="btn-switch">					
              <input type="radio" id="yes" name="switch" class="btn-switch__radio btn-switch__radio_yes" />
              <input type="radio" checked id="no" name="switch" class="btn-switch__radio btn-switch__radio_no" />		
              <label for="yes" class="btn-switch__label btn-switch__label_yes"><span class="btn-switch__txt">ON</span></label>								  <label for="no" class="btn-switch__label btn-switch__label_no"><span class="btn-switch__txt">OFF</span></label>							
          </p>

           </div>


      <!--The radio button end Here-->
		   

		
		<!--The Notification Bell and 'Show Patient' submit button Start Here-->
    <!--The if statement that you can add is to echo this notification if the condition is met--> 
    <div class="notification-box" style="float:right;">
    <input id="show-listings" type="button" class="btn btn-primary" value="Show Patient">
    <span class="notification-count">1</span>
    <div class="notification-bell">
      <span class="bell-top"></span>
      <span class="bell-middle"></span>
      <span class="bell-bottom"></span>
      <span class="bell-rad"></span>
    </div>
    
    </div>
    <!--To refer to the 'Show Patient' submit button refer to "getElementById(show-listings)" however you change the id name and remain with a consistent UI-->
    <!--The Notification Bell and 'Show Patient' End Here-->



	       </div>
       <!--The 'search' div which include the notification bell and checkbox  end Here-->

<!--The Map Start Here-->
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
        downloadUrl('MyXmlFile4.xml', function(data) {
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
                        infoWindow.setContent(infowincontent);
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
		   
		   
		   
		   <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
</body>
</html>