<?php


if (isset($_POST['book'])) {
	include "db_connect.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$phone = validate($_POST['phone']);
        $amount = validate($_POST['amount']);
    $schedule_id= validate($_POST['schedule_id']);


    $query = "SELECT seats_available FROM schedule_list WHERE id='$schedule_id'";
    $query_result =mysqli_query($conn,$query);
    // Associative array
$count = $query_result -> fetch_assoc();


    if($count["seats_available"] > 0)

    {

    





// Initialize the variables
$consumer_key = 'qmOUQ5AwnRgVpth9jHAdEr3kHD8QQXfa';
$consumer_secret = 'dKXt9IjGGiqvsh5q';
$BusinessShortCode = '174379';
$LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$TransactionType = 'CustomerPayBillOnline';
$tokenUrl = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$phone = $_POST['phone'];
$lipaOnlineUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$amount = $_POST['amount'];
$CallBackURL = 'https://2f50f430.ngrok.io/callback.php?key=kiduyuKLAUS1995';
$timestamp = date("Ymdhis");
$password = base64_encode($BusinessShortCode . $LipaNaMpesaPasskey . $timestamp);

// Generate the auth token
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $tokenUrl);
$credentials = base64_encode($consumer_key . ':' . $consumer_secret);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$curl_response = curl_exec($curl);

$token = json_decode($curl_response)->access_token;

// Initiate the STK Push
$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL, $lipaOnlineUrl);
curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));


$curl2_post_data = [
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => $TransactionType,
    'Amount' => $amount,
    'PartyA' => $phone,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $phone,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => 'Test',
    'TransactionDesc' => 'Test',
];

$data2_string = json_encode($curl2_post_data);

curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl2, CURLOPT_POST, true);
curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2_string);
curl_setopt($curl2, CURLOPT_HEADER, false);
curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl2, CURLOPT_SSL_VERIFYHOST, 0);
$curl2_response = json_decode(curl_exec($curl2));

echo json_encode($curl2_response, JSON_PRETTY_PRINT);





    //$schedule_id = validate($_POST['schedule_id']);

	$user_data = 'name='.$name. '&phone='.$phone;

	if (empty($name)) {
		header("Location: book.php?error=Your Name is required&$user_data");
	}else if (empty($phone)) {
		header("Location: book.php?error=Phone Number is required&$user_data");
	}else {

       $sql = "INSERT INTO booked(schedule_id,name, phone) 
               VALUES('$schedule_id','$name', '$phone')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
               //decrease the number of seats available for booking
               $sql="
            UPDATE schedule_list SET seats_available=seats_available-1 WHERE id='$schedule_id'
        ";
        $result = mysqli_query($conn, $sql);
        
        header("Location: success.php?success=Your Booking Has Been Record");
        
       }else {
          header("Location: book.php?error=unknown error occurred&$user_data");
       }
	}


}else{
    header("Location: book_now.php?success=No Seats Available For The schedule You Selected");}
}