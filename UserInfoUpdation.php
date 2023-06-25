<title>User Data Modification</title>
<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

session_start();

$cID = $_GET['cID'];
$fname = '';
$lname = '';
$id = '';
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

$cID = $row['id'];
$fname = $row['f_name'];
$lname = $row['l_name'];
$password = $row['password'];
$age = $row['age'];
$gender = $row['gender'];
$email = $row['email'];
$address = $row['address'];
$con = $row['contact_no'];

?>
<script>
    function validateForm() {
        let x = document.forms["DataForm"]["age"].value;
        if (x <= 18 && x < 99) {
            alert("Age must be greater than or equal to 18 and lower than 99");
            return false;
        }
    }
</script>

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

            <h1 style="text-align:center">EDIT MY INFO</h1>
            <div class="signup-content">
                <div class="signup-img">
                    <!-- <img src="ui-assets/img/signup-bg.png" alt=""> -->


                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" onsubmit="return validateForm()"
                        action="UserActuallyUpdate.php?cID=<?php echo $cID ?>" autocomplete="off">
                        <div class="form-row">
                            <!-- //original form starts here -->
                            <div class="form-group">

                                <div class="form-input">
                                    <label for="f_name" class="required">First name</label>
                                    <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2"
                                        placeholder=" First Name " name="fname" value="<?php echo $fname ?>">
                                </div>
                                <div class="form-input">
                                    <label for="l_name" class="required">Last name</label>
                                    <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2"
                                        placeholder=" Last Name " name="lname" value="<?php echo $lname ?>">
                                </div>
                                <div class="form-input">
                                    <label for="password" class="required">Password</label>
                                    <input
                                        title="Password must contain at least 8 characters, including UPPER/lowercase and numbers"
                                        required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password"
                                        class="form-control mb-2" placeholder=" Password " name="password"
                                        value="<?php echo $password ?>">
                                </div>
                                <div class="form-input">
                                    <label for="age" class="required">Age</label>
                                    <input title="Age must be between 18 and 99" min="18" max="99" required
                                        type="number" class="form-control mb-2" placeholder=" Age " name="age"
                                        value="<?php echo $age ?>">
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="gender" class="required">Gender</label>

                                    </div>
                                    <div class="form-radio-group">
                                        <div class="form-radio-item">
                                            <input type="radio" name="gender" id="male" value="Male" checked
                                                value="Male">
                                            <label for="male">Male</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="gender" id="female" value="Female">
                                            <label for="female">Female</label>
                                            <span class="check"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-input">
                                    <label for="address" class="required">Address</label>
                                    <input required type="text" class="form-control mb-2" placeholder=" Address "
                                        name="address" value="<?php echo $address ?>">
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input required pattern="(\w\.?)+@[\w\.-]+\.\w{2,4}" required type="text"
                                        class="form-control mb-2" placeholder=" Email " name="email"
                                        value="<?php echo $email ?>">
                                </div>
                                <div class="form-input">
                                    <label for="contact_no" class="required">Phone number</label>
                                    <input title="Contact number must be of 11 digits" required pattern=".{11,11}"
                                        required type="tel" class="form-control mb-2" placeholder=" Phone Number "
                                        name="con" value="0<?php echo $con ?>">
                                </div>

                            </div>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="update" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
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