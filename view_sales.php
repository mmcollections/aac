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
				<li><a href="add_sales.php" class="active-tab purchase-tab">Add 	sales</a></li>
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
					
						<h3 class="fl" >View Sales</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
		<div class="content-module-main cf" >
			
			<div align="center" class="mytable_row">
				<form name="deletefiles"  method="post">
				<?php 
				if($_GET['msg']!="")
				{
					$max=$_GET['msg'];
				}
				else
				{
					$max1 = $db->maxOfAll("id","sales_logs");
					$max2 = $db->queryUniqueObject("select invoiceno from sales_logs where id=$max1");
					$max = $max2->invoiceno;
				}
				?>
				Enter Invoice Number to Check:<input class="round" name="searchtxt" type="text"  placeholder="Search" style="margin-left:10px;" value="<?php echo $max;?>"> 
				<input class="button round red   text-upper" name="Search" type="submit"  value="Check">
				</form>
			</div>
		<br>
		
		<div class="content-module" id="DIV_ID">
			<table border=1>
				<tr class="trbg">
					<td><u>DATE</u></td>
					<td><u>INVOICE NO</u></td>
					<td><u>CUSTOMER NAME</u></td>
					<td><u>CUSTOMER ADDRESS</u></td>
					<td><u>CONTACT</u></td>
				</tr>
			</table>
			
			
<?php 

	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
	{
		$srch=$_POST['searchtxt'];
	
		//$sql = "SELECT * FROM  pur_items,pur_logs,pur_total WHERE invoiceno=$srch";
		$sql1 = "select * from sales_logs WHERE invoiceno='$srch'";
		$sql2 = "select * from sales_items WHERE invoiceno='$srch'";
		$sql3 = "select * from sales_total WHERE invoiceno='$srch'";
	}
	//else
	//{		
		//$sql = "SELECT * FROM  pur_items,pur_logs,pur_total WHERE invoiceno=$srch";
	//}
		$result1 = mysql_query($sql1);
			
	while($row1 = mysql_fetch_array($result1)) 
		{
?> 				
				<table border=1>	
				<tr>
					<td style="color:blue"> <?php echo $row1['sdate']; ?></td>
					<td style="color:blue"> <?php echo $row1['invoiceno']; ?></td>
					<td style="color:blue"> <?php echo $row1['cusname']; ?></td>
					<td style="color:blue"> <?php echo $row1['cusaddr']; ?></td>
					<td style="color:blue"> <?php echo $row1['cuscont']; ?></td>
					</tr>
				</table>
				
<?php  
} 
?>
			<table border=1>
				<tr class="trbg">
					<td><u>ITEM NO</td>
					<td><u>ITME NAME</td>
					<td><u>QTY</td>
					<td><u>RATE</td>
					<td><u>AMT</td>
				</tr>
			</table>
<?php
	$result2 = mysql_query($sql2);
	while($row2 = mysql_fetch_array($result2)) 
		{	
?>
			<table border=1>	
				<tr>
					<td style="color:blue"> <?php echo $row2['itemno']; ?></td>
					<td style="color:blue"> <?php echo $row2['itemname'];?></td>
					<td style="color:blue"> <?php echo $row2['quty'];?></td>
					<td style="color:blue"> <?php echo $row2['rate'];?></td>
					<td style="color:blue"> <?php echo $row2['amt'];?></td>
				</tr>
			</table>
				
<?php  
} 
?>
			<table border=1>
				<tr class="trbg">
					<td><u>TAXABLE AMT</td>
					<td><u>CGST %</td>
					<td><u>SGST %</td>
					<td><u>GST AMT</td>
					<td><u>GRAND TOTAL</td>
				</tr>
			</table>
<?php			
	$result3 = mysql_query($sql3);
	while($row3 = mysql_fetch_array($result3)) 
		{	
?>
			<table border=1>	
				<tr>
					<td style="color:blue"> <?php echo $row3['taxableamt'];?></td>
					<td style="color:blue"> <?php echo $row3['gst_percentage'];?></td>
					<td style="color:blue"> <?php echo $row3['description'];?></td>
					<td style="color:blue"> <?php echo $row3['gstamt'];?></td>
					<td style="color:blue"> <?php echo $row3['grandamt'];?></td>
				</tr>
				</table>
<?php  
} 
?>
		</div>
	</div>
</div>	
		<div id="footer">
		<form name="deletefiles"  method="post">
			<p>Enter Bill Number to Delete the Row:<input class="round" type="text" name="bno" placeholder="Enter Bill.No" style="margin-left:10px;" />
			<input class="button round red   text-upper" name="dsubmit" type="submit" value="Delete" </P>
		</form>
		</div>
		
</body>
</html>

<?php 
		if(isset($_POST[dsubmit])){
			$bno = $_POST['bno'];
			$db->execute("DELETE FROM sales_logs WHERE invoiceno='$bno'");
			$db->execute("DELETE FROM sales_items WHERE invoiceno='$bno'");
			$db->execute("DELETE FROM sales_total WHERE invoiceno='$bno'");
			}
?>



<script language="javascript" type="text/javascript">



</script>