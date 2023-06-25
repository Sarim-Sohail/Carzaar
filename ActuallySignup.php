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

            $query = "INSERT INTO `customer`(`f_name`, `l_name`, `password`, `age` , `gender` , `address` , `email` , `contact_no`) VALUES (?,?,?,?,?,?,?,?)";
            
            //SQL injection prevention here
            //preparing the query
            $stmt = $con->prepare($query);
            //binding the required parameters to values
            $stmt->bind_param("sssisssi", $f_name,$l_name,$password,$age,$gender,$address,$email,$contact_no);
            //executing the binded query
            $result = $stmt->execute();

            if($result)
            {
                header("location:newlogin.php");
            }
            else
            {
                //echo ' Domain or Foreign Key Error, Please Try Again-- Validation Error ';
            }
        }
    }
    else
    {
        // header("location:registration_index.php");
        // echo 'directing here';
    }



?>