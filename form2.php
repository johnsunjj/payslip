<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$basic = $_POST['basic'];
		$house = $_POST['house'];
		$conveyance = $_POST['conveyance'];
		$medical = $_POST['medical'];
		$special = $_POST['special'];
		

		
		if(empty($name)){
			$errMSG = "Please Enter Name.";
		}
		else if(empty($id)){
			$errMSG = "Please Enter Registration ID.";
		}
		else if(empty($basic)){
			$errMSG = "Please Enter Basic Salary";
		}
		else if(empty($house)){
			$errMSG = "Please Enter House Rent Allowance.";
		}
		else if(empty($conveyance)){
			$errMSG = "Please Enter Conveyance Allowance.";
		}
		else if(empty($medical)){
			$errMSG = "Please Enter medical Allowance.";
		}
		else if(empty($special)){
			$errMSG = "Please Enter special Allowance.";
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
$stmt = $DB_con->prepare('INSERT INTO payslip(name, id, basic, house, conveyance, medical, special) VALUES(:uname, :uid, :ubasic, :uhouse,  :uconveyance, :umedical, :uspecial)');
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':uid',$id);
			$stmt->bindParam(':ubasic',$basic);
			$stmt->bindParam(':uhouse',$house);
			$stmt->bindParam(':uconveyance',$conveyance);
			$stmt->bindParam(':umedical',$medical);
			$stmt->bindParam(':uspecial',$special);
			
			
			if($stmt->execute())
			{
				$successMSG = "New Data Succesfully Inserted ...";
				header("refresh:2;login.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="css/index1.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?> 
	
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
		<div class="form-box">
<form method="post" enctype="multipart/form-data" class="form-horizontal">
	

<h4>SIGNIN FORM</h4>
<table class="table table-responsive table-bordered table-striped" >
	<tr>
    	<td><span>Name</span></td>
        <td><input class="form-control" type="text" name="name" value="<?php echo $name; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Associate ID</span></td>
        <td><input class="form-control" type="text" name="id" value="<?php echo $id; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Basic Salary</span></td>
        <td><input class="form-control" type="text" name="basic" value="<?php echo $basic; ?>"></td>
    </tr>
    
 
    
    <tr>
    	<td><span>House Rent Allowance</span></td>
        <td><input class="form-control" type="text" name="house" value="<?php echo $house; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Conveyance Allowance</span></td>
        <td><input class="form-control" type="text" name="conveyance" value="<?php echo $conveyance; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Medical Allowance</span></td>
        <td><input class="form-control" type="text" name="medical" value="<?php echo $medical; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Special Allowance</span></td>
        <td><input class="form-control" type="text" name="special" value="<?php echo $special; ?>"></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary btn-block">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td><td></td>
    </tr>
</table>

</form>
			</div>
</div>
</div>

</body>
</html>