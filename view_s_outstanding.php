<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sales Outstanding</title>
	
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
  
 }
tr{
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
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
			
					<div class="content-module-heading cf">
					
						<h3 class="fl"><blink>View Sales Outstanding</blink></h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
		<div class="content-module-main cf" >
			
			<div align="center" class="mytable_row">
				<form name="deletefiles"  method="post">
				Enter Invoice No to Search:<input class="round" name="searchtxt" type="text"  placeholder="Search" style="margin-left:10px;" > 
				<input class="button round red   text-upper" name="Search" type="submit"  value="Search">
				</form>
			</div>
		<br>
		
		<div class="content-module" id="DIV_ID">
					
			
<?php 

	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
	{
		$srch=$_POST['searchtxt'];
	
		//$sql = "SELECT * FROM  pur_items,pur_logs,pur_total WHERE invoiceno=$srch";SELECT quantity FROM stock_avail WHERE name='".$row['name']."' AND  sku ='".$row['sku']."'
		
		//$sql2 = "select quty from pur_total WHERE itemname LIKE '%".$_POST['searchtxt']."%'";
		
	}	
		$result1 = mysql_query($sql1);
			
?>
			
		</div>
	</div>
</div>	
<div class="">
	<table border=1>
	<tr><td>Sales Amount for Invoice No: <?php echo $srch;?></td><td><?php $pqty = $db->queryUniqueValue("SELECT grandamt FROM sales_total WHERE invoiceno='$srch'"); echo $pqty; ?></td></tr>
	<tr><td>TOTAL Amount Paid for Invoice No:<?php echo $srch;?></td><td>&nbsp;&nbsp;<?php $sqty = $db->queryUniqueValue("SELECT sum(newpayment) FROM sales_payments WHERE invoiceno='$srch'"); echo $sqty; ?></td></tr>
	<tr><td>BALANCE Amount of Invoice No:<?php echo $srch;?></td><td>(<?php $bqty=$pqty-$sqty;  echo $bqty; ?>)</td></tr>
	
	</table>
</div>
</body>
</html>

<script language="javascript" type="text/javascript">

</script>