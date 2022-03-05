<?php include 'addBookedOperation.php';?>

<html>
<head>
    <title>Bus Booking Admin Page</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
   
        <div class="content">
        
        <form class="box" action="addBookedOperation.php" method="POST">
  <h1>Book</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>
  <input type="hidden" name="schedule_id"  value="<?php if(isset($_GET['id']))
		                           echo($_GET['id']); ?>">
<!--start-->
<br><br><label> Price: </label>
<select name='amount'>
  <?php
include 'db_connect.php';
$check=$_GET['id'];
$sql= "SELECT price FROM schedule_list WHERE id='$check'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
       

        while ($rows=mysqli_fetch_assoc($result)){
            echo "<option>" .$rows["price"]."</option>";
        }

        
}

?>
</select>

<!--end-->
  <input type="text" name="name"  value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" placeholder="Enter Your Name">
  <input type="tel" name="phone"  value="<?php if(isset($_GET['phone']))
		                           echo($_GET['phone']); ?>" placeholder="eg 254768816718"><br>
  
  <!--<br><button formaction="lipaOnline.php">Pay</button> <br>
  <h2>Then</h2>-->
  <button type="submit" name="book">Submit</button>
  <a href="book_now.php">Back</a>

</form>

</body>
</html>