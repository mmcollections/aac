<?php
include_once("init.php");
?>
<?php 
		if(isset($_POST[dsubmit])){
			$bno = $_POST['bno'];
			$db->execute("DELETE FROM purchase_payments WHERE invoiceno='$bno'");
			}
?>
			
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sales Payment</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="js/date_pic/date_input.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	
	<script src="js/script.js"></script>  
    <script src="js/date_pic/jquery.date_input.js"></script>  
    <script src="lib/auto/js/jquery.autocomplete.js "></script>  	
	
	
	<script src="js/script.js"></script> 
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >

		
<style type="text/css">

td{    
  width:100px; 
  height:20px;
  max-width:100px;
  min-width:100px; 
  max-height:100px; 
  min-height:20px;
  **overflow:hidden;** /*(Optional)This might be useful for some overflow contents*/   
}
.trbg {
   background-color: Salmon;
}
</style>	
	
</head>
<body>
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	<!-- HEADER -->
	<div id="header-with-tabs">
		<div class="page-full-width cf">
				<ul id="tabs" class="fl">
                <li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
                <li><a href="sales_payments.php" class="dashboard-tab">Sales Payment </a></li>
                <li><a href="view_s_outstanding.php" class="dashboard-tab">View Sales Out Standings</a></li>
				</ul> <!-- end tabs -->
				<!-- Change this image to your own company's logo -->
				<!-- The logo will automatically be resized to 30px height. -->
				<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
		</div> <!-- end full-width -->	
	</div> <!-- end header -->
		
		<div class="content-module-heading cf">
						<h3 class="fl">Salses Payment Paid Details</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
                                                <div style="margin-top: 15px;margin-left: 150px"></div>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
						</div> <!-- end content-module-heading -->

						<div class="content-module-main cf" >
				
		<div align="center" class="mytable_row">
				<form name="deletefiles"  method="post">
			<p>Enter Invoicel Number to Delete the Row:<input class="round" type="text" name="bno" placeholder="Enter Bill.No" style="margin-left:10px;" />
			<input class="button round red   text-upper" name="dsubmit" type="submit" value="Delete" </P>
		</div>
			<table border=1>
				<tr class="trbg">
					<td><u>Invoice No:</td>
					<td><u>Customer Name:</td>
					<td><u>Amt Paid</td>
					<td><u>Mode</td>
					<td><u>Ref No:</td>
					<td><u>Date:</td>
					
				</tr>
			</table>
				<?php
				$sql1 = "select * from sales_payments order by newdate DESC";
				$result1 = mysql_query($sql1);
			
			while($row1 = mysql_fetch_array($result1)) 
			{
?> 				
				<table border=1>	
				<tr><?php $ino=$row1['invoiceno']; ?>
					<td style="color:blue"> <?php echo $ino?></td>
					<td style="color:blue"> <?php echo $row1['cusname']; ?></td>
					<td style="color:blue"> <?php echo $row1['newpayment']; ?></td>
					<td style="color:blue"> <?php echo $row1['mop']; ?></td>
					<td style="color:blue"> <?php echo $row1['transno']; ?></td>
					<td style="color:blue"> <?php echo $row1['newdate']; ?></td>
				</tr>
				</table>
				
<?php  
} 
?>
</div>
</form>			</body>
</html>
