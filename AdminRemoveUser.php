<?php

$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

if (isset($_GET['cID'])) {

    $queryID = $_GET['cID'];

    $query = "DELETE from customer where id = ?";
    //SQL injection prevention here
    //preparing the query
    $stmt = $conn->prepare($query);
    //binding the required parameters to values
    $stmt->bind_param("i", $queryID);
    //executing the binded query
    $result = $stmt->execute();
    //Save the query result
    $stmt_result = $stmt->get_result();

    if ($result) {
        header("location:AdminViewUser.php");
    } else {
        echo $queryID;
        echo ' Please Check Your Query ';
    }
} else {
    echo "not getting cid";
}
?>