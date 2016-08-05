/* global google */
/* global _ */


// Google Map
var map;

// markers for map
var markers = [];

// prototypes 
var buses = [];
var xminus;
var xplus;
var yminus;
var yplus;
var alarmNumber;
var alarmDirection;
var alarmStop;

var alarm_on = false;
var alarm_set = false;





var bus = ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",];

var zwiniety = false;
var zwiniety_alarm = true;


// execute when the DOM is fully loaded
$(function() {
    

    

    // styles for map
    // https://developers.google.com/maps/documentation/javascript/styling
    var styles = [

        // hide Google's labels
        {
            featureType: "all",
            elementType: "labels",
            stylers: [
                {visibility: "on"}
            ]
        },

        // hide roads
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [
                {visibility: "on"}
            ]
        }

    ];

    // options for map
    // https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var options = {
        center: {lat: 64.1023232, lng: -21.8899555}, 
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        maxZoom: 17,
        panControl: true,
        styles: styles,
        zoom: 11,
        zoomControl: true
    };

    // get DOM node in which map will be instantiated
    var canvas = $("#map-canvas").get(0);

    // instantiate map
    map = new google.maps.Map(canvas, options);

    // configure UI once Google Map is idle (i.e., loaded)
    google.maps.event.addListenerOnce(map, "idle", configure);

});





/**
 * Adds marker for place to map.
 */
function addMarker(place)
{
   
   if (place[3]==' ')
   return 3;
   
   
  
   
   var image = '../img/number_' + place[0] + '.png';
     var markerLatLng = new google.maps.LatLng(place[1], place[2]);
     var marker = new MarkerWithLabel({
       position: markerLatLng,
       draggable: false,
       raiseOnDrag: false,
       map: map,
       icon: image,
       labelContent: place[3],
       labelAnchor: new google.maps.Point(22, 0),
       labelClass: "labels", // the CSS class for the label
       labelStyle: {opacity: 0.75}
     });
     markers.push(marker);
   google.maps.event.addListener(marker, "click", function (e) {  map.setCenter({lat: place[1], lng: place[2]}); }); 
  

}


/**
 * Configures application.
 */


function configure()
{
    // update UI
    update();
}



/**
 * Removes markers from map.
 */
function removeMarkers()
{
   
   for (var i = 0, l = markers.length; i < l; i++) {
       markers[i].setMap(null);
       
       
   }
}

function clear_selection() {
    bus = ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",];
    for (var n = 1; n < 45; n++) {
    if (document.getElementById("modul" + n) != null)
    document.getElementById("modul" + n).style.backgroundColor = "rgba(255,255,255,0.5)";
    }
}



function zwin() {
    if (zwiniety == false) {
        document.getElementById("menu").style.height = "20px";
        $('#top-right').html('show menu');
        zwiniety = true;
    }
    else {
        document.getElementById("menu").style.height = "90%";
        $('#top-right').html('hide menu');
        zwiniety = false;
    }
    
}

function zwin_alarmy() {
    if (zwiniety_alarm == false) {
        document.getElementById("right_menu").style.height = "20px";
        $('#top-right-right').html('show menu');
        zwiniety_alarm = true;
    }
    else {
        document.getElementById("right_menu").style.height = "250px";
        $('#top-right-right').html('hide menu');
        zwiniety_alarm = false;
    }
    
}



function kolor(n) {
    if (bus[n] == ""){
    document.getElementById("modul" + n).style.backgroundColor = "rgba(255,0,0,0.5)";
    // document.getElementById("modul" + n).style.height = "80px";
    bus[n] = n + ",";
    
    }
    else{
        document.getElementById("modul" + n).style.backgroundColor = "rgba(255,255,255,0.5)";
    // document.getElementById("modul" +n).style.height = "40px";
    bus[n] = "";
       
    }
    
    
}

function start_alarm(czas, busNr, kierunek, przystanek) {
    if (alarm_on == false) {
    document.getElementById("alarm").style.display = "block";
    $('#alarm-sound').html("<audio id='beep' loop autoplay><source src='../img/alarm.wav' type='audio/wav' /></audio>");
	$('<p>at <strong> ' + czas + '</strong> bus number <strong>' + busNr + '</strong> to <strong>' + kierunek + '</strong> passed by <strong>' + przystanek + '</strong></p>').appendTo('#alarm-sound');
             
   
    alarm_on = true;
    
    }
    else
    return false;
}



function close_alarm() {
    document.getElementById("alarm").style.display = "none";
    $('#alarm-sound').html('');
    alarm_on = false;
}





/**
 * Shows info window at marker with content.
 */
function showInfo(marker, content)
{
    // start div
    var div = "<div id='info'>";
    if (typeof(content) === "undefined")
    {
        // http://www.ajaxload.info/
        div += "<img alt='loading' src='img/ajax-loader.gif'/>";
    }
    else
    {
        div += content;
    }

    // end div
    div += "</div>";

    // set info window's content
    info.setContent(div);

    // open info window (if not already open)
    info.open(map, marker);
}

/**
 * Updates UI's markers.
 */
function update() 
{
    
   
    // get map's bounds
    var bounds = map.getBounds();
    var ne = bounds.getNorthEast();
    var sw = bounds.getSouthWest();


/**
 * Get cookie value function
 */

   function getCookieValue(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";

}
    
  
/**
 * Click for LatLng
 */

 google.maps.event.addListener(map, "rightclick", function(event) {
	var lat = event.latLng.lat();
    var lng = event.latLng.lng();
	if (getCookieValue("custom_place") == "yes") {
	document.cookie = 'x=' + lat.toFixed(4) +'; expires=0; path=/';
	document.cookie = 'y=' + lng.toFixed(4) +'; expires=0; path=/';
	}
	console.log('x: ' + lat.toFixed(4) + ' y: ' + lng.toFixed(4)); 
	 
	 
 });  
  
    
     setInterval(function(){
     
//check for alarms

if (getCookieValue("busNr") != 0) {
            xminus = getCookieValue("x") - 0.002;
            xplus = getCookieValue("x") + 0.002;
            yminus = parseFloat(getCookieValue("y")) - 0.002;
            yplus = parseFloat(getCookieValue("y")) + 0.002;
            alarmNumber = getCookieValue("busNr");
            alarmDirection = decodeURIComponent(getCookieValue("direction").replace(/\+/g, '%20'));
            alarmStop =  decodeURIComponent(getCookieValue("stop").replace(/\+/g, '%20'));
            alarm_set = true;
}
else {
    alarm_set = false;
    
}
     
     
     
   
         
         var query = "busses=" + bus;
         if (query == "busses=,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,")
            query = "";
         
       $.getJSON ('https://apis.is/bus/realtime', query,   processJSON);
   
      function processJSON(data) {
          removeMarkers();
          var s = 0;
         $.each(data.results, processResults);
         
         function processResults (i,straeto) {
             
              $.each(straeto.busses, processStraeto);
               function processStraeto (i,value) {
        
         var x = value.x.toFixed(4);
         var y = value.y.toFixed(4);
    
             
        
         
         if (alarm_set == true){
        
       
            
           
            
            if (x > xminus && x < xplus  && y < yplus && y > yminus && (alarmNumber == straeto.busNr || alarmNumber == 'any') && (value.to == alarmDirection || alarmDirection == '')) {   
            var date = new Date(value.unixTime*1000);
            var hours = date.getHours();
            var minutes = "0" + date.getMinutes();
            var seconds = "0" + date.getSeconds();
            var time = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
			
			if (alarmStop = 'deleted') {
						var noStop = 'lat: ' + getCookieValue("x") + ' lng: ' + getCookieValue("y");
						start_alarm(time, straeto.busNr, value.to, noStop);
			    		}
			else {
				start_alarm(time, straeto.busNr, value.to, alarmStop);	
			}
      
             
         }
         
          alarmMarker = [0, xminus+0.002, yminus+0.002, "ALARM"];
         addMarker(alarmMarker);
         
         
         }
         
         
         
         
         
         buses[s] = [straeto.busNr, value.x, value.y, value.to];
         addMarker(buses[s]);
         s++;
         
                             
                   
               }
              
              
             
             
             
         }
    
    
      }
    
   
    },4500);
 
}