<?php include 'updateLocationOperation.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َUpdate</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>

<form class="box" action="updateLocationOperation.php" method="POST">
  <h1>Update Location Info</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="terminal_name"  value="<?=$row['terminal_name']?>" >
  <input type="text" name="city"  value="<?=$row['city']?>">
  <input type="hidden" name="id"  value="<?=$row['id']?>">
  <button type="submit" name="update">Update</button>
  <a href="locationIndex.php">Back</a>

</form>


  </body>
</html>