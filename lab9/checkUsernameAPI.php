<?php

include '../dbConnection.php';

$conn = getDatabaseConnection("heroku_53875b1d81962c9");

$username = $_GET['username'];

//next query allows for SQL injection because of the single quotes
//$sql = "SELECT * FROM lab9_user WHERE username = '$username'";

$sql = "SELECT * FROM admin WHERE username = :username";


$stmt = $conn->prepare($sql);
$stmt->execute( array(":username"=>$username));
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

echo json_encode($record);

?>