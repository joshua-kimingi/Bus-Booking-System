<?php  

if(isset($_GET['id'])){
   include "db_connect.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "DELETE FROM schedule_list
	        WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location: scheduleListIndex.php?success=Successfully Deleted The Record");
   }else {
      header("Location: scheduleListIndex.php?error=unknown error occurred&$user_data");
   }

}else {
	header("Location: scheduleListIndex.php");
}
