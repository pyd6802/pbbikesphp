<?php

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
           
   // mysql query to Update data
   //"UPDATE persons SET email='peterparker_new@mail.com' WHERE id=1"
   
   $query = "UPDATE Location SET Bike_Capacity=$Capacity WHERE LocID = $Location_id;";
   $result = mysqli_query($link, $query);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Invalid Location ID';
	   echo "Error: Our query failed to execute and here is why: \n";
	   echo "Query: " . $query . "\n";
	   echo "Errno: " . $mysqli->errno . "\n";
	   echo "Error: " . $mysqli->error . "\n";
   }
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