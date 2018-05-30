  <head>
     <?php 
	  include("pelatis_menu.php");
	  require('create_xml.php'); ?>
<!DOCTYPE html >
   <!-- <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
    <title>Προβολή δικτύου καταστημάτων και transit hubs</title>
    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
		.well{
			text-align: center;
			
		}
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
		  vertical-align: baseline;
        margin: 0;
        padding: 0;
      }
    </style>
    <script> 
	document.getElementById("home").removeAttribute("class");
	document.getElementById("parak").removeAttribute("class");
	//document.getElementById("").removeAttribute("class");
	document.getElementById("diktio").setAttribute("class","active"); 
	 </script>
  </head>

  <body style="background-color: #30373B">
   <div class="well">Κ: Καταστήματα<br>Τ: Transit Hubs</div>
    <div style="width:80%; margin:0 auto;" id="map"></div>

    <script>
      var customLabel = {
        T: {
          label: 'T'
        },
        K: {
          label: 'K'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(37.9838, 23.7275),
          zoom: 7
        });
        var infoWindow = new google.maps.InfoWindow;
						
          // Change this depending on the name of your PHP or XML file
          downloadUrl('newfile.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('trans');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              //var address = markerElem.getAttribute('id');
              var type = 'T';
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('coorx')),
                  parseFloat(markerElem.getAttribute('coory')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = "ID : " + id;
              infowincontent.appendChild(text);

			  var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
				label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
			
			
			downloadUrl('newfile.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('katasthmata');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('TRANS_ID');
              var name = markerElem.getAttribute('ONOMA');
              var address = markerElem.getAttribute('ODOS') ;
              var poli = markerElem.getAttribute('POLI');
			  var type = 'K';
    
    var arithmos = markerElem.getAttribute('ARITHMOS');
    var tk = markerElem.getAttribute('TK');
    var til = markerElem.getAttribute('TILEFONO');
    
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('COORX')),
                  parseFloat(markerElem.getAttribute('COORY')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text') ;
              text.textContent = address + " ";
    
        var text2 = document.createElement('text') ;
              text2.textContent = poli ;
    
     var text3 = document.createElement('text');
              text3.textContent = arithmos + " , " ;
    
     var text4 = document.createElement('text');
              text4.textContent = "Τ.Κ. : " + tk;
    
     var text5 = document.createElement('text');
              text5.textContent = "Τηλέφωνο : "  + til;
    
    
              infowincontent.appendChild(text);   // odos
    infowincontent.appendChild(text3);  // arithmos
    infowincontent.appendChild(text2);  //poli
    infowincontent.appendChild(document.createElement('br'));
    infowincontent.appendChild(text5);   // tilefono
    infowincontent.appendChild(document.createElement('br'));
    infowincontent.appendChild(text4);   //taxidromikos
    
		      var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
				label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



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

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCukYUPcEX9wyTkc560zpKm4BzVUPeroek&callback=initMap">
    </script>
  </body>
</html>