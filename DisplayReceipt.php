<?php
$conn = mysqli_connect("localhost","root","","se_project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
session_start();
$cID=$_GET['cID'];

$sql = "SELECT * from ad where ad_id='$cID'";
$result = $conn->query($sql);

if(isset($_POST['update']))
{
    $payment = $_POST['purchase'];   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Receipt</title>
</head>
<body class="bg-dark">


</form>
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <table class="table table-bordered">Receipt
                            <tr>
                                <td> Vehicle Registration Number </td>
                                <td> Model </td>
                                <td> Make </td>
                                <td> Name </td>
                                <td> Mileage </td>
                                <td> Engine Capacity </td>
                                <td> Color </td>
                                <td> Seating Capacity </td>
                                <td> Cost</td>
                                <td> Category</td>
                                <td> Transmission</td>
                                <td> Assembly</td>
                                <td> Payment Method</td>
                            </tr>

                            <?php 
                                    
                                    while($rows=mysqli_fetch_assoc($result))
                                    {
                                        $registration = $rows['re_no'];
                                        $model = $rows['model'];
                                        $make = $rows['make'];
                                        $name = $rows['name'];
                                        $mileage = $rows['mileage'];
                                        $capacity = $rows['engine_capacity'];
                                        $color = $rows['color'];
                                        $seating = $rows['seating_capacity'];
                                        $cost = $rows['cost'];
                                        $category = $rows['category'];
                                        $transmission = $rows['transmission'];
                                        $assembly = $rows['assembly'];
                            ?>
                                    <tr>
                                        <td><?php echo $registration ?></td>
                                        <td><?php echo $model ?></td>
                                        <td><?php echo $make ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $mileage ?></td>
                                        <td><?php echo $capacity ?></td>
                                        <td><?php echo $color ?></td>
                                        <td><?php echo $seating ?></td>
                                        <td><?php echo $cost ?></td>
                                        <td><?php echo $category ?></td>
                                        <td><?php echo $transmission ?></td>
                                        <td><?php echo $assembly ?></td>
                                        <td><?php echo $payment ?></td>
                                        <td><a href="user.html">Return to Home Page</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
