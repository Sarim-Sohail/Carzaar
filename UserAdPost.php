<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="othercss/bootstrap.css" />
    <title>Ad Posting Form</title>
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h3 class="bg-success text-white text-center py-3"> Ad Posting Form </h3>
                    </div>
                    <div class="card-body">

                        <form action="AdActuallyPost.php" method="post">
                            <td>Vehicle Registration Number: </td>
                            <input title="Registration number must be of type ABC-123" required
                                pattern="[A-Z]{3}-[0-9]{3}" required type="text" class="form-control mb-2"
                                placeholder=" Vehicle Registraion Number " name="registration">
                            <td>Model: </td>
                            <input required type="number" max="2022" class="form-control mb-2" placeholder=" Model "
                                name="model">
                            <td>Make: </td>
                            <input required pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                placeholder=" Make " name="make">
                            <td>Name: </td>
                            <input required pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                placeholder=" Name " name="name">
                            <td>Mileage: </td>
                            <input required type="number" class="form-control mb-2" placeholder=" Mileage "
                                name="mileage">
                            <td>Engine Capacity: </td>
                            <input required type="number" class="form-control mb-2" placeholder=" Engine Capacity "
                                name="engine">
                            <td>Color: </td>
                            <input required pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                placeholder=" Color " name="color">
                            <td>Seating Capacity: </td>
                            <input title="Seating capacity must be less than or equal to 7" required type="number"
                                max="7" class="form-control mb-2" placeholder=" Seating Capacity " name="seating">
                            <td>Cost: </td>
                            <input required type="number" class="form-control mb-2" placeholder=" Cost " name="cost">
                            <td>Category: </td>
                            <input required pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                placeholder=" Category " name="category">
                            <td>Transmission: </td>
                            <input required pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                placeholder=" Transmission " name="transmission">
                            <td>Assembly: </td>
                            <input required pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                placeholder=" Assembly " name="assembly">



                            <button class="btn btn-primary" name="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!-- <?php
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
$myid = $_SESSION['id'];

$sql = "SELECT * from customer where id = '$myid'";
$customerresult = $conn->query($sql);
exit($myid)

    ?>

<?php
if ($customerresult) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contact = $row['contact_no'];
        $ad_count = $row['ad_count'];
    }
    echo $contact;
    echo $ad_count;
}
?>

<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['re_no']) || empty($_POST['model']) || empty($_POST['make']) || empty($_POST['name']) || empty($_POST['mileage']) || empty($_POST['engine_capacity']) || empty($_POST['color']) || empty($_POST['seating_capacity']) || empty($_POST['cost'] || empty($_POST['category'])) || empty($_POST['transmission']) || empty($_POST['assembly'])) {
        echo ' Please Fill in the Blanks ';
    } else {
        $registration = $_POST['re_no'];
        $model = $_POST['model'];
        $make = $_POST['make'];
        $name = $_POST['name'];
        $mileage = $_POST['mileage'];
        $engine = $_POST['engine_capacity'];
        $color = $_POST['color'];
        $seating = $_POST['seating_capacity'];
        $cost = $_POST['cost'];
        $category = $_POST['category'];
        $availability = 'Available';
        $transmission = $_POST['transmission'];
        $assembly = $_POST['assembly'];
        $ad_status = 'Pending';
        $owner_id = $myid;
        $owner_contact = $contact;


        $query = "INSERT INTO `ad`(`re_no`, `model`, `make`, `name` , `mileage` , `engine_capacity` , `color` , `seating_capacity` , `cost` , `category` , `availability` , `transmission` , `assembly` , `ad_status` , `owner_id` , `owner_contact_no`) VALUES ('$registration','$model','$make','$name' ,'$mileage' ,'$engine' ,'$color' ,'$seating' ,'$cost' ,'$category' ,'$availability' ,'$transmission' ,'$assembly' ,'$ad_status' ,'$owner_id' ,'$owner_contact_no')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $ad_count = $ad_count + 1;
            $updatequery = "UPDATE customer set ad_count='" . $ad_count . "' where id='" . $myid . "'";
            $newresult = mysqli_Query($con, $query);
            echo 'redirecting here';
            header("location:PersonalAdView.php");
        } else {
            echo ' Domain or Foreign Key Error, Please Try Again-- Validation Error ';
        }
    }
} else {
    //header("location:AdPosting.php");
    echo 'directing here';
}



?> -->