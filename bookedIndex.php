<?php include "bookedTable.php"; ?>

<html>
<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="table.css">
    
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

        <?php if(mysqli_num_rows($result)){?>

        
          <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Depature</th>
                    <th>Bus</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!--REmove-->
            <tbody id="tbody">
            <?php 
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                $i++;
            ?>            
                <tr>
                  <th><?=$i?></th>
                  <td><?php echo $row['departure_time']?></td>
                  <td><?php echo $row['bus_id']?></td>
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['phone']?></td>
                  <td><?php echo $row['status']?></td>
                  <td><a href="updateBooking.php?bid=<?=$row['bid']?>">Update</a><td>
                </tr>
                
                   <?php  }  ?>
            </tbody>
        </table>
        <?php  } ?>
        
      
          </div>
        </div>
    </div>

</body>
</html>