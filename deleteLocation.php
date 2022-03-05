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

	$sql = "DELETE FROM location
	        WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location: locationIndex.php?success=Successfully Deleted The Record");
   }else {
      header("Location: locationIndex.php?error=unknown error occurred&$user_data");
   }

}else {
	header("Location: locationIndex.php");
}
