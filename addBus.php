<html>
<head>
    <title>Bus Booking Admin Page</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
   
        <div class="content">
        
        <form class="box" action="addBusOperation.php" method="POST">
  <h1>New Bus</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="name"  value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" placeholder="Enter Bus Name">
  <input type="text" name="bus_number"  value="<?php if(isset($_GET['bus_number']))
		                           echo($_GET['bus_number']); ?>" placeholder="Enter Bus Number">
  <button type="submit" name="create">Add</button>
  <a href="busIndex.php">Back</a>

</form>

</body>
</html>