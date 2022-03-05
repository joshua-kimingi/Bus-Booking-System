<?php include 'updateUsersOperation.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َUpdate</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>

<form class="box" action="updateUsersOperation.php" method="POST">
  <h1>Update User Info</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="name"  value="<?=$row['name']?>" >
  <input type="text" name="username"  value="<?=$row['username']?>">
  <input type="text" name="password"  value="<?=$row['password']?>">
  <input type="hidden" name="id"  value="<?=$row['id']?>">
  <button type="submit" name="update">Update</button>
  <a href="usersIndex.php">Back</a>

</form>


  </body>
</html>