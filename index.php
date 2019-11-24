<!DOCTYPE html>
<html>
 <font face="verdana" color="orange"> 

  
  <head>
    <meta charset="UTF-8">
    <title style="text-align: center;">Help, I need to park my bike in Pittsburgh!</title>
  </head>

 <body style="background-color:black;">
	 
<h1 style="text-align: center;"> <b> Pittsburgh Bikes </b> </h1>
	  
    <p style="text-align: center;">
    Need to park your bike? Use the interactive map showing location of bike racks in downtown Pittsburgh</p>
    
    <p style="text-align: center;">Click on the tree map location to see where the rack is located</p>
    
    <div align="center">
	  <iframe width="800" height="500" 
	  src="https://app.powerbi.com/view?r=eyJrIjoiYzlmNDVjZDYtMmQzOS00NTQ0LWJhM2QtZWQxMzI5OGUwZWE0IiwidCI6IjRjMjViOGE2LTE3ZjctNDZmOS04M2YwLTU0NzM0YWI4MWZiMSIsImMiOjN9" 
	  frameborder="0" allowFullScreen="true"></iframe>
	  </div>
    
    
 <h1 style="text-align: center;"> VM1 Show me the data! </h1>

<?php 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect('pbbikesaws.cl1i7i33btse.us-east-1.rds.amazonaws.com', 'admin', 'pbbikesaws', 'pbbikes');
// Check connection

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
<font face="verdana" color="orange" font size="3">	 

// Attempt select query execution

$sql = "SELECT LocID, Street, Building, Bike_Capacity, Rack_Style, Weather_Coverage, Estimated_Space, Time_Stamp FROM Location WHERE Bike_Capacity > 0 ORDER BY Bike_Capacity DESC";
 
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Location ID</th>";
                echo "<th>Street</th>";
                echo "<th>Building</th>";
                echo "<th>Bike Capacity</th>";
                echo "<th>Rack Style</th>";
                echo "<th>Weather Coverage</th>";
            	echo "<th>Estimated Space</th>";
		echo "<th>Last Updated</th>";
		echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td style="text-align: center;">" . $row['LocID'] . "</td>";
                echo "<td>" . $row['Street'] . "</td>";
                echo "<td>" . $row['Building'] . "</td>";
                echo "<td>" . $row['Bike_Capacity'] . "</td>";
		echo "<td>" . $row['Rack_Style'] . "</td>";
                echo "<td>" . $row['Weather_Coverage'] . "</td>";
		echo "<td>" . $row['Estimated_Space'] . "</td>";
                echo "<td>" . $row['Time_Stamp'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

<?php
 $result->free();
 $mysqli->close();
 ?>
 
 
</body>
</html>   

