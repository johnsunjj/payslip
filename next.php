<?php
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/index1.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<?php
	$totalearnings=$_SESSION["basic"]+$_SESSION["house"]+$_SESSION["conveyance"]+$_SESSION["medical"]+$_SESSION["special"];
	$totaltax=$totalearnings * 14 /100;
	$professionTax=$totaltax * 9.5/100;
	$tds=$totaltax * 56.5/100;
	$pf= $totaltax * 34/100;
    $totaldeduct= $professionTax+ $tds +$pf;
	$netsalary=$totalearnings-$totaldeduct;
?>
<div class="container">
	
	<div class="logo">
<img src="images/logo.png" alt="" class="img-responsive" width="150px" height="130px">
	</div>
	<div class="company">
	<h3><b>Payslip for the month of Jan-2023</b></h3>
		<h4>Financial Period 2022-2023</h4>

	</div>
	<div class="logout"><a href="logout.php" class="btn btn-info btn-primary">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
		
	</div>
	
<div class="table">

<table class="table table-bordered table-responsive">
	<tr align="center" bgcolor="#00B0FF">
		<td colspan="4"><h5><b>Associate Information</b></h5></td>
	</tr>
	<tr align="left">
		<td colspan="4"><h5><?php echo $_SESSION["name"]; ?></h5></td>
	</tr>
<tr>
	<td width="25%">Associate ID</td>
    <td width="25%"><?php echo $_SESSION["id"]; ?></td>
	<td width="25%">Location</td>
    <td width="25%"><?php echo $_SESSION["location"]; ?></td>
</tr>
<tr>
	<td width="25%">Designation</td>
    <td width="25%"><?php echo $_SESSION["designation"]; ?></td>
	<td width="25%">PAN</td>
    <td width="25%"><?php echo $_SESSION["pan"]; ?></td>
</tr>
<tr>
	<td width="25%">Gender</td>
    <td width="25%"><?php echo $_SESSION["gender"]; ?></td>
	<td width="25%">Bank A/c</td>
    <td width="25%"><?php echo $_SESSION["bankac"]; ?></td>
</tr>
<tr>
	<td width="25%">Date of Joining</td>
    <td width="25%"><?php echo $_SESSION["dateofjoin"]; ?></td>
	<td width="25%">ESI Number</td>
    <td width="25%"><?php echo $_SESSION["esinum"]; ?></td>
</tr>
<tr>
	<td width="25%">PF A/C</td>
    <td width="25%"><?php echo $_SESSION["pfac"]; ?></td>
	<td width="25%">Status</td>
    <td width="25%"><?php echo $_SESSION["status"]; ?></td>
</tr>
<tr>
	<td width="25%">UAN</td>
    <td width="25%"><?php echo $_SESSION["uan"]; ?></td>
	<td width="25%">Available Calender Days</td>
    <td width="25%"><?php echo $_SESSION["days"]; ?></td>
</tr>
<tr>
	<td width="25%">SA Policy No.</td>
    <td width="25%"><?php echo $_SESSION["sa_policy"]; ?></td>
	<td width="25%">Paid Days</td>
    <td width="25%"><?php echo $_SESSION["paiddays"]; ?></td>
</tr>
<tr>
	<td width="25%">SA LIC ID</td>
    <td width="25%"><?php echo $_SESSION["sa_lic"]; ?></td>
	<td width="25%">Loss of Pay Days</td>
    <td width="25%"><?php echo $_SESSION["lopdays"]; ?></td>
</tr>
	
</table>
	</div>
	<table class="table table-bordered table-responsive">
		
		<td width="50%"><table class="table table-bordered table-responsive">
	<tr align="center" bgcolor="#00B0FF">
		<td width="70%"><h5><b>Earnings</b></h5></td>
		<td width="30%"><h5><b>Amount</b></h5></td>
	</tr>

<tr>
	<td>Basic salary</td>
    <td align="center"><?php echo $_SESSION["basic"]; ?></td>
	
</tr>
<tr>
	<td>House Rent Allowance</td>
    <td align="center"><?php echo $_SESSION["house"]; ?></td>
	
</tr>
<tr>
	<td>Conveyance Allowance</td>
    <td align="center"><?php echo $_SESSION["conveyance"]; ?></td>
</tr>
<tr>
	<td>Mediacl Allowance</td>
    <td align="center"><?php echo $_SESSION["medical"]; ?></td>
</tr>
<tr>
	<td>Special Allowance</td>
    <td align="center"><?php echo $_SESSION["special"]; ?></td>
</tr>
			<tr><td colspan="2" height="120px"></td></tr>
			<tr>
			<td><b>(A) Total Earnings</b></td>
    <td align="center"><b>&#8377;<?php echo $totalearnings; ?></b></td>
			</tr>
	        </table></td>
		
<td><table class="table table-bordered table-responsive">
	<tr align="center" bgcolor="#00B0FF">
		<td width="70%"><h5><b>Deductions</b></h5></td>
		<td width="30%"><h5><b>Amount</b></h5></td>
	</tr>

<tr>
	<td>Profession Tax</td>
    <td align="center"><?php echo $professionTax; ?></td>
	
</tr>
<tr>
	<td>Provident Fund-Employee Contribution</td>
    <td align="center"><?php echo $pf; ?></td>
	
</tr>
<tr>
	<td>TDS</td>
    <td align="center"><?php echo $tds;  ?></td>
</tr>
<tr>
	<td>Voluntary Provident Fund</td>
    <td align="center">-</td>
</tr>
<tr><td colspan="2" height="160px"></td></tr>
	<tr>
			<td><b>(B) Total Deduction</b></td>
    <td align="center"><b>&#8377;<?php echo $totaldeduct; ?></b></td>
			</tr>
	        </table></td>
		<table class="table table-bordered table-responsive">
		<tr><td align="center" colspan="2" bgcolor="#00B0FF" height="50px"><b> Net Salary = (A) - (B)</b></td>
		<td colspan="2" align="center" bgcolor="#00B0FF"><b>&#8377;<?php echo $netsalary; ?></b></td></tr>
		</table>
		</table>
	
 <br>
	<br>
	

</div>
	
</body>
</html>