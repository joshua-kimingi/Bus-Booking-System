<?php include 'updateScheduleListOperation.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َUpdate</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>

<form class="box" action="updateScheduleListOperation.php" method="POST">
  <h1>Update</h1>
  <?php if (isset($_GET['error'])) { ?>    
  <h2> <?php echo $_GET['error'];?> <h2>
  <?php } ?>


<label> Bus: </label>
<select name='bus_id' value="<?=$row['bus_id']?>">
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
<select name='from_location' value="<?=$row['from_location']?>">
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
<select name='to_location' value="<?=$row['to_location']?>">
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


<br><br><label>Departure: </label><input type="datetime-local" name="departure_time" value="<?=$row['departure_time']?>">
<br><label > Arrival: </label><input type="datetime-local" name="eta" value="<?=$row['eta']?>"> 
<input type="text" name="seats_available"  value="<?=$row['seats_available']?>" placeholder="Seats">                                                                                                                                            
  <input type="text" name="price"  value="<?=$row['price']?>" placeholder="Price">
                                   
  <input type="hidden" name="id"  value="<?=$row['id']?>">
  <button type="submit" name="update">Update</button>
  <a href="scheduleListIndex.php">Back</a>

</form>


  </body>
</html>