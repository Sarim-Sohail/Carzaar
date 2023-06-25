<title>User Data List</title>
<?php
$conn = mysqli_connect("localhost","root","","se_project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();
$myid = $_SESSION['id'];

$sql = "SELECT * from customer where id = '$myid'";
$result = $conn->query($sql);

$sqlv = "SELECT * from ad where owner_id='$myid'";
$resultv = $conn->query($sqlv);

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
    <title>Manage Customer Records</title>
</head>
<body class="bg-dark">


</form>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <!-- <form name="DataList" method="post" action="CustomerCreate.html">

                    <input type="submit" name="Submit" id="Submit" value="GENERATE NEW RECEIPT">
                    </p>     -->
                    <table class="table table-bordered">My Info
                            <tr>
                                <td> User ID </td>
                                <td> Password </td>
                                <td> First Name </td>
                                <td> Last Name </td>
                                <td> Age </td>
                                <td> Gender </td>
                                <td> Address </td>
                                <td> Email </td>
                                <td> Contact No</td>
                                <td> Total number of ads</td>
                                <td> Edit Personal Info </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $cID = $row['id'];
                                        $password = $row['password'];
                                        $f_Name = $row['f_name'];
                                        $l_Name = $row['l_name'];
                                        $age = $row['age'];
                                        $gender = $row['gender'];
                                        $Con = $row['contact_no'];
                                        $Address = $row['address'];
                                        $Email = $row['email'];
                                        $Ad_count = $row['ad_count'];
                            ?>
                                    <tr>
                                        <td><?php echo $cID ?></td>
                                        <td>******</td>
                                        <td><?php echo $f_Name ?></td>
                                        <td><?php echo $l_Name ?></td>
                                        <td><?php echo $age ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $Address ?></td>
                                        <td><?php echo $Email ?></td>
                                        <td><?php echo $Con ?></td>
                                        <td><?php echo $Ad_count ?></td>
                                        <td><a href="UserInfoUpdation.php?GetID=<?php echo $cID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <!-- <form name="DataList" method="post" action="CustomerCreate.html">

                    <input type="submit" name="Submit" id="Submit" value="GENERATE NEW RECEIPT">
                    </p>     -->
                    <table class="table table-bordered">My Ads
                            <tr>
                                <td> Ad ID </td>
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
                                <td> Availability</td>
                                <td> Transmission</td>
                                <td> Assembly</td>
                                <td> Status</td>
                                <td> Edit Ad Info</td>
                            </tr>

                            <?php 
                                    
                                    while($rows=mysqli_fetch_assoc($resultv))
                                    {
                                        $ad_id = $rows['ad_id'];
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
                                        $availability = $rows['availability'];
                                        $transmission = $rows['transmission'];
                                        $assembly = $rows['assembly'];
                                        $ad_status = $rows['ad_status'];
                            ?>
                                    <tr>
                                        <td><?php echo $ad_id ?></td>
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
                                        <td><?php echo $availability ?></td>
                                        <td><?php echo $transmission ?></td>
                                        <td><?php echo $assembly ?></td>
                                        <td><?php echo $ad_status ?></td>
                                        <td><a href="UserNewAdUpdation.php?GetID=<?php echo $ad_id ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
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
