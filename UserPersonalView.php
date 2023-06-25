<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

session_start();
$myid = $_SESSION['id'];

$query = "SELECT * from customer where id = ?";
//SQL injection prevention here
//preparing the query
$stmt = $conn->prepare($query);
//binding the required parameters to values
$stmt->bind_param("i", $myid);
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
                <a href="#" class="logo">User Info</a>
            </header>
            <div class="content">
                <?php
                while ($row = mysqli_fetch_assoc($stmt_result)) {
                    $cID = $row['id'];
                    $f_Name = $row['f_name'];
                    $l_Name = $row['l_name'];
                    $age = $row['age'];
                    $gender = $row['gender'];
                    $Con = $row['contact_no'];
                    $Address = $row['address'];
                    $Email = $row['email'];
                    $Ad_count = $row['ad_count'];
                ?>
                <h2>
                    <?php echo $f_Name ?>
                    <?php echo $l_Name ?>
                </h2>
                <p>User ID :
                    <?php echo $cID ?>
                </p>
                <p>Age :
                    <?php echo $age ?>
                </p>
                <p>Gender :
                    <?php echo $gender ?>
                </p>
                <p>Address :
                    <?php echo $Address ?>
                </p>
                <p>Email :
                    <?php echo $Email ?>
                </p>
                <p>Contact Number :
                    <?php echo $Con ?>
                </p>
                <?php
                }
                ?>

                <a href="PersonalAdView.php?cID=<?php echo $cID ?>">View My Ads</a>
                <a href="UserInfoUpdation.php?cID=<?php echo $cID ?>">Edit My Info</a>
            </div>
            <div class="imgBx">
                <img src="./images/ch5.png" alt="img">
            </div>

        </div>
    </section>
</body>

</html>