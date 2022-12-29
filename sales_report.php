<?php
include_once("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>AA Collections</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 			<link rel="stylesheet">
	
		
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
	
	.text-upper { text-transform: uppercase; }
	.button 
	{
		padding: 0.833em; /* 10/12 */
		display: inline-block;
		text-decoration: none;
		background-repeat: no-repeat;
	}
	.red
	{
		background-color: #990000;
		color: white;
	}
	.round {
	border-radius: 0.3125em; /* 5/16 */
	-moz-border-radius: 0.3125em; /* 5/16 */
	-webkit-border-radius: 0.3125em; /* 5/16 */
	}
	.mytable_row  { background-color: yellow;
         border-radius:10px; 
        color: ;
        }
				

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column1 {
  float: left;
  padding: 5px;
}
.column2 {
  float: right;
 
  padding: 5px;
}


	</style>	

</head>
<body>
		
<?php 
	$pid = $_GET['id'];
	
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
			<div class="row">
				<div class="column1">
					<?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details "); ?>
					
					<i>From:</i><br/>
					<b style="font-size:30px"><?php echo $line4->name; ?></b><br/>
					<?php echo $line4->address; ?><br/>
					<?php echo $line4->phone; ?><br/>
					<?php echo $line4->place; ?>
				</div>
				<div class="column2">
					<i>To:</i><br/>
					<b style="font-size:30px"><?php echo $row1['cusname']; ?></b><br/>
					<?php echo $row1['cusaddr']; ?><br/>
					<?php echo $row1['cuscont']; ?><br/>
					<?php echo $row1['sdate']; ?><br/>
					 
				</div>
				
				<!--<p align="center">INVOICE_NO : <b><?php echo $row1['invoiceno']; ?></b></p>-->
			</div>				
<?php  
} 
?>
		<br/><br/><br/><br/>
		<div>
			<br/><br/><br/><br/>
			<h2 align="center"><u>TAX INVOICE</u></h2><br/>
				<?php $l = $db->queryUniqueObject("select * from sales_logs WHERE invoiceno='$srch'");?>
			<p align="center">INVOICE_NO : <b><?php echo $l->invoiceno; ?></b></p>
			<table class="mytable_row"  align="center" width="75%" cellspacing="5" cellpadding="5">
				<tr class="trbg">
					<td><u>ITEM NO</td>
					<td width="60%"><u>ITEM NAME</td>
					<td><u>QTY</td>
					<td><u>RATE</td>
					<td><u>AMT</td>
				</tr>
			</table>
		</div>
<?php
	$result2 = mysql_query($sql2);
	while($row2 = mysql_fetch_array($result2)) 
		{	
?>
			<table class="mytable_row"  align="center"width="75%" cellspacing="5" cellpadding="5">	
				<tr>
					<td> <?php echo $row2['itemno']; ?></td>
					<td width="60%"> <?php echo $row2['itemname'];?></td>
					<td> <?php echo $row2['quty'];?></td>
					<td> <?php echo $row2['rate'];?></td>
					<td> <?php echo $row2['amt'];?></td>
				</tr>
			</table>
				
<?php  
} 
?>
			
<?php			
	$result3 = mysql_query($sql3);
	while($row3 = mysql_fetch_array($result3)) 
		{	
?>	
			<br/><br/><br/>
					<table align="center" width="60%">
						<tr><td align="right">TAXABLE AMT:</td><td></td><td align="right"><?php echo $tamt=$row3['taxableamt'];?></td></tr>
						<tr><td align="right">CGST:</td><td align="right">Percent(<?php echo $cgst=$row3['gst_percentage'];?>%)</td><td>&nbspAmt(<?php echo $tamt*$cgst/100;?>)</td></tr>
						<tr><td align="right">SGST:</td><td align="right">Percent(<?php echo $sgst=$row3['description'];?>%)</td><td>&nbspAmt(<?php echo $tamt*$sgst/100;?>)</td></tr>
						<tr><td align="right">GST AMT:</td><td align="right">(+)</td><td align="right"><?php echo round($row3['gstamt']);?></td></tr>
						<tr><td align="right">GRAND TOTAL:</td><td></td><td align="right"><?php echo round($row3['grandamt']);?></td></tr>
					</table>
<?php  
} 
?>
		</div>	
			<br/><br/><br/>
		<div  id="DIV_ID" align="center">
		<form name="deletefiles"  method="post">
			<p>Enter Bill Number to Search:<input class="round" name="searchtxt" type="text"  placeholder="Search" style="margin-left:20px;" value=<?php echo $pid;?> >
            <input class="button round red   text-upper" name="Search" type="submit"  value="Search" style="margin-left:40px;">
			<input class="button round red   text-upper" name="print" id="printButton" type="button" onclick="print_page()"  value="Print" style="margin-left:60px;">
			&nbsp&nbsp&nbsp<u><a href="dashboard.php" class="active-tab purchase-tab">Go Back to Dashboard</a></u></p>
		</form>
		</div>
</body>
</html>

<?php 
		if(isset($_POST[dsubmit])){
			$bno = $_POST['bno'];
			$db->execute("DELETE FROM sales_items WHERE invoiceno='$bno'");
			$db->execute("DELETE FROM sales_logs WHERE invoiceno='$bno'");
			$db->execute("DELETE FROM sales_total WHERE invoiceno='$bno'");
			}
?>

<script type="text/javascript">

function print_page()
{
document.getElementById('DIV_ID').style.visibility="hidden";
window.print();
document.getElementById('DIV_ID').style.visibility="visible";  
}
</script>