<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="othercss/bootstrap.css"/>
    <title>Registration Form</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> User Registration Form </h3>
                        </div>
                        <div class="card-body">

                            <form action="registration.php" method="post">
                            <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2" placeholder=" f_name "  name="f_name" >
                                <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2" placeholder=" l_name " name="l_name" >
                                <input title="Password must contain at least 8 characters, including UPPER/lowercase and numbers" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="text" class="form-control mb-2" placeholder=" password " name="password" >
                                <input title="Age must be between 18 and 99" min="18" max="99" required type="number" class="form-control mb-2" placeholder=" age " name="age" >
                                <td>Gender: </td> 
                                <input checked type="radio" name="gender" value="Male">
                                <label for="Male">Male</label>
                                <input type="radio"  name="gender" value="Female">
                                <label for="Female">Female</label><br></br>
                                <input required type="text" class="form-control mb-2" placeholder=" address " name="address" >
                                <input required pattern="(\w\.?)+@[\w\.-]+\.\w{2,4}" type="text" class="form-control mb-2" placeholder=" email " name="email" >
                                <input title="Contact number must be of 11 digits" required pattern = ".{11,11}" required type="tel" class="form-control mb-2" placeholder=" contact_no " name="contact_no">
                                
                                
                                
                                <button class="btn btn-primary" name="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>


<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'se_project');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<?php

    if(isset($_POST['submit']))
    {
        if(empty($_POST['f_name']) || empty($_POST['l_name']) || empty($_POST['address']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['password']) || empty($_POST['contact_no']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {  
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $contact_no = $_POST['contact_no'];

            $query = "INSERT INTO `customer`(`f_name`, `l_name`, `password`, `age` , `gender` , `address` , `email` , `contact_no`) VALUES ('$f_name','$l_name','$password','$age' ,'$gender' ,'$address' ,'$email' ,'$contact_no')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:login.php");
            }
            else
            {
                echo ' Domain or Foreign Key Error, Please Try Again-- Validation Error ';
            }
        }
    }
    else
    {
        header("location:registration_index.php");
        echo 'directing here';
    }



?>