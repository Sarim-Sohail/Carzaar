<?php

$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

if (isset($_GET['cID'])) {
    $queryID = $_GET['cID'];
    $query = "SELECT warning from customer where id = ?";
    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("i", $queryID);
    //executing the binded query
    $result = $stmt->execute();
    //Save the query result
    $stmt_result = $stmt->get_result();
    $row = mysqli_fetch_assoc($stmt_result);
    if ($result) {
        if ($row['warning'] == 3) {
            $query1 = "DELETE from customer where id = ?";
            //SQL injection prevention here
            //preparing the query
            $stmt = $conn->prepare($query1);
            //binding the required parameters to values
            $stmt->bind_param("i", $queryID);
            //executing the binded query
            $result = $stmt->execute();
        } else {
            $new_warning = $row['warning'] + 1;
            $query1 = "UPDATE `customer` set `warning`=? where `id`=?";
            //SQL injection prevention here
            //preparing the query
            $stmt = $conn->prepare($query1);
            //binding the required parameters to values
            $stmt->bind_param("si", $new_warning, $queryID);
            //executing the binded query
            $result = $stmt->execute();
        }
        header("location:AdminViewUser.php");
    } else {

        echo $queryID;
        echo ' Please Check Your Query ';
    }
} else {
    echo "not getting cid";
}
?>