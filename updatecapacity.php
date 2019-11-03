?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))

{
 $link = mysqli_connect('34.68.111.23', 'root', 'pbbikesmysql', 'pbbikes');
// Check connection

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
       
   // get values form input text and number
   
   $Location_id = $_POST['id'];
   $Capacity = $_POST['capacity'];
   
 
   $query = "Select Bike_Capacity from Location WHERE LocID = $Location_id;";
   $result = mysqli_query($link, $query);
	
   if ($row = $result->fetch_row()) {
   if ($row[0]) < $Capacity
	   echo 'Estimate must be less than rack Capacity';
   } else {

	mysqli_free_result($result)
   $query = "UPDATE Location SET Estimated_Space=$Capacity WHERE LocID = $Location_id;";
   $result = mysqli_query($link, $query);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Invalid Location ID';
	   echo "Error: Our query failed to execute and here is why not: \n";
	   echo "Query: " . $query . "\n";
	   echo "Errno: " . $mysqli->errno . "\n";
	   echo "Error: " . $mysqli->error . "\n";
   }
  }
 mysqli_free_result($result);
 mysqli_close($link);
}
   
 

?>

<!DOCTYPE html>

<html>

    <head>
        <title> PHP UPDATE DATA </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <form action="update.php" method="post">
            Location ID To Update: <input type="number" name="Location_id" required><br><br>
            New Capacity:<input type="number" name="Capacity" required><br><br>
            <input type="submit" name="update" value="Update Data">

        </form>
    </body>


</html>
