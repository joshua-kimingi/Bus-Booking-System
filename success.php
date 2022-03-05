<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo1.png" class="logo">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="book_now.php">Schedule</a></li>
                <li><a href="admin.php">Admin</a></li>

            </ul>
        </div>
        <div class="content">
            <h2> <?php echo $_GET['success'];?> <h2>
            <P>   Lipa na Mpesa to ensure your seat is fully guarenteed.<br>
                  Keep the payment confirmation message from Mpesa as your ticket.<br>
                  Happy Travelling. 
                            
            </P>
        <div>
            <button type="button"><span></span><a href="book_now.php">Do More Bookings</a></button>
        </div>
    </div>
</body>
</html>