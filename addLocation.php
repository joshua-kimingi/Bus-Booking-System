<html>
<head>
    <title>Bus Booking Admin Page</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
   
        <div class="content">
        
        <form class="box" action="addLocationOperation.php" method="POST">
  <h1>New Location</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="terminal_name"  value="<?php if(isset($_GET['terminal_name']))
		                           echo($_GET['terminal_name']); ?>" placeholder="Enter Terminal Name">
  <input type="text" name="city"  value="<?php if(isset($_GET['city']))
		                           echo($_GET['city']); ?>" placeholder="Enter City Name">
  <button type="submit" name="create">Add</button>
  <a href="locationIndex.php">Back</a>

</form>

</body>
</html>