<?php
include 'db_connect.php';

$val= $_GET["value"];

//$val_M = mysqli_real_escape_string($conn,$val);

$sql= "SELECT bus_number FROM bus";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {
        echo "<select>";

        while ($rows=mysqli_fetch_assoc($result)){
            echo "<option>" .$rows["bus_number"]."</option>";
        }

        echo "</select>";
}

?>