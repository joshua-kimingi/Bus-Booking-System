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

	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: usersIndex.php");
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
	$username = validate($_POST['username']);
    $password = validate($_POST['password']);
	$id = validate($_POST['id']);

    if($name && $username && $password){
        $sql="
            UPDATE users SET name='$name',username='$username',password='$password'  WHERE id='$id'
        ";
        $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: usersIndex.php?success=Successfully Updated the Record");
       }else {
          header("Location: updateUsers.php?id=$id&error=unknown error occurred&$user_data");
       }
    }

	else if (empty($name)) {
		header("Location: updateUsers.php?id=$id&error=Admin Name is required");
	}else if(empty($username)) {
		header("Location: updateUsers.php?id=$id&error=Admin Username is required");
	}
    else if(empty($password)) {
		header("Location: updateUsers.php?id=$id&error=Password is required");
	}
}else {
	header("Location: usersIndex.php");
}