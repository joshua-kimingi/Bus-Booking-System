<?php 

if (isset($_GET['id'])) {
	include "db_connect.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM location WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: busIndex.php");
    }


}else if(isset($_POST['update'])){
    include "db_connect.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$terminal_name = validate($_POST['terminal_name']);
	$city = validate($_POST['city']);
	$id = validate($_POST['id']);

    if($terminal_name && $city){
        $sql="
            UPDATE location SET terminal_name='$terminal_name',city='$city' WHERE id='$id'
        ";
        $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: locationIndex.php?success=Successfully Updated the Record");
       }else {
          header("Location: updateLocation.php?id=$id&error=unknown error occurred&$user_data");
       }
    }

	else if (empty($terminal_name)) {
		header("Location: updateLocation.php?id=$id&error=Terminal Name is required");
	}else if(empty($city)) {
		header("Location: updateLocation.php?id=$id&error=City Name is required");
	}
}else {
	header("Location: locationIndex.php");
}