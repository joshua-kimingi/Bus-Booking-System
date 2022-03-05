<?php

include "db_connect.php";

$sql = "SELECT * FROM location ORDER BY id DESC";
$result = mysqli_query($conn,$sql)

?>