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
	$username = validate($_POST['username']);
    $password = validate($_POST['password']);

	$user_data = 'name='.$name. '&username='.$username. '&password='.$password ;

	if (empty($name)) {
		header("Location: addUsers.php?error=Admin Name is required&$user_data");
	}else if (empty($username)) {
		header("Location: addUsers.php?error=Admin Username is required&$user_data");
	}
    else if (empty($password)) {
		header("Location: addUsers.php?error=Password is required&$user_data");
	}else {

       $sql = "INSERT INTO users(name, username, password) 
               VALUES('$name', '$username', '$password')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
        header("Location: usersIndex.php?success=successfully Added New Record");
       }else {
          header("Location: addUsers.php?error=unknown error occurred&$user_data");
       }
	}

}