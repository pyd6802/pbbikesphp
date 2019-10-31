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
// Connecting, selecting database
    echo 'Starting Connection Process';

 $mysqli = new mysqli('34.68.111.23', 'root', 'pbbikesmysql', 'pbbikes');
    if ($mysqli->connect_errno) 
    {
    echo "Sorry, this database is experiencing problems.";

    // Something you should not do on a public site, but this example will show you
    // anyways, is print out MySQL error related information -- you might log this
    
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    // You might want to show them something nice, but we will simply exit
    exit;
    }
    echo 'Connected successfully';

// Performing SQL query
$sql = "SELECT * FROM Location;";
if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
  echo "Sorry, the website is experiencing problems.";

  echo "Error: Our query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Errno: " . $mysqli->errno . "\n";
  echo "Error: " . $mysqli->error . "\n";
  exit;
}

//if ($result->num_rows === 0) {
  //  echo "Error - Table empty";
    //exit;}
       
echo "Number of rows" . $result->num_rows;


// Printing results in HTML
//echo "<table>\n";
//while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
//    echo "\t<tr>\n";
//    foreach ($line as $col_value) {
//        echo "\t\t<td>$col_value</td>\n";
//    }
//    echo "\t</tr>\n";
//}
//echo "</table>\n";


  $result->free();
  $mysqli->close();
?>

 
  </body>

</html>
