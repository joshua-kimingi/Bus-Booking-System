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

	$sql = "SELECT * FROM bus WHERE id=$id";
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

	$name = validate($_POST['name']);
	$bus_number = validate($_POST['bus_number']);
	$id = validate($_POST['id']);

    if($name && $bus_number){
        $sql="
            UPDATE bus SET name='$name',bus_number='$bus_number' WHERE id='$id'
        ";
        $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: busIndex.php?success=successfully Updated the Record");
       }else {
          header("Location: updateBus.php?id=$id&error=unknown error occurred&$user_data");
       }
    }

	else if (empty($name)) {
		header("Location: updateBus.php?id=$id&error=Bus Name is required");
	}else if(empty($bus_number)) {
		header("Location: updateBus.php?id=$id&error=Bus Number is required");
	}
}else {
	header("Location: busIndex.php");
}