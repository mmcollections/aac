<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Stock</title>
	
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
        
        <script LANGUAGE="JavaScript">
<!--
// Nannette Thacker http://www.shiningstar.net
console.log();
function confirmSubmit(id,table,dreturn)
{ 	     jConfirm('You Want Delete This Purchase ', 'Confirmation Dialog', function (r) {
           if(r){ 
               console.log();
                $.ajax({
  			url: "delete.php",
  			data: { id: id, table:table,return:dreturn},
  			success: function(data) {
    			window.location ='view_purchase.php';
    			
                        jAlert('Product Is Delete', 'POSNIC');
  			}
		});
            }
            return r;
        });
}

function confirmDeleteSubmit()
{
   var flag=0;
  var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++){
    if(field[i].checked ==true){
        flag=flag+1;
        
    }
	
}
if (flag <1) {
  jAlert('You must check one and only one checkbox', 'POSNIC');
return false;
}else{
 jConfirm('You Want Delete Purchase', 'Confirmation Dialog', function (r) {
           if(r){ 
	
document.deletefiles.submit();}
else {
	return false ;
   
}
});
   
}
}
function confirmLimitSubmit()
{
    if(document.getElementById('search_limit').value!=""){

document.limit_go.submit();

    }else{
        return false;
    }
}


function checkAll()
{

	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll()
{
	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
}
// -->
</script>
	
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
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
			
					<div class="content-module-heading cf">
					
						<h3 class="fl" >View Stock Availability</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
		<div class="content-module-main cf" >
			
			<div align="center" class="mytable_row">
				<form name="deletefiles"  method="post">
				Enter Item Name to Check Stock: 
				<select class="round" style="margin-left:10px;" name="searchtxt"><option>SELECT (Item_Name)</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						
				<input  style="margin-left:20px;" class="button round red   text-upper" name="Search" type="submit"  value="Search">
				</form>
			</div>
		<br>
		
		<div class="content-module" id="DIV_ID">
					
			
<?php 

	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
	{
		$srch=$_POST['searchtxt'];
	
		//$sql = "SELECT * FROM  pur_items,pur_logs,pur_total WHERE invoiceno=$srch";SELECT quantity FROM stock_avail WHERE name='".$row['name']."' AND  sku ='".$row['sku']."'
		
		$sql2 = "select quty from pur_items WHERE itemname LIKE '%".$_POST['searchtxt']."%'";
		
	}	
		$result1 = mysql_query($sql1);
			
?>
			
		</div>
	</div>
</div>	
<div>
	<table border=5>
	<tr>
	<td align="right"><b>TOTAL PURCHASE OF [<?php echo $srch;?>]:</b></td><td><?php $pqty = 0+$db->queryUniqueValue("SELECT sum(quty) FROM pur_items WHERE itemname='$srch'"); echo $pqty; ?></td>
	</tr>
	<tr>
	<td align="right"><b>TOTAL SALES OF [<?php echo $srch;?>]:</b></td><td><?php $sqty = 0+$db->queryUniqueValue("SELECT sum(quty) FROM Sales_items WHERE itemname='$srch'"); echo $sqty; ?></td>
	</tr>
	<tr>
	<td align="right"><b>STOCK AVAILABILITY OF [<?php echo $srch;?>]:</b></td><td><?php $bqty=$pqty-$sqty;  echo 0+$bqty; ?></td>
	</tr>
</div>
</body>
</html>

<script language="javascript" type="text/javascript">

</script>