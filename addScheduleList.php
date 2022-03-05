<html>
<head>
    <title>Bus Booking Admin Page</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
   
        <div class="content">
        
        <form class="box" action="addScheduleListOperation.php" method="POST">
  <h1>New Schedule</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>


<label> Bus: </label>
<select name='bus_id'>
  <?php
include 'db_connect.php';
$sql= "SELECT bus_number FROM bus";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0) {
        

        while ($rows=mysqli_fetch_assoc($result)){
            echo "<option>" .$rows["bus_number"]."</option>";
        }

       
}

?>
 </select>

<br><br><label> From: </label>
<select name='from_location'>
  <?php
include 'db_connect.php';
$sql= "SELECT terminal_name,city FROM location";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
       

        while ($rows=mysqli_fetch_assoc($result)){
            echo "<option>" .$rows["city"].' - '.$rows["terminal_name"]."</option>";
        }

        
}

?>
</select>

<br><br><label> To: </label>
<select name='to_location'>
  <?php
include 'db_connect.php';
$sql= "SELECT terminal_name,city FROM location";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0) {
        

        while ($rows=mysqli_fetch_assoc($result)){
            echo "<option>" .$rows["city"].' - '.$rows["terminal_name"]."</option>";
        }

        
}

?>
</select>


<br><br><label>Departure: </label><input type="datetime-local" name="departure_time">
<label > Arrival: </label><input type="datetime-local" name="eta" > 
<input type="text" name="seats_available"  value="<?php if(isset($_GET['seats_available']))
		                           echo($_GET['seats_availablee']); ?>" placeholder="Seats">                                                                                                                                            
  <input type="text" name="price"  value="<?php if(isset($_GET['price']))
		                           echo($_GET['price']); ?>" placeholder="Price">
  
  <button type="submit" name="create">Add</button>
  <a href="scheduleListIndex.php">Back</a>

</form>

</body>
</html>