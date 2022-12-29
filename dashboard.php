<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Dashboard</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	<?php include_once("analyticstracking.php") ?>
	
	
		<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
					
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         <?php $line = $db->queryUniqueObject("SELECT * FROM store_details ");
			$_SESSION['logo']=$line->log; 
			 ?>
            <a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
						

				    	
	<!-- FOOTER -->
	<div id="footer">
	<div id="fb-root"> <ul id="tabs" class="temporary-button-showcase">
								<li><a href="dashboard.php" class="active-tab dashboard-tab">Dashboard</a></li>
								<li><a href="add_items.php" class="payment-tab">Add Items</a></li>		
								<li><a href="add_supplier.php" class=" supplier-tab">Add Supplier</a></li>
								<li><a href="add_purchase.php" class="purchase-tab">Add Purchase</a></li>
								<li><a href="daily_purchase.php" class="purchase-tab">Daily Purchase</a></li>
								<li><a href="add_customer.php" class=" customers-tab">Add Customers</a></li>
								<li><a href="add_sales.php" class="sales-tab">Add Sales</a></li>
								<li><a href="purchase_payments.php" class="payment-tab">Add Purchase Payments</a></li>
								<li><a href="sales_payments.php" class="payment-tab">Add Sales Payments</a></li>	
								<li><a href="view_sales.php" class="sales-tab">View Sales</a></li>
								<li><a href="daily_sales.php" class="sales-tab">Daily Sales</a></li>
								<li><a href="Daily_Sales_Report.php" class="sales-tab">Daily Sales Report</a></li>
								<li><a href="view_purchase.php" class="purchase-tab">View Purchase</a></li>
								<li><a href="view_stock_availability.php" class="report-tab">View Stock</a></li>
							</ul></div>
		
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=286371564842269";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>


		<!--<p>Any Queries email to <a href="mailto:msmmahfuz@gmail.com?subject=Stock%20Management%20System">msmmahfuz@gmail.com</a>.</p>-->
	
	</div> <!-- end footer -->

</body>
</html>