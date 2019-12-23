<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))

{
// $link = mysqli_connect('34.68.111.23', 'root', 'pbbikesmysql', 'pbbikes');
 $link = mysqli_connect('***', '***', '***', '***');
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
 
    <h1 style="text-align: center;"> Pittsburgh Bikes </h1>
	  
    <p style="text-align: center;" font size="3"> <b>Capacity Crowd Sourcing</b> </p>
	  
    <p style="text-align: center;" font size ="2">
	    
	    <b> Update the Estimated Capacity and Help Your Fellow Cyclists Find Parking </b> </p>
    
    <p style="text-align: center;" font size ="1">Enter the Bike Location ID and Update the Estimated Capacity</p>
    
 
    <div align="center">
    
       <iframe width="800" height="400" 
       src="https://datastudio.google.com/embed/reporting/85de1e89-2f67-489a-98f1-7db3fc3c5d5a/page/BoX4" 
       frameborder="0" style="border:0" allowfullscreen></iframe>
 
    </div>
	    <font face="verdana" color="orange" font size="1">
	
		    <p style="text-align: center;"> My IP: <?php echo $_SERVER["SERVER_ADDR"]; ?> </p>
	    
    <div align="center">    

    <div align="center" style="border:2px solid orange; width:290px;">    
        <p> <br /></p>
     	<form action="update.php" method="post">
            Location ID To Update: <input type="number" name="ID" required><br><br>
            Estimated Capacity:    <input type="number" name="Capacity" required><br><br>
            <input type="submit" name="update" value="Update Data">
        </form>
	<p> <br /></p>  
        <p align="center" id="status-message">Estimated Capacity data <?php echo $Message ?> 
        
        <script>
           setTimeout(function(){
            document.getElementById('status-message').style.display = 'none'; }, 10000);
	     </script> 
        </p>
	    </div> </div>
     
     <div align ="center">
	<p> <br /></p>
        <button onclick="window.location.href='http://mypittsburghbikes.com/index.php';
	">   Click Here To See Location Details and Steet View of Racks  </button>
     </div>
    </<body>
</html>
