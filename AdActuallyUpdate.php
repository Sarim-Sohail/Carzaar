<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
session_start();

if (isset($_POST['update'])) {

    $cID = $_GET['cID'];
    $registration = $_POST['registration'];
    $model = $_POST['model'];
    $make = $_POST['make'];
    $name = $_POST['name'];
    $mileage = $_POST['mileage'];
    $car_capacity = $_POST['capacity'];
    $color = $_POST['color'];
    $car_seating = $_POST['seating'];
    $cost = $_POST['cost'];
    $category = $_POST['category'];
    $transmission = $_POST['transmission'];
    $assembly = $_POST['assembly'];

    $query = "SELECT * from ad where ad_id=?";
    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("i", $cID);
    //executing the binded query
    $result = $stmt->execute();
    //Save the query result
    $stmt_result = $stmt->get_result();
    //fetch query data
    $row = $stmt_result->fetch_assoc();

    $id = $row['ad_id'];

    $query = "UPDATE `ad` set `re_no`=?, `model`=? ,`make`=?, `name`=?, `mileage`=?, `engine_capacity`=?, `color`=?, `seating_capacity`=? , `cost`=? , `category`=? , `transmission`=? , `assembly`=? where `ad_id`=?";

    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("sissiisidsssi", $registration, $model, $make, $name, $mileage, $car_capacity, $color, $car_seating, $cost, $category, $transmission, $assembly, $id);
    //executing the binded query
    $result = $stmt->execute();

    if ($result) {
        header("Location: AllAdsView.php");
    } else {
        echo "Recheck your query";
    }
}

?>