<title>User Data List</title>
<?php
$conn = mysqli_connect("localhost","root","","se_project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$sql = "SELECT * from customer";
$result = $conn->query($sql);

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
            <h3>Vehicle Advertisement</h3>
        </div>

        <table class="table-fill" style="height: 20px">
            <thead>
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
            <td> Warning</td>
            <td> Remove User </td>
            <td> Warn User </td>
            <td> View User Ads </td>
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
                    $warn = $row['warning'];
            ?>
            <?php
                $hidden_password = preg_replace("|.|","*",$password);
            ?>
            </thead>
            <tbody class="table-hover" style="height: 20px">
                <tr>
                    <td class="text-left"><?php echo $cID ?></td>
                    <td><?php echo $hidden_password ?></td>
                    <td class="text-left"><?php echo $f_Name ?></td>
                    <td class="text-left"><?php echo $l_Name ?></td>
                    <td class="text-left"><?php echo $age ?></td>
                    <td class="text-left"><?php echo $gender ?></td>
                    <td><?php echo $Address ?></td>
                    <td><?php echo $Email ?></td>
                    <td class="text-left"><?php echo $Con ?></td>
                    <td class="text-left"><?php echo $warn ?></td>

                    <td class="text-left"> <a href="AdminRemoveUser.php?cID=<?php echo $cID ?>">Remove</td>
                    <td class="text-left">   <a href="AdminWarnUser.php?cID=<?php echo $cID ?>">Warn</td>
                    <td class="text-left"><a href="AdminViewSpecificUserAds.php?cID=<?php echo $cID ?>">View Ads</td>
                </tr>
            </tbody>
            <?php 
                    }  
            ?>
        </table>

    </body>



















