<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
session_start();

$cID = $_GET['Book'];
$availability = 'Booked';

$query = "UPDATE `ad` set `availability` =? where `ad_id`=?";
//SQL injection prevention here
//preparing the query
$stmt = $conn->prepare($query);
//binding the required parameters to values
$stmt->bind_param("si", $availability, $cID);
//executing the binded query
$result = $stmt->execute();

if ($result) {
    header("Location: AllAdsView.php");
} else {
    echo "Recheck your query";
}

?>