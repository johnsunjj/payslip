<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','john') or die('Unable To connect');
		
        $result = mysqli_query($con,"SELECT * FROM payslip WHERE name='" . $_POST["user_name"] . "' and 	id = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
$_SESSION["name"] = $row['name'];
$_SESSION["id"] = $row['id'];
$_SESSION["designation"] = $row['designation'];
$_SESSION["gender"] = $row['gender'];
$_SESSION["dateofjoin"] = $row['dateofjoin'];
$_SESSION["pfac"] = $row['pfac'];
$_SESSION["uan"] = $row['uan'];
$_SESSION["sa_policy"] = $row['sa_policy'];
$_SESSION["sa_lic"] = $row['sa_lic'];
$_SESSION["location"] = $row['location'];
$_SESSION["pan"] = $row['pan'];
$_SESSION["bankac"] = $row['bankac'];
$_SESSION["esinum"] = $row['esinum'];
$_SESSION["status"] = $row['status'];
$_SESSION["days"] = $row['days'];
$_SESSION["paiddays"] = $row['paiddays'];
$_SESSION["lopdays"] = $row['lopdays'];
			$_SESSION["basic"] = $row['basic'];
$_SESSION["house"] = $row['house'];
$_SESSION["conveyance"] = $row['conveyance'];
$_SESSION["medical"] = $row['medical'];
$_SESSION["special"] = $row['special'];


        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["name"])) {
    header("Location:next.php");
    }
?>
<html>
<head>
<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
		<section>
	   <div class="form-box">
		<div class="form-value">
				<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
			   <h2>Login</h2>
				<div class="inputbox">
					<ion-icon name="mail-outline"></ion-icon>
				    <input type="text" name="user_name" required>
					<label for="">User Name</label>
				</div>
					
					<div class="inputbox">
				<ion-icon name="lock-closed-outline"></ion-icon>
				    <input type="password" name="password" required>
					<label for="">Password</label>
				</div>
			<div class="forget">
				<label for=""> <a href="#">  Forget Password</a></label>
				
				</div>
				<button>Log In</button>
				<div class="register">
				<p>Don't have a account | <a href="form.php">Register</a></p>
				</div>
				
				
			
			</form>
		</div>
		</div>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	
	
	
	
	
	</section>
</body>
</html>