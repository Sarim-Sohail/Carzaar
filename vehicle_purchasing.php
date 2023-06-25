<title>Payment Methods</title>
<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

session_start();

$cID = $_GET['Purchase']; //Getting Ad_ID from AllAdsView
$availability = 'Purchased';

$query = "UPDATE `ad` set `availability`=? where `ad_id`=?";

//SQL injection prevention here
//preparing the query
$stmt = $conn->prepare($query);
//binding the required parameters to values
$stmt->bind_param("si", $availability, $cID);
//executing the binded query
$result = $stmt->execute();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link href="ui-assets/img/brand.png" rel="icon">
    <link href="css/vehiclepurchase.css" rel="stylesheet">

    <title>Payment Method</title>

</head>

<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h3 class="bg-success text-white text-center py-3">Choose Payment Method</h3>
                    </div>
                    <div class="card-body">

                        <form name="DataForm" action="invoice.php?cID=<?php echo $cID ?>" method="post">
                            <td>Payment Methods: </td><br></br>
                            <input checked type="radio" name="purchase" value="Cash">
                            <label for="Cash">Cash
                                <?php $met = "Cash" ?>
                            </label><br></br>
                            <?php
                            $_SESSION["met"] = $met;
                            ?>
                            <input type="radio" name="purchase" value="Bank Transfer">
                            <label for="Bank Transfer">Bank Transfer
                                <?php $met = "Bank Transfer" ?>
                                <?php
                                $_SESSION["met"] = $met;
                                ?>
                            </label><br></br>
                            <input type="radio" name="purchase" value="EasyPaisa Installments">
                            <?php
                            $_SESSION["met"] = $met;
                            ?>
                            <label for="EasyPaisa Installments">EasyPaisa Installments
                                <?php $met = "EasyPaisa Installments" ?>
                            </label><br></br>
                            <button class="btn btn-primary" name="update">Purchase</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>