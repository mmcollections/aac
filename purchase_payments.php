<?php
include_once("init.php");
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Purchase Payment</title>
	
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
                <li><a href="paymentdetails.php" class="dashboard-tab">Payment Details</a></li>
                <li><a href="view_outstanding.php" class="dashboard-tab">View Out Standings</a></li>
				</ul> <!-- end tabs -->
				<!-- Change this image to your own company's logo -->
				<!-- The logo will automatically be resized to 30px height. -->
				<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
		</div> <!-- end full-width -->	
	</div> <!-- end header -->

	<!-- MAIN CONTENT -->
		<div class="content-module-heading cf">
						<h3 class="fl">Purchase Payment</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				</div> <!-- end content-module-heading -->
				<div class="content-module-main cf">
				
				<?php
				if(isset($_POST['Submit'])){
					$invoiceno=mysql_real_escape_string($_POST['invoiceno']);
					$suppname=mysql_real_escape_string($_POST['suppname']);
					$newpayment=mysql_real_escape_string($_POST['new_payment']);
					$mop=mysql_real_escape_string($_POST['mop']);
					$tno=mysql_real_escape_string($_POST['tno']);
					$pay_date=$_POST['date'];
					
					$db->query("INSERT INTO purchase_payments(invoiceno,suppname,newpayment,mop,transno,newdate) values('$invoiceno','$suppname',$newpayment,'$mop','$tno','$pay_date')");
				
				$msg="Added successfully Ref: ". $_POST['invoiceno']."" ;
				header("Location: paymentdetails.php?msg=$msg");
				
				}				
				?>

			<form name="form1" action="" method="post">
	                               
			<table class=""  border="0" cellspacing="" cellpadding="">
            <tr>
				<td align="right">Invoice No:</td>
				<td><input name="invoiceno" type="text"  id="invoiceno" maxlength="200" placeholder="Enter Inovice No" class="round default-width-input"/>
				</td>
			</tr>
            <tr>
				<td align="right">Supplier Name:</td>
				<td><input name="suppname" type="text" id="suppname" maxlength="200" class="round default-width-input" placeholder="Enter Supplier Name"/></td>
            </tr>
			<tr>
				<td align="right">New Payment </td>
				<td><input name="new_payment" id="new_payment" type="text"  maxlength="30" class="round default-width-input" placeholder="Enter Amount to be Paid"/></td>
            </tr>
			<tr>
				<td align="right">Mode of Payment:</td>
				<td><input name="mop" id="mopi" type="text"   maxlength="20" class="round default-width-input" placeholder="Enter MOP"/></td>
            </tr><tr>
				<td align="right">Transaction/UPI/Ref No:</td>
				<td><input name="tno" id="tno" type="text"  maxlength="20" class="round default-width-input" placeholder="Enter Ref No"/></td>
            </tr>
            <tr>
                <td align="right">New Date </td>
				<td><input name="date"  type="text" id="test1" maxlength="20"  class="round default-width-input" value="<?php echo date("Y/m/d"); ?>"/></td>
			</tr>
			<tr>
				<td><input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Save">(Control + S)</td>
                <td align="right"><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> 
                </td>
			</tr>
            </table>
	</form>
				</div> <!-- end content-module-main -->
		

							</body>
</html>

<script>

$(function() {
   
    	$("#suppname").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
        
        $("#suppname").blur(function()
			{
			  $.post('check_supplier_details.php', {sup_name: $(this).val() },
				function(data){
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								if(data.address!=undefined)
								$("#0").focus();
								
							},'json');
			});
});			

</script>