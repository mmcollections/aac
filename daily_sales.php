<?php
include_once("init.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Daily Sales</title>
	
	<!-- Stylesheets -->
	<!--<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>-->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
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
				<li><a href="add_sales.php" class="active-tab purchase-tab">Add sales</a></li>
				<li><u><a href="sales_report.php" class="active-tab purchase-tab">Sales Report</a></u></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
			
					<div class="content-module-heading cf">
					
						<h3 class="fl" >View Daily Sales</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
		<div class="content-module-main cf" >
			
			<div align="center" class="mytable_row">
				<form name="deletefiles"  method="post">
				<?php $max = $db->maxOfAll("invoiceno","sales_logs");?>
				Enter Date to View Sales:<input class="round" name="searchtxt" type="text"  placeholder="Search" style="margin-left:10px;" value="<?php echo date('d-m-Y');?>"> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="button round red   text-upper" name="Search" type="submit" value="     Check">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				FROM:<input class="round" name="from" type="text"  placeholder="Enter From ID No" style="margin-left:10px;" class="text-upper"> 
				TO:<input class="round" name="to" type="text"  placeholder="Enter To ID No" style="margin-left:10px;"> 
				</form>
			</div>
		<br>
		
		<div class="content-module" id="DIV_ID">
			<table border=1>
				<tr class="trbg">
					<td><u>ID</u></td>
					<td><u>DATE</u></td>
					<td><u>INVOICE NO</u></td>
					<td><u>CUSTOMER NAME</u></td>
					<td><u>CONTACT</u></td>
					<td><u>GRAND TOTAL</td>
								
				</tr>
			</table>
			
			
<?php 

	if(isset($_POST['Search']) )
	{
		if(trim($_POST['searchtxt'])!="")
		{
		$srch=$_POST['searchtxt'];
		$sql1 = "select * from sales_logs WHERE sdate='$srch'";
		}
		if(trim($_POST['searchtxt'])=="0")
		{
		$sql1 = "select * from sales_logs";
		}
		if($_POST['from']!="" AND $_POST['to']!="")
		{
		$from=$_POST['from'];
		$to=$_POST['to'];
		$from_date = date('d-m-Y',strtotime($from));
		$to_date = date('d-m-Y',strtotime($to));
		
			$sql1="select * from  sales_logs where id between '$from' and '$to' order by id asc ";
		}
	}
		$result1 = mysql_query($sql1);
			
	while($row1 = mysql_fetch_array($result1)) 
		{
?> 				
				<table border=1>	
				<tr>
					<td style="color:blue"> <?php echo $row1['id']; ?></td>
					<td style="color:blue"> <?php echo $row1['sdate']; ?></td>
					<td style="color:blue">
						<a href='sales_report.php?id="<?php echo $ino=$row1['invoiceno']; ?>"'>
						<?php echo $ino=$row1['invoiceno']; ?>
						</a>
					</td>
					<td style="color:blue"> <?php echo $row1['cusname']; ?></td>
					<td style="color:blue"> <?php echo $row1['cuscont']; ?></td>
					<td style="color:blue"> <?php echo $db->queryUniqueValue("SELECT grandamt FROM sales_total WHERE invoiceno='$ino'");?></td>
					<?php $gamt+=$db->queryUniqueValue("SELECT grandamt FROM sales_total WHERE invoiceno='$ino'");?>
				</tr>
				</table>
					
				
<?php  
} 
?>
			<div align="center" class="mytable_row">
			<form>
					Total Sales:<input class="round" name="searchtxt" type="text"  placeholder="" style="margin-left:10px;" value="<?php echo $gamt;?>"> 
			</form>
			</div>
		</div>
	</div>
</div>	
				
</body>
</html>

