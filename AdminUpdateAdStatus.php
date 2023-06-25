<title>Admin Data Modification</title>
<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

session_start();

$cID = $_GET['GetID'];
$fname = '';
$lname = '';
$id = '';

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
$row = mysqli_fetch_assoc($stmt_result);

$cID = $row['ad_id'];
$stat = $row['ad_status'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="ui-assets/img/brand.png" rel="icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link href="ui-assets/css/signup.css" rel="stylesheet">
</head>

<body>

    <div class="smain">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <!-- <img src="ui-assets/img/signup-bg.png" alt=""> -->
                </div>
                <div class="signup-form">
                    <form method="POST" action="AdStatusActuallyUpdate.php?cID=<?php echo $cID ?>" class="register-form"
                        id="register-form">
                        <div class="form-row">
                            <!-- //original form starts here -->
                            <div class="form-group">

                                <div class="form-input">
                                    <label for="stat" class="required">Status</label>
                                    <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2"
                                        placeholder="Status" name="stat" value="<?php echo $stat ?>">
                                </div>

                            </div>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/smain.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>