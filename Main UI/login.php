<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/staffstyle.css">
	</head>

	<body> 
		<div class="wrapper">		
            <img src="image/coolcar (2).jpg" width="1450">
			<div class="form-inner">
                <?php
                if(isset($msg)){
                    foreach($msg as $err){
                        echo $err."<br>";
                    }
                }
                ?>
				<form method="post" action="login.php">
					<div class="form-header">
						<h3>Staff Login</h3>
						<img src="image/sign-up.png" alt="" class="sign-up-icon">
					</div>
					<div class="form-group">
						<label for="">Staff CNIC:</label>
						<input  required pattern="[0-9A-Za-z]{1,}" type="tel" class="form-control" type="text" name="txtUser" id="txtUser"> <!--required pattern = "[1-9]{1}[0-9]{12}" -->
					</div>
					<div class="form-group" >
						<label for="">Password:</label>
						<input title="Incorrect Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="25" type="password" class="form-control" name="txtPass" id="txtPass"> <!--required pattern="[0-9A-Za-z]{5,10}" -->
					</div>
					<button>Log In</button>
				</form>
			</div>
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<title>Login Verification</title>
<?php

session_start();


    $data=$_POST;
    // if (empty($data['txtUser']) || empty($data['txtPass']))
    // {
    //     header("Location: Staff.html");
    //     die('Please fill all required fields');
        
    // }

    $servername = "localhost";
    $username="root";
    $password ="";
    $dbname="se_project";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn -> connect_error) 
    {
        die("connection failed:".$conn->connect_error);
    }

    if (isset($_POST['txtUser']) && isset($_POST['txtPass'])) 
    {
        $myusername = $_POST['txtUser'];
        $mypassword = $_POST['txtPass'];
        
        //$mystaffID=$myusername;
        $sqlex="SELECT * FROM admin_t where id='$myusername' AND `password`='$mypassword' ";
        $sqlm = "SELECT * FROM customer where id='$myusername' AND `password`='$mypassword' ";

        // $result = $conn->query($sql);
        $resultm = $conn->query($sqlm);
        $resultex = $conn->query($sqlex);

        // if($result == FALSE) 
        // { 
        //     die("Query error");
        // }
        if($resultm == FALSE)
        {
            
            die("Query error Admin");
        }

        if ($resultm->num_rows>0)
        {
            $_SESSION["SCNIC"]=$myusername;
            echo "User Valid";
            header("Location: StaffAccess.html");
        }
        else if ($resultex->num_rows>0)
        {
            $_SESSION["SCNIC"]=$myusername;
            echo "Admin Valid";
            header("Location: AdminAccess.html");
        }
        // else if ($result->num_rows>0)
        // {
        //     echo "Invalid Login Credentials";
        // }
        else
        {
            // header("Location: DealerAccess.html");
            echo " Invalid Username or Password";
            // echo "Username/Password does not exist.";
        }
    }
?>

