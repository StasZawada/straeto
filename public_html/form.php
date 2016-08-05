<html>
    <head>

       
        <!-- app's own CSS -->
        <link href="/css/styles.css" rel="stylesheet"/>
        
   

       

        <!-- http://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>
        
        
      

        
     

<meta charset="utf-8">

    </head>
    <body class="phpForm">

<br>
<?php

   require("../includes/config.php");
   
//just for proper gramar formating of results
if (empty($_GET["direction"])) {
$to = " ";
}    
else {
$to = " to ";
}


// choose bus number
 if (empty($_GET["busNumber"]) && empty($_GET["name"])) {
     
    setcookie("custom_place", "no", 0, "/");    
    setcookie("busNr", 0, time()-30, "/");
    setcookie("direction", 0, time()-30, "/");
    setcookie("stop", 0, time()-30, "/");
    setcookie("x", 0, time()-30, "/");
    setcookie("y", 0, time()-30, "/");
   
    $rows =  CS50::query("SELECT * FROM buses");
   
    $buses = array();
    foreach ($rows as $row)
    {
    	array_push($buses, array("Nr" => $row["Nr"]));
    }

    render("buses.php", array("buses" => $buses));
}

//after choosing bus line, select type of place (bus stop or other location)
if ($_GET["busNumber"] && empty($_GET["place_type"]) &&  empty($_GET["stop"]) &&  empty($_GET["x"])){
    if ($_GET["busNumber"] == "any" || $_GET["busNumber"] == 23 || $_GET["busNumber"] == 27 || $_GET["busNumber"] == 33 || $_GET["busNumber"] == 34 || $_GET["busNumber"] == 35 || $_GET["busNumber"] == 43 || $_GET["busNumber"] == 44){
    
    echo('
    
<form action="form.php" method="get"><input type="hidden" name="busNumber" value="'.$_GET["busNumber"].'">
please choose alarm location for bus number <strong>'. $_GET["busNumber"] .' </strong><br>

<button class="btn btn-default" type="submit" name="place_type" value="busStop">bus stop</button><br> or <br>
<button class="btn btn-default" type="submit" name="place_type" value="otherLoc">other location</button>
');}
else {
    $rows =  CS50::query("SELECT * FROM buses WHERE Nr = ?",  $_GET["busNumber"]);
    
    $bus = $rows[0];
    $bus = array_map('utf8_encode', $bus);
    render("select_place_type.php", array("bus" => $bus));
}

}

//choose bus stop
if ($_GET["place_type"] == "busStop")
{
    if ($_GET["busNumber"] == "any")
    {
        $rows =  CS50::query("SELECT MIN(id) AS id, stop FROM busStops GROUP BY stop");
    }
    else
    {
        $rows =  CS50::query("SELECT * FROM busStops WHERE BusNr = ?",  $_GET["busNumber"]);
    }
    
    $stops = array();
    foreach ($rows as $row)
    {
    
    $row = array_map('utf8_encode', $row);	
	array_push($stops, array("id" => $row["id"], "stop" => $row["stop"]));	        

    }

    render("bus_stops.php", array("stops" => $stops));
}


//put in other location
if ($_GET["place_type"] == "otherLoc")
{echo('
    <form action="form.php" method="get">
chose alarm location for bus nr <strong>' . $_GET["busNumber"] .' </strong>' . $to . ' <strong>'. $_GET["direction"] .' </strong>just by right-clicking on the map<br>

<br><br>
    <form action="form.php" method="get">
    <button class="btn btn-default" type="submit">new alarm</button></form>
   ');
   $nr = $_GET["busNumber"];
   $nr = preg_replace('/\s+/', '', $nr);
 
   $alarm = array(
       busNr => $nr,
       direction => $_GET["direction"],
       stop => $_GET["name"],
       x => $_GET["x"],
       y => $_GET["y"]
       );
 //   $alarm = array_map('utf8_encode', $alarm);   

    setcookie("custom_place", "yes", 0, "/");     
    setcookie("busNr", $alarm[busNr], 0, "/");
    setcookie("direction", $alarm[direction], 0, "/");
    setcookie("stop", $alarm[stop], 0, "/");
  //  setcookie("x", $alarm[x], 0, "/");
  //  setcookie("y", $alarm[y], 0, "/");
   
    

}



//final
if ($_GET["stop"] && empty($_GET["save_new"])){
    $rows =  CS50::query("SELECT * FROM busStops WHERE id = ?",  $_GET["stop"]);
   $row = $rows[0];
   $row = array_map('utf8_encode', $row);
    echo('you choose bus number <strong>' . $_GET["busNumber"] . '</strong> ' . $to . ' <strong>' . $_GET["direction"] . '</strong>, alarm starts when bus will pass by <strong>' . $row["stop"] . '</strong><br><br>
    <form action="form.php" method="get">
    <button class="btn btn-default" type="submit">new alarm</button></form>
   ');
   $set_alarm = true;
  
   $nr = $_GET["busNumber"];
   $nr = preg_replace('/\s+/', '', $nr);
   
   $alarm = array(
       busNr => $nr,
       direction => $_GET["direction"],
       stop => $row["stop"],
       x => $row["x"],
       y => $row["y"]
       );
         //  $alarm = array_map('utf8_encode', $alarm);   
    setcookie("busNr", $alarm[busNr], 0, "/");
    setcookie("direction", $alarm[direction], 0, "/");
    setcookie("stop", $alarm[stop], 0, "/");
    setcookie("x", $alarm[x], 0, "/");
    setcookie("y", $alarm[y], 0, "/");
   
}

//final with custom place

if ($_GET["x"])
{
     echo('you choose bus number <strong>' . $_GET["busNumber"] . '</strong> ' . $to . '  <strong>' . $_GET["direction"] . '</strong>, alarm starts when bus will pass by <strong>' . $_GET["name"] . '</strong><br><br>
    <form action="form.php" method="get">
    <button class="btn btn-default" type="submit">new alarm</button></form>
   ');
   $nr = $_GET["busNumber"];
   $nr = preg_replace('/\s+/', '', $nr);
 
   $alarm = array(
       busNr => $nr,
       direction => $_GET["direction"],
       stop => $_GET["name"],
       x => $_GET["x"],
       y => $_GET["y"]
       );
 //   $alarm = array_map('utf8_encode', $alarm);   

   
    setcookie("busNr", $alarm[busNr], 0, "/");
    setcookie("direction", $alarm[direction], 0, "/");
    setcookie("stop", $alarm[stop], 0, "/");
  //  setcookie("x", $alarm[x], 0, "/");
  //  setcookie("y", $alarm[y], 0, "/");
   
    
}


?>


</body>
</html>