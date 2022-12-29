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
	height:20px;
	max-width:30px;
	min-width:30px; 
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
				<u><a href="dashboard.php" class="active-tab purchase-tab">Dashboard</a></u></p>

		<div class="row">
				<div align="center">
					<?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details "); ?>
			
					<b style="font-size:30px"><?php echo $line4->name; ?></b><br/>
					<?php echo $line4->address; ?><br/>
					<?php echo $line4->place; ?><br/>
					<?php echo $line4->email; ?><br/>
					<?php echo $line4->web; ?><br/>
					<?php echo $line4->phone; ?>
				</div>
				
				<p align="center"><b>TAX INVOICE</b></p>
				<p align="center">From Date:<input type=text/>&nbsp&nbsp&nbsp&nbsp To Date:<input type="text"/></p>
			</div>	
		<hr/>	
		<div class="content-module-main cf" >
		<br>
		<div class="content-module" align="center">
			<table border=1>
				<tr class="trbg">
					<td width="5%"><u>ID</u></td>
					<td width="15%"><u>DATE</u></td>
					<td width="15%"><u>INVOICE NO</u></td>
					<td width="25%"><u>CUSTOMER NAME</u></td>
					<td width="20%"><u>CONTACT</u></td>
					<td width="20%"><u>GRAND TOTAL</td>
								
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
					<td width="5%" style="color:blue"> <?php echo $row1['id']; ?></td>
					<td width="15%" style="color:blue"> <?php echo $row1['sdate']; ?></td>
					<td width="15%" style="color:blue">
						<a href='sales_report.php?id="<?php echo $ino=$row1['invoiceno']; ?>"'>
						<?php echo $ino=$row1['invoiceno']; ?>
						</a>
					</td>
					<td width="25%" style="color:blue"> <?php echo $row1['cusname']; ?></td>
					<td width="20%" style="color:blue"> <?php echo $row1['cuscont']; ?></td>
					<td width="20%" style="color:blue" align="right"> <?php echo round($db->queryUniqueValue("SELECT grandamt FROM sales_total WHERE invoiceno='$ino'"));?></td>
					<?php $gamt+=$db->queryUniqueValue("SELECT grandamt FROM sales_total WHERE invoiceno='$ino'");?>
				</tr>
				</table>
					
				
<?php  
} 
?>
<br/><br/>	
	<div align="center" class="mytable_row">
			<form>
					Total Sales:<input class="round" name="searchtxt" type="text"  placeholder="" style="margin-left:10px;" value="= <?php echo round($gamt);?>"> 
			</form>
			</div>
		</div>
	</div>	
	<br/>
	<br/>
		<div id="DIV_ID">
				<form name="deletefiles"  method="post">
				<?php $max = $db->maxOfAll("invoiceno","sales_logs");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Enter Date to View Sales:<input class="round" name="searchtxt" type="text"  placeholder="Search" style="margin-left:10px;" value="<?php echo date('d-m-Y');?>"> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				FROM:<input class="round" name="from" type="text"  placeholder="Enter From ID No" style="margin-left:10px;" class="text-upper"> 
				TO:<input class="round" name="to" type="text"  placeholder="Enter To ID No" style="margin-left:10px;"> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="button round red   text-upper" name="Search" type="submit" value="Check">
				<input class="button round red   text-upper" name="print" id="printButton" type="button" onclick="print_page()"  value="Print" style="margin-left:60px;">
				</form>
		</div>
				
</body>
</html>
<script type="text/javascript">
function print_page()
{
document.getElementById('DIV_ID').style.visibility="hidden";
window.print();
document.getElementById('DIV_ID').style.visibility="visible";  
}
</script>