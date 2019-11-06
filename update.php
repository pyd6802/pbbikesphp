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
            Location ID To Update: <input type="number" name="ID" required><br><br>
            Estimated Capacity:    <input type="number" name="Capacity" required><br><br>
            <input type="submit" name="update" value="Update Data">
        </form>

	<p id="status-message">Estimated Capacity data could not be updated 
        
        <script>
           setTimeout(function(){
            document.getElementById('status-message').style.display = 'none'; }, 10000);
         </script>

    </<body>
</html>
