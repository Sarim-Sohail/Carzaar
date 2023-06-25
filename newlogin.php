<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="ui-assets/img/brand.png" rel="icon">

    <link href="ui-assets/css/loginstyle.css" rel="stylesheet">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>We are CARZAAR!</h1>
                <h2>Dream Big. Drive Big.</h2>
            </div>
        </div>

        <form method="post" action="newlogin.php" autocomplete="off">
            <div class="right">
                <h5>Explore.</h5>
                <p>Don't have an account? <a href="newsignup.php">Sign up here</a> now!</p>
                <div class="form-group">
                    <input autocomplete="false" required type="number" class="form-control" name="txtUser" id="txtUser">
                    <br>
                </div>
                <div class="form-group">
                    <input autocomplete="false" title="Incorrect Password" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="25" type="password"
                        placeholder="Enter password here" class="form-control" name="txtPass" id="txtPass">
                </div>

                <br><br>
                <br>
                <button>Login</button>
            </div>
        </form>

    </div>
    <!-- partial -->

</body>
<script type="text/javascript">

    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
        window.history.go(1);
    };

</script>

</html>

<title>Login Verification</title>

<?php



session_start();


$data = $_POST;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "se_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}

if (isset($_POST['txtUser']) && isset($_POST['txtPass'])) {

    $myusername = $_POST['txtUser'];
    $mypassword = $_POST['txtPass'];

    //SQL injection prevention here
    $sanitized_userid = mysqli_real_escape_string($conn, $myusername);
    $sanitized_password = mysqli_real_escape_string($conn, $mypassword);

    $sqlex = "SELECT * FROM admin_t where id='$sanitized_userid' AND `password`='$sanitized_password' ";
    $sqlm = "SELECT * FROM customer where id='$sanitized_userid' AND `password`='$sanitized_password' ";

    $resultm = $conn->query($sqlm);
    $resultex = $conn->query($sqlex);

    if ($resultm == FALSE) {
        die("Query error Admin");
    }

    if ($resultm->num_rows > 0) {
        $_SESSION["id"] = $sanitized_userid;
        echo "User Valid";
        header("Location: user.php");
    } 
    else if ($resultex->num_rows > 0) {
        $_SESSION["SCNIC"] = $sanitized_userid;
        echo "Admin Valid";
        header("Location: admin.html");
    } else {
        echo " Invalid Username or Password";
    }
}
?>