<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))

{
 $link = mysqli_connect('pbbikesaws.cl1i7i33btse.us-east-1.rds.amazonaws.com', 'admin', 'pbbikesaws', 'pbbikes');
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
        <title> Capacity Crowd Sourcing </title>
	<h1> Pittsburgh Bikes Crowd Sourcing </h1>
        <hr>
        <h2> Use this form to provide your capacity estimate </h2>  
        <hr>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <iframe width="620" height="340" 
     src="https://datastudio.google.com/embed/reporting/85de1e89-2f67-489a-98f1-7db3fc3c5d5a/page/BoX4" 
     frameborder="0" style="border:0" allowfullscreen></iframe>
        <form action="update.php" method="post">
            Location ID To Update: <input type="number" name="id" required><br><br>
            Estimated Capacity:    <input type="number" name="capacity" required><br><br>
            <input type="submit" name="update" value="Update Data">
        </form>
	<p id="status-message">Estimated Capacity data could not be updated 
        
        <script>
           setTimeout(function(){
            document.getElementById('status-message').style.display = 'none'; }, 10000);
         </script>
    </<body>
</html>
