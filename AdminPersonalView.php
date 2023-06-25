<title>My Data</title>
<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
session_start();

$myusername = $_SESSION['SCNIC'];

$query = "SELECT * from admin_t where id=?";
//SQL injection prevention here
//preparing the query
$stmt = $conn->prepare($query);
//binding the required parameters to values
$stmt->bind_param("i", $myusername);
//executing the binded query
$result = $stmt->execute();
//Save the query result
$stmt_result = $stmt->get_result();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassmorphism</title>
    <link rel="stylesheet" href="css/style12345.css">
</head>

<body>
    <section>
        <div class="container">
            <header>
                <a href="#" class="logo">Admin Info</a>
            </header>
            <div class="content">
                <?php
                while ($row = mysqli_fetch_assoc($stmt_result)) {
                    $id = $row['id'];
                    $f_name = $row['f_name'];
                    $l_name = $row['l_name'];
                    $password = $row['password'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $contact_no = $row['contact_no'];
                ?>
                <?php
                    $hidden_password = preg_replace("|.|", "*", $password);
                ?>
                <h2>
                    <?php echo $f_name ?>
                    <?php echo $l_name ?>
                </h2>
                <p>User ID :
                    <?php echo $id ?>
                </p>
                <p>Password :
                    <?php echo $hidden_password ?>
                </p>
                <!-- <p>Age : <?php echo $age ?></p> -->
                <p>Gender :
                    <?php echo $gender ?>
                </p>
                <!-- <p>Address : <?php echo $Address ?></p> -->
                <p>Email :
                    <?php echo $email ?>
                </p>
                <p>Contact Number :
                    <?php echo $contact_no ?>
                </p>
                <!-- <p>Total Ads : <?php echo $Ad_count ?></p> -->
                <?php
                }
                ?>

                <!-- <a href="PersonalAdView.php?cID=<?php echo $cID ?>">View My Ads</a> -->
                <a href="AdminUpdation.php?GetID=<?php echo $id ?>">Edit My Info</a>
            </div>
            <div class="imgBx">
                <img src="./images/ch5.png" alt="img">
            </div>

        </div>
    </section>
</body>

</html>