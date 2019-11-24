<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))

{
// $link = mysqli_connect('34.68.111.23', 'root', 'pbbikesmysql', 'pbbikes');
 $link = mysqli_connect('pbbikesaws.cl1i7i33btse.us-east-1.rds.amazonaws.com', 'admin', 'pbbikesaws', 'pbbikes');
// Check connection

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
       
    
   $Message = ' ';
   $Location_id = $_POST['ID'];
   $Capacity = $_POST['Capacity'];
           
   // mysql query to Update data
    
   $query = "UPDATE Location SET Estimated_Space=$Capacity WHERE LocID = $Location_id;";
   
   $result = mysqli_query($link, $query);
 
   if(mysqli_affected_rows($link)>0)
   {      
 	$Message = 'was updated';} 
   else{
        $Message = 'could not be updated';}

//   $result-->free();
   mysqli_close($link);
}

?>

<!DOCTYPE html>
<html>
	
<font face="verdana" color="orange"> 

  
  <head>
    <meta charset="UTF-8">
    <title style="text-align: center;">Help, I need to park my bike in Pittsburgh!</title>
  </head>

  <body style="background-color:black;">
 
    <h1 style="text-align: center;"> <b> Pittsburgh Bikes Capacity Crowd Sourcing</b> </h1>
	  
    <h2 style="text-align: center;">
    Update the Estimated Capacity and Help Your Fellow Cyclist Find Parking<g=/h2>
    
    <h3 style="text-align: center;">Enter the Bike Location ID and Update the Estimated Capacity</h3>
    
 
    <body>
    <div align="center">
    
       <iframe width="620" height="340" 
       src="https://datastudio.google.com/embed/reporting/85de1e89-2f67-489a-98f1-7db3fc3c5d5a/page/BoX4" 
       frameborder="0" style="border:0" allowfullscreen></iframe>
 
    </div>
	    
	    <p>  </p>
	     <p style="text-align: center;"> My IP: <?php echo $_SERVER["REMOTE_ADDR"]; ?> </p>
	    <p>  </p>
	    
    <div align="center">    
        <form action="update.php" method="post">
            Location ID To Update: <input type="number" name="ID" required><br><br>
            Estimated Capacity:    <input type="number" name="Capacity" required><br><br>
            <input type="submit" name="update" value="Update Data">
        </form>
     </div>

     <p id="status-message">Estimated Capacity data <?php echo $Message ?> 
        
        <script>
           setTimeout(function(){
            document.getElementById('status-message').style.display = 'none'; }, 10000);
         </script>

     <div align ="center">
        <button onclick="window.location.href='http://mypittsburghbikes.com/index.php';
	">   Click Here To See Location Details and Steet View of Racks  </button>
     </div>
    </<body>
</html>
