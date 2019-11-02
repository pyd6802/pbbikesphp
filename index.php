<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>Help, I need to park my bike in Pittsburgh!</title>
  </head>

  <body>
 
    <h1>Pittsburgh Bike Racks</h1>
    <p>Need to park your bike? Use the interactive map showing location of bike racks in downtown Pittsburgh</p>
    
    <p>Click on the tree map location to see where the rack is located.</p>
    <iframe width="1140" height="541.25" 
     src="https://app.powerbi.com/reportEmbed?reportId=65f4b52f-97a8-47ee-b183-44d5c0b37b56&autoAuth=true&ctid=4c25b8a6-17f7-46f9-83f0-54734ab81fb1&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLXVzLW5vcnRoLWNlbnRyYWwtcmVkaXJlY3QuYW5hbHlzaXMud2luZG93cy5uZXQvIn0%3D" 
            frameborder="0" allowFullScreen="true"></iframe>
 
    
    <iframe width="800" height="400" 
          src="https://app.powerbi.com/view?r=eyJrIjoiMTZmYzZjMDEtMTdjZi00NTg3LTlkMjEtMmVjNjUyN2ZhN2Y0IiwidCI6IjRjMjViOGE2LTE3ZjctNDZmOS04M2YwLTU0NzM0YWI4MWZiMSIsImMiOjN9" 
          frameborder="0" allowFullScreen="true"></iframe>

    <h1>Pittsburgh Bike Racks</h1>
    <p>Where is the most space? Interactive grid showing bike capacity by rack location in downtown Pittsburgh</p>
     
    <iframe width="800" height="400" src="https://app.powerbi.com/view?r=eyJrIjoiYjFkNzc1OTYtNmJjYS00YmU1LWJjOTktMzczY2UwODZhZDA1IiwidCI6IjRjMjViOGE2LTE3ZjctNDZmOS04M2YwLTU0NzM0YWI4MWZiMSIsImMiOjN9" 
          frameborder="0" allowFullScreen="true"></iframe>
 
    <p>Created using PowerBI services</p>
 
 <h1>Show me the data!</h1>


<?php 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect('34.68.111.23', 'root', 'pbbikesmysql', 'pbbikes');
// Check connection

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution

$sql = "SELECT LocID, Street, Building, Bike_Capacity, Rack_Style, Weather_Coverage FROM Location";
 
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
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['LocID'] . "</td>";
                echo "<td>" . $row['Street'] . "</td>";
                echo "<td>" . $row['Building'] . "</td>";
                echo "<td>" . $row['Bike_Capacity'] . "</td>";
		echo "<td>" . $row['Rack_Style'] . "</td>";
                echo "<td>" . $row['Weather_Coverage'] . "</td>";
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
