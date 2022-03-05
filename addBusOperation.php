<?php 

if (isset($_POST['create'])) {
	include "db_connect.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$bus_number = validate($_POST['bus_number']);

	$user_data = 'name='.$name. '&bus_number='.$bus_number;

	if (empty($name)) {
		header("Location: addBus.php?error=Bus Name is required&$user_data");
	}else if (empty($bus_number)) {
		header("Location: addBus.php?error=Bus Number is required&$user_data");
	}else {

       $sql = "INSERT INTO bus(name, bus_number) 
               VALUES('$name', '$bus_number')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
        header("Location: busIndex.php?success=successfully Added New Record");
       }else {
          header("Location: addBus.php?error=unknown error occurred&$user_data");
       }
	}

}