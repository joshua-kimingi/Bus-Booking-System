<?php

include "db_connect.php";

$sql = "SELECT * FROM booked 
INNER JOIN schedule_list ON booked.schedule_id = schedule_list.id
";
$result = mysqli_query($conn,$sql)

?>