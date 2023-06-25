<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
session_start();

if (isset($_POST['submit'])) {

    $cID = $_GET['cID'];
    $status = $_POST['stat'];

    $query = "UPDATE `ad` set `ad_status`=? where `ad_id`=?";

    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("si", $status, $cID);
    //executing the binded query
    $result = $stmt->execute();

    if ($result) {
        header("Location: AdminViewAds.php");
    } else {
        echo "Recheck your query";
    }
}

?>