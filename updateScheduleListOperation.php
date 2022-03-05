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

	$sql = "SELECT * FROM schedule_list WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: scheduleListIndex.php");
    }


}else if(isset($_POST['update'])){
    include "db_connect.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$bus_id = validate($_POST['bus_id']);
	$from_location = validate($_POST['from_location']);
    $to_location = validate($_POST['to_location']);
    $departure_time = validate($_POST['departure_time']);
    $eta = validate($_POST['eta']);
    $seats_available = validate($_POST['seats_available']);
    $price = validate($_POST['price']);
	$id = validate($_POST['id']);

    if($bus_id && $from_location && $to_location && $departure_time && $eta && $seats_available && $price ){
        $sql="
            UPDATE schedule_list SET bus_id='$bus_id',from_location='$from_location',to_location='$to_location',departure_time='$departure_time',eta='$eta',seats_available='$seats_available',price='$price' WHERE id='$id'
        ";
        $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: scheduleListIndex.php?success=Successfully Updated the Record");
       }else {
          header("Location: updateScheduleList.php?id=$id&error=unknown error occurred");
       }
    }

	else if (empty($seats_available)) {
		header("Location: updateScheduleList.php?error=Seats Number is required");
	}else if (empty($departure_time)) {
		header("Location: updateScheduleList.php?error=Departure Time is required");
}else if (empty($eta)) {
    header("Location: updateScheduleList.php?error=Estimated time of Arrival is required");
}else if (empty($price)) {
    header("Location: updateScheduleList.php?error=Price per seat is required");
}else {
	header("Location: scheduleListIndex.php");
}

}
?>