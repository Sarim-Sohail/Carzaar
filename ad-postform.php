<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

session_start();

$cID = $_SESSION["passcID"];
$_SESSION["lastpasscID"] = $cID;

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
                            <h1 class="title">POST A NEW AD</h1>
                            <form action="AdActuallyPost.php" method="POST">
                                
                                <div class="form-row" autocomplete="off">
                                    <div class="name">VEHICLE REGISTRATION NO.</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" class="input--style-6"
                                                title="Registration number must be of type ABC-123" required
                                                pattern="[A-Z]{3}-[0-9]{3}" required type="text"
                                                class="form-control mb-2" placeholder=" Format: ABC-123 "
                                                name="registration">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">MODEL YEAR</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. 2015 " class="input--style-6" required type="number"
                                                max="2022" class="form-control mb-2" name="model">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">MAKE</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. Toyota " class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="make">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="name">MODEL</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. Corolla " class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="name">MILEAGE</div>
                                    <div class="value">
                                        <div class="value">
                                            <input title="Mileage must be between 0 and 500000" placeholder=" e.g. 70000 kms " autocomplete="off"
                                                class="input--style-6" required type="number" class="form-control mb-2"
                                                name="mileage" min="0" max="500000">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="name">ENGINE CAPACITY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input title="Engine capacity should be between 660cc and 5200cc"
                                                autocomplete="off" placeholder=" e.g. 1300 cc " class="input--style-6" required type="number"
                                                class="form-control mb-2" name="engine" min="660" max="5200">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">COLOR</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. White " class="input--style-6" required type="text"
                                                class="form-control mb-2" name="color">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">SEATING CAPACITY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. 4 " required type="number" class="input--style-6" name="seating">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">OFFERED COST</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. 3200000rs " class="input--style-6" required type="number"
                                                class="form-control mb-2" name="cost">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">CATEGORY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. Sedan " class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="category">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">TRANSMISSION</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. Automatic " class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="transmission">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">ASSEMBLY</div>
                                    <div class="value">
                                        <div class="value">
                                            <input autocomplete="off" placeholder=" e.g. Local " class="input--style-6" required
                                                pattern="[A-Za-z]{3,25}" required type="text" class="form-control mb-2"
                                                name="assembly">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <button class="btn btn--radius-2 btn--white-2" name="submit"
                                        type="submit">POST</button>
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