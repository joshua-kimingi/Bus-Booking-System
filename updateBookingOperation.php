<?php 

if (isset($_GET['bid'])) {
	include "db_connect.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$bid = validate($_GET['bid']);

	$sql = "SELECT * FROM booked WHERE bid=$bid";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: bookedIndex.php");
    }


}else if(isset($_POST['update'])){
    include "db_connect.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	
	$status = validate($_POST['status']);
	$bid = validate($_POST['bid']);

    if($status && $bid){
        $sql="
            UPDATE booked SET status='$status' WHERE bid='$bid'
        ";
        $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: bookedIndex.php?success=Successfully Updated the Record");
       }else {
          header("Location: updateBooking.php?id=$id&error=unknown error occurred&$user_data");
       }
    }

}else {
	header("Location: bookedIndex.php");
}