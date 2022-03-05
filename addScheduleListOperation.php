<?php 

if (isset($_POST['create'])) {
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

	

	if (empty($seats_available)) {
		header("Location: addScheduleList.php?error=Seats Number is required");
	}else if (empty($departure_time)) {
		header("Location: addScheduleList.php?error=Departure Time is required");
}else if (empty($eta)) {
    header("Location: addScheduleList.php?error=Estimated time of Arrival is required");
}else if (empty($price)) {
		header("Location: addScheduleList.php?error=Price per seat is required");
	}else {

       $sql = "INSERT INTO schedule_list(bus_id, from_location, to_location, departure_time, eta, seats_available, price) 
               VALUES('$bus_id', '$from_location', '$to_location', '$departure_time', '$eta', '$seats_available', '$price')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
        header("Location: scheduleListIndex.php?success=Successfully Added New Record");
       }else {
          header("Location: addScheduleList.php?error=unknown error occurred");
       }
	}

}