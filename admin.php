<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>

<form class="box" action="login.php" method="POST">
  <h1>Login</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="" value="Login">

  <!--button type="submit">Login</button-->
</form>


  </body>
</html>