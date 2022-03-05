<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])){

?>

<html>
<head>
    <title>Bus Booking Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo1.png" class="logo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="scheduleListIndex.php">Schedule</a></li>
                <li><a href="bookedIndex.php">Booked List</a></li>
                <li><a href="maintenance.html">Maintenance</a></li>
                

            </ul>
        </div>
        <div class="content">
            <h1>hello, <?php echo $_SESSION['name']; ?></h1>
            <div>
            <button type="button"><span></span><a href="logout.php">Logout</a></button>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header("Location: admin.php");
            exit();
}