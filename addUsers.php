<html>
<head>
    <title>Bus Booking Admin Page</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
   
        <div class="content">
        
        <form class="box" action="addUsersOperation.php" method="POST">
  <h1>New Admin</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="name"  value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" placeholder="Enter Admin Name">
  <input type="text" name="username"  value="<?php if(isset($_GET['username']))
		                           echo($_GET['username']); ?>" placeholder="Enter Admin Username">
  <input type="text" name="password"  value="<?php if(isset($_GET['password']))
		                           echo($_GET['password']); ?>" placeholder="Enter Admin Username">
  <button type="submit" name="create">Add</button>
  <a href="usersIndex.php">Back</a>

</form>

</body>
</html>