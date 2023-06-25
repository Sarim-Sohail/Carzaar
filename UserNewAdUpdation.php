<title>Ad Data Modification</title>
<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

session_start();

$cID = $_GET['GetID'];
$query = "Select * from ad where ad_id=?";
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

$registration = $row['re_no'];
$model = $row['model'];
$make = $row['make'];
$name = $row['name'];
$mileage = $row['mileage'];
$capacity = $row['engine_capacity'];
$color = $row['color'];
$seating = $row['seating_capacity'];
$cost = $row['cost'];
$category = $row['category'];
$transmission = $row['transmission'];
$assembly = $row['assembly'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>New Ad</title>
    <link href="ui-assets/img/brand.png" rel="icon">
    <!-- Font special for pages-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> -->

    <!-- Main CSS-->
    <link href="assets/css/ad-postform.css" rel="stylesheet">
</head>

<body>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a <h1 class="logo" style="color: white;"> <img src="assets/img/brand.png" href="index.html"> CarZaar</h1>
                </a>
            <div class="page-wrapper bg-dark p-t-100 p-b-50">


                <div class="wrapper wrapper--w900">
                    <div class="card card-6">
                        <div class="card-body">
                            <h1 class="title">EDIT AD INFO</h1>
                            <form action="AdActuallyUpdate.php?cID=<?php echo $cID ?>" method="POST">
                                <div class="form-row" autocomplete="off">
                                    <div class="name">VEHICLE REGISTRATION NO.</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6"
                                                title="Registration number must be of type ABC-123" required
                                                pattern="[A-Z]{3}-[0-9]{3}" required type="text"
                                                class="form-control mb-2" placeholder=" Format: ABC-123 "
                                                name="registration" value="<?php echo $registration ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">MODEL YEAR</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required type="number"
                                                max="2022" class="form-control mb-2" name="model"
                                                value="<?php echo $model ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">MAKE</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required type="text"
                                                class="form-control mb-2" name="make" value="<?php echo $make ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="name">MODEL</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required type="text"
                                                class="form-control mb-2" name="name" value="<?php echo $name ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="name">MILEAGE</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required type="number"
                                                class="form-control mb-2" name="mileage" min="0" max="500000"
                                                value="<?php echo $mileage ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">ENGINE CAPACITY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input title="Engine capacity should be between 660cc and 5200cc"
                                                autocomplete="off" class="input--style-6" required type="number"
                                                class="form-control mb-2" name="capacity" min="660" max="5200"
                                                value="<?php echo $capacity ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">COLOR</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required type="text"
                                                class="form-control mb-2" name="color" value="<?php echo $color ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">SEATING CAPACITY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" name="seating"
                                                value="<?php echo $seating ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">OFFERED COST</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required type="number"
                                                class="form-control mb-2" name="cost" value="<?php echo $cost ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">CATEGORY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="category" value="<?php echo $category ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">TRANSMISSION</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="transmission" value="<?php echo $transmission ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">ASSEMBLY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="assembly" value="<?php echo $assembly ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <button class="btn btn--radius-2 btn--white-2" type="submit" name="update"
                                        text-align="center">POST</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->