<?php
session_start();
include "db_connect.php";
if (isset($_POST['username']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username= validate($_POST['username']);
    $password= validate($_POST['password']);

    if(empty($username)){
        header("Location: admin.php?error= User name is required");
        exit();

    }
    else if(empty($password)){
        header("Location: admin.php?error= Password is required");
        exit();

    }
    else{
       // $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        //$result = $conn->query($sql);
        
       // if ($result->num_rows > 0) {
          // output data of each row
        //  while($row = $result->fetch_assoc()) {
       $sql= "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        //if(mysqli_num_rows($result) === 1 )
            
           if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if($row['username'] === $username && $row['password'] === $password){
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: adminpage.php");
            exit();
            }
            
        }
        else{
            header("Location: admin.php?error= Incorrect Username or Password");
            exit();
        }
    }
}
else{
    header("Location: admin.php");
    exit();
}