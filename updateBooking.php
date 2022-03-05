<?php include 'updateBookingOperation.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َUpdate</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>

<form class="box" action="updateBookingOperation.php" method="POST">
  <h1>Update Bus</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>

  <br><br><label> Payment Status: </label>
  <select name="status">
    <option value="Paid">Paid</option> <br>
    
</select>
  <input type="hidden" name="bid"  value="<?=$row['bid']?>">
  
  <button type="submit" name="update">Update</button>
  <a href="bookedIndex.php">Back</a>

</form>


  </body>
</html>