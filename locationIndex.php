<?php include "locationTable.php"; ?>

<html>
<head>
    <title>Location Maintenance</title>
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

        <?php if(mysqli_num_rows($result)){?>

        
          <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Terminal Name</th>
                    <th>City</th>
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
                  <td><?php echo $row['terminal_name']?></td>
                  <td><?php echo $row['city']?></td>
                  <td><a href="updateLocation.php?id=<?=$row['id']?>">Update</a>
                  <a href="deleteLocation.php?id=<?=$row['id']?>" onclick="return checkDelete()">Delete</a>
                  <td>
                </tr>
                
                   <?php  }  ?>
            </tbody>
        </table>
        <?php  } ?>
        <br><a href="addLocation.php">Add</a>
      
          </div>
        </div>
    </div>

</body>
</html>