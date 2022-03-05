<?php

include "db_connect.php";

$sql = "SELECT * FROM bus ORDER BY id DESC";
$result = mysqli_query($conn,$sql)

?>