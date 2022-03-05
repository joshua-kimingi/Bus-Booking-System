<?php include 'updateBusOperation.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َUpdate</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>

<form class="box" action="updateBusOperation.php" method="POST">
  <h1>Update Bus</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="name"  value="<?=$row['name']?>" >
  <input type="text" name="bus_number"  value="<?=$row['bus_number']?>">
  <input type="hidden" name="id"  value="<?=$row['id']?>">
  <button type="submit" name="update">Update</button>
  <a href="busIndex.php">Back</a>

</form>


  </body>
</html>