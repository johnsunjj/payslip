<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$designation = $_POST['designation'];
		$gender = $_POST['gender'];
		$dateofjoin = $_POST['dateofjoin'];
		$pfac = $_POST['pfac'];
		$uan = $_POST['uan'];
		$sa_policy = $_POST['sa_policy'];
		$sa_lic = $_POST['sa_lic'];
		$location = $_POST['location'];
		$pan = $_POST['pan'];
		$bankac = $_POST['bankac'];
		$esinum = $_POST['esinum'];
		$status = $_POST['status'];
		$days = $_POST['days'];
		$paiddays = $_POST['paiddays'];
		$lopdays = $_POST['lopdays'];
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
		else if(empty($designation)){
			$errMSG = "Please Enter Designation";
		}
		else if(empty($gender)){
			$errMSG = "Please select Gender.";
		}
		else if(empty($dateofjoin)){
			$errMSG = "Please Enter Date of Joining.";
		}
		else if(empty($pfac)){
			$errMSG = "Please Enter PF A/C.";
		}
		else if(empty($uan)){
			$errMSG = "Please Enter UAN.";
		}
		else if(empty($location)){
			$errMSG = "Please Enter Location.";
		}
		else if(empty($pan)){
			$errMSG = "Please Enter PAN Number.";
		}
		else if(empty($bankac)){
			$errMSG = "Please Enter Bank Account number.";
		}
		else if(empty($esinum)){
			$errMSG = "Please Enter ESI Number.";
		}
		else if(empty($status)){
			$errMSG = "Please select status.";
		}
		else if(empty($days)){
			$errMSG = "Please enter available calender days.";
		}
		else if(empty($paiddays)){
			$errMSG = "Please Enter Paid days.";
		}
		else if(empty($lopdays)){
			$errMSG = "Please Enter Loss of Pay days.";
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
$stmt = $DB_con->prepare('INSERT INTO payslip(name, id, designation, gender, dateofjoin, pfac, uan, sa_policy, sa_lic, location, pan, bankac, esinum, status, days, paiddays,lopdays, basic, house, conveyance, medical, special) VALUES(:uname, :uid, :udesignation, :ugender,  :udateofjoin, :upfac, :uuan, :usa_policy, :usa_lic, :ulocation, :upan, :ubankac, :uesinum, :ustatus, :udays, :upaiddays,:ulopdays, :ubasic, :uhouse,  :uconveyance, :umedical, :uspecial)');
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':uid',$id);
			$stmt->bindParam(':udesignation',$designation);
			$stmt->bindParam(':ugender',$gender);
			$stmt->bindParam(':udateofjoin',$dateofjoin);
			$stmt->bindParam(':upfac',$pfac);
			$stmt->bindParam(':uuan',$uan);
			$stmt->bindParam(':usa_policy',$sa_policy);
			$stmt->bindParam(':usa_lic',$sa_lic);
			$stmt->bindParam(':ulocation',$location);
			$stmt->bindParam(':upan',$pan);
			$stmt->bindParam(':ubankac',$bankac);
			$stmt->bindParam(':uesinum',$esinum);
			$stmt->bindParam(':ustatus',$status);
			$stmt->bindParam(':udays',$days);
			$stmt->bindParam(':upaiddays',$paiddays);
			$stmt->bindParam(':ulopdays',$lopdays);
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
	


	<h4 align="center">SIGNIN FORM</h4>
	
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
    	<td><span>Designation</span></td>
        <td><input class="form-control" type="text" name="designation" value="<?php echo $designation; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Gender</span></td> 
        <td><input type="radio" name="gender" value="Male"><span>Male</span>
		<input type="radio" name="gender" value="Female"><span>Female</span>
		</td>
    </tr>
    
    <tr>
    	<td><span>Date of Joining</span></td>
        <td><input class="form-control" type="date" name="dateofjoin" value="<?php echo $dateofjoin; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>PF A/c</span></td>
        <td><input class="form-control" type="text" name="pfac" value="<?php echo $pfac; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>UAN</span></td>
        <td><input class="form-control" type="text" name="uan" value="<?php echo $uan; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>SA Policy No.</span></td>
        <td><input class="form-control" type="text" name="sa_policy" value="<?php echo $sa_policy; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>SA LIC ID</span></td>
        <td><input class="form-control" type="text" name="sa_lic" value="<?php echo $sa_lic; ?>"></td>
    </tr>
	<tr>
    	<td><span>Location</span></td>
        <td><input class="form-control" type="text" name="location" value="<?php echo $location; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>PAN</span></td>
        <td><input class="form-control" type="text" name="pan" value="<?php echo $pan; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Bank A/c</span></td>
        <td><input class="form-control" type="text" name="bankac" value="<?php echo $bankac; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>ESI Number</span></td>
        <td><input class="form-control" type="text" name="esinum" value="<?php echo $esinum; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Status</span></td>	
        <td><input class="form-control" type="text" name="status" value="<?php echo $status; ?>"></td>
    </tr>
   
    <tr>
    	<td><span>Avaiable Calender Days</span></td>
        <td><input class="form-control" type="text" name="days" value="<?php echo $days; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Paid Days</span></td>
        <td><input class="form-control" type="text" name="paiddays" value="<?php echo $paiddays; ?>"></td>
    </tr>
    
    <tr>
    	<td><span>Loss of Pay Days</span></td>
        <td><input class="form-control" type="text" name="lopdays" value="<?php echo $lopdays; ?>"></td>
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
        </td>
    </tr>
</table>

</form>
			</div>
</div>
</div>

</body>
</html>