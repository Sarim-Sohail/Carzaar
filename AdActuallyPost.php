<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'se_project');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
$cID = $_GET['cID'];

$query1 = "SELECT * from customer where id = ?";
//SQL injection prevention here
//preparing the query
$stmt1 = $con->prepare($query1);
//binding the required parameters to values
$stmt1->bind_param("i", $cID);
//executing the binded query
$result1 = $stmt1->execute();
//Save the query result
$stmt_result1 = $stmt1->get_result();

?>

<?php
if ($result1) {
    while ($row = $stmt_result1->fetch_assoc()) {
        $contact = $row['contact_no'];
        $ad_count = $row['ad_count'];

    }
}
?>

<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['registration']) || empty($_POST['model']) || empty($_POST['make']) || empty($_POST['name']) || empty($_POST['mileage']) || empty($_POST['engine']) || empty($_POST['color']) || empty($_POST['seating']) || empty($_POST['cost'] || empty($_POST['category'])) || empty($_POST['transmission']) || empty($_POST['assembly'])) {
        echo ' Please Fill in the Blanks ';
    } else {
        $registration = $_POST['registration'];
        $model = $_POST['model'];
        $make = $_POST['make'];
        $name = $_POST['name'];
        $mileage = $_POST['mileage'];
        $engine = $_POST['engine'];
        $color = $_POST['color'];
        $seating = $_POST['seating'];
        $cost = $_POST['cost'];
        $category = $_POST['category'];
        $availability = 'Available';
        $transmission = $_POST['transmission'];
        $assembly = $_POST['assembly'];
        $ad_status = 'Pending';
        $owner_id = $cID;
        $owner_contact = $contact;

        // echo $registration;
        // echo $model;
        // echo $make;
        // echo $name;
        // echo $mileage;
        // echo $engine;
        // echo $color;
        // echo $seating;
        // echo $cost;
        // echo $category;
        // echo $availability;
        // echo $transmission;
        // echo $assembly;
        // echo $ad_status;
        // echo $owner_id;
        // echo $owner_contact;
        // die();

        $query = "INSERT INTO `ad` (`re_no`, `model`, `make`, `name` , `mileage` , `engine_capacity` , `color` , `seating_capacity` , `cost` , `category` , `availability` , `transmission` , `assembly` , `ad_status` , `owner_id` , `owner_contact_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        //SQL injection prevention here
        //preparing the query
        $stmt = $con->prepare($query);
        //binding the required parameters to values
        $stmt->bind_param("sissiisidsssssii", $registration, $model, $make, $name, $mileage, $engine, $color, $seating, $cost, $category, $availability, $transmission, $assembly, $ad_status, $owner_id, $owner_contact);
        //executing the binded query
        $res = $stmt->execute();

        if ($res) {
            $ad_count = $ad_count + 1;
            $updatequery = "UPDATE customer set ad_count=? where id=?";

            //SQL injection prevention here
            //preparing the query
            $stmt = $con->prepare($updatequery);
            //binding the required parameters to values
            $stmt->bind_param('ii', $ad_count, $cID);
            //executing the binded query
            $res = $stmt->execute();

            header("location:PersonalAdView.php");
        } else {
            echo ' Domain or Foreign Key Error, Please Try Again-- Validation Error ';
        }
    }
} else {
    //header("location:AdPosting.php");
    echo 'directing here';
}



?>