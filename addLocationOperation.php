<?php 

if (isset($_POST['create'])) {
	include "db_connect.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$terminal_name = validate($_POST['terminal_name']);
	$city = validate($_POST['city']);

	$user_data = 'terminal_name='.$terminal_name. '&city='.$city;

	if (empty($terminal_name)) {
		header("Location: addLocation.php?error=Terminal Name is required&$user_data");
	}else if (empty($city)) {
		header("Location: addLocation.php?error=City Name is required&$user_data");
	}else {

       $sql = "INSERT INTO location(terminal_name, city) 
               VALUES('$terminal_name', '$city')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
        header("Location: locationIndex.php?success=Successfully Added New Record");
       }else {
          header("Location: addlocation.php?error=unknown error occurred&$user_data");
       }
	}

}