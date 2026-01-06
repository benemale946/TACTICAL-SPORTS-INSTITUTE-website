<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tsi_booking";  
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
//Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $session_type = $_POST['session_type'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    //prepare and execute the database insertion

    $sql = 'INSERT INTO `booking`(`name`, `email`, `phone`, `session_type`, `date`, `time`) 
    VALUES ('$name','$email','$phone','$session_type','$date','$time')";

    if($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>