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
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['con'];
    $address = $_POST['address'];

    $query = "SELECT * from customer where id=?";
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

    $id = $row['id'];

    $query = "UPDATE `customer` set `f_name`=? , `l_name`=? , `password`=?, `age`=?, `gender`=?, `address`=?, `email`=?, `contact_no`=? where `id`=?";

    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("sssisssii", $fname, $lname, $password, $age, $gender, $address, $email, $contact, $id);
    //executing the binded query
    $result = $stmt->execute();

    if ($result) {
        header("Location: UserPersonalView.php");
    } else {
        echo "Recheck your query";
    }
}

?>