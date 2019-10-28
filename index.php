<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>Help, I need to park my bike in Pittsburgh!</title>
  </head>

  <body>
 
    <h1>Pittsburgh Bike Racks</h1>
    <p>Need to park your bike? Use the interactive map showing location of bike racks in downtown Pittsburgh</p>
    
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
$link = mysql_connect('34.68.111.23', 'root', 'pbbikesmysql')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('pbbikes') or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM Location';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>


  </body>

</html>
