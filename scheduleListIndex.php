<?php include "scheduleListTable.php"; ?>

<html>
<head>
    <title>Bus Maintenance</title>
    <link rel="stylesheet" href="table.css">
    <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo1.png" class="logo">
            <ul>
                <li><a href="adminpage.php">Home</a></li>
                <li><a href="scheduleListIndex.php">Schedule</a></li>
                <li><a href="bookedIndex.php">Booked List</a></li>
                <li><a href="maintenance.html">Maintenance</a></li>
                

            </ul>
        </div>
        <div class="content">
        <?php if (isset($_GET['success'])) { ?>    
  <h2> <?php echo $_GET['success'];?> <h2>
  <?php } ?>

        <?php if ($result->num_rows > 0) {?>

        
          <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bus</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>ETA</th>
                    <th>Seats</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!--REmove-->
            <tbody id="tbody">
            <?php 
            $i = 0;
            while($row = $result->fetch_assoc()){
                $i++;
            ?>            
                <tr>
                  <th><?=$i?></th>
                  <td><?php echo $row['bus_id']?></td>
                  <td><?php echo $row['from_location']?></td>
                  <td><?php echo $row['to_location']?></td>
                  <td><?php echo $row['departure_time']?></td>
                  <td><?php echo $row['eta']?></td>
                  <td><?php echo $row['seats_available']?></td>
                  <td><?php echo $row['price']?></td>                   
                  <td><a href="updateScheduleList.php?id=<?=$row['id']?>">Update</a>
                  <a href="deleteScheduleList.php?id=<?=$row['id']?>" onclick="return checkDelete()">Delete</a>
                  <td>
                </tr>
                
                   <?php  }  ?>
            </tbody>
        </table>
        <?php  } ?>
        <br><a href="addScheduleList.php">Add</a>
      
          </div>
        </div>
    </div>

</body>
</html>