<?php include "usersTable.php"; ?>

<html>
<head>
    <title>Users Maintenance</title>
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
                <li><a href="#">Admin</a></li>

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
                    <th>Admin Name</th>
                    <th>Admin Username</th>
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
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['username']?></td>
                  <td><a href="updateUsers.php?id=<?=$row['id']?>">Update</a>
                  <a href="deleteUsers.php?id=<?=$row['id']?>" onclick="return checkDelete()">Delete</a>
                  <td>
                </tr>
                
                   <?php  }  ?>
            </tbody>
        </table>
        <?php  } ?>
        <br><a href="addUsers.php">Add</a>
      
          </div>
        </div>
    </div>

</body>
</html>