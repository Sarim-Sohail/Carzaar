<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
session_start();

if (isset($_POST['update'])) {

    $cID = $_GET['cID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact = $_POST['con'];

    $query = "SELECT * from admin_t where id=?";
    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("i", $cID);
    //executing the binded query
    $result = $stmt->execute();
    //Save the query result
    $stmt_result = $stmt->get_result();
    $row = mysqli_fetch_assoc($stmt_result);
    $oldcnic = $row['id'];

    $query = "UPDATE `admin_t` set `contact_no`=? ,`gender`=?, `f_name`=?, `l_name`=?, `email`=?, `password`=? where `id`=?";

    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("isssssi", $contact, $gender, $fname, $lname, $email, $password, $oldcnic);
    //executing the binded query
    $result = $stmt->execute();
    //Save the query result
    $stmt_result = $stmt->get_result();

    if ($result) {
        header("Location: AdminPersonalView.php");
    } else {
        echo "Recheck your query";
    }
}

?>