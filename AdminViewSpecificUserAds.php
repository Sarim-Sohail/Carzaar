<title>User Data List</title>
<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$cID = $_GET['cID'];
$query = "SELECT * from ad where owner_id=?";
//SQL injection prevention here
//preparing the query
$stmt = $conn->prepare($query);
//binding the required parameters to values
$stmt->bind_param("i", $cID);
//executing the binded query
$result = $stmt->execute();
//Save the query result
$stmt_result = $stmt->get_result();
?>

<!DOCTYPE html>
<link href="ui-assets/css/table.css" rel="stylesheet">
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Table Style</title>
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>

<body>

    <div class="table-title">
        <h3>User Ads</h3>
    </div>

    <table class="table-fill" style="height: 20px">
        <thead>
            <tr>
                <th class="text-left">Vehicle Registration Number</th>
                <th class="text-left">Model</th>
                <th class="text-left">Make</th>
                <th class="text-left">Name</th>
                <th class="text-left">Mileage</th>
                <th class="text-left">Engine Capacity</th>
                <th class="text-left">Color</th>
                <th class="text-left">Seating Capacity</th>
                <th class="text-left">Cost</th>
                <th class="text-left">Category</th>
                <th class="text-left">Availability</th>
                <th class="text-left">Transmission</th>
                <th class="text-left">Assembly</th>
                <th class="text-left">Status</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($stmt_result)) {
                $ad_id = $row['ad_id'];
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
                $availability = $row['availability'];
                $transmission = $row['transmission'];
                $assembly = $row['assembly'];
            ?>
        </thead>
        <tbody class="table-hover" style="height: 20px">
            <tr>
                <td class="text-left">
                    <?php echo $ad_id ?>
                </td>
                <td class="text-left">
                    <?php echo $registration ?>
                </td>
                <td class="text-left">
                    <?php echo $model ?>
                </td>
                <td class="text-left">
                    <?php echo $make ?>
                </td>
                <td class="text-left">
                    <?php echo $name ?>
                </td>
                <td class="text-left">
                    <?php echo $mileage ?>
                </td>
                <td class="text-left">
                    <?php echo $capacity ?>
                </td>
                <td class="text-left">
                    <?php echo $color ?>
                </td>
                <td class="text-left">
                    <?php echo $seating ?>
                </td>
                <td class="text-left">
                    <?php echo $cost ?>
                </td>
                <td class="text-left">
                    <?php echo $category ?>
                </td>
                <td class="text-left">
                    <?php echo $availability ?>
                </td>
                <td class="text-left">
                    <?php echo $transmission ?>
                </td>
                <td class="text-left">
                    <?php echo $assembly ?>
                </td>
            </tr>
        </tbody>
        <?php
            }
            ?>
    </table>

</body>