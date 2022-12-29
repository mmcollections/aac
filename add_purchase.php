<?php
include_once("init.php");
	if(isset($_POST['Submit']))
						{
							$username = $_SESSION['username'];
                            
							//first column                
							$invoiceno =mysql_real_escape_string($_POST['invoiceno']);
                            $pdate=$_POST['date'];
							$supplier=mysql_real_escape_string($_POST['supplier']);
							$address=mysql_real_escape_string($_POST['address']);
							$contact=mysql_real_escape_string($_POST['contact']);
							
							$db->query("insert into pur_logs(invoiceno,pdate,suppname,suppaddr,suppcont)values('$invoiceno','$pdate','$supplier','$address','$contact')");

							//second column
							if($_POST["sku1"]!="" && $_POST["item1"]!="" && $_POST["quty1"]!="" && $_POST["cost1"]!="" && $_POST["total1"]!="")
							{
                            $sku1=$_POST["sku1"];                         
                            $itemname1=$_POST["item1"];
							echo $itemname1;
							$quty1=$_POST["quty1"];
							$rate1=$_POST["cost1"];
							$amt1=$_POST["total1"];
							$db->query("insert into pur_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku1','$itemname1','$quty1','$rate1','$amt1')");
							}
							if($_POST["sku2"]!="" && $_POST["item2"]!="" && $_POST["quty2"]!="" && $_POST["cost2"]!="" && $_POST["total2"]!="")
							{
							$sku2=$_POST["sku2"];                         
                            $itemname2=$_POST["item2"];
							$quty2=$_POST["quty2"];
							$rate2=$_POST["cost2"];
							$amt2=$_POST["total2"];
							$db->query("insert into pur_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku2','$itemname2','$quty2','$rate2','$amt2')");
							}
							if($_POST["sku3"]!="" && $_POST["item3"]!="" && $_POST["quty3"]!="" && $_POST["cost3"]!="" && $_POST["total3"]!="")
							{
							$sku3=$_POST["sku3"];                         
                            $itemname3=$_POST["item3"];
							$quty3=$_POST["quty3"];
							$rate3=$_POST["cost3"];
							$amt3=$_POST["total3"];
							$db->query("insert into pur_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku3','$itemname3','$quty3','$rate3','$amt3')");
							}													
							if($_POST["sku4"]!="" && $_POST["item4"]!="" && $_POST["quty4"]!="" && $_POST["cost4"]!="" && $_POST["total4"]!="")
							{
							$sku4=$_POST["sku4"];                         
                            $itemname4=$_POST["item4"];
							$quty4=$_POST["quty4"];
							$rate4=$_POST["cost4"];
							$amt4=$_POST["total4"];
							$db->query("insert into pur_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku4','$itemname4','$quty4','$rate4','$amt4')");
							}
							if($_POST["sku5"]!="" && $_POST["item5"]!="" && $_POST["quty5"]!="" && $_POST["cost5"]!="" && $_POST["total5"]!="")
							{
							$sku5=$_POST["sku5"];                         
                            $itemname5=$_POST["item5"];
							$quty5=$_POST["quty5"];
							$rate5=$_POST["cost5"];
							$amt5=$_POST["total5"];
							$db->query("insert into pur_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku5','$itemname5','$quty5','$rate5','$amt5')");
							}

							//third column
							$taxoble=$_POST['taxoble'];
							$gst=mysql_real_escape_string($_POST['gst']);
							$gstamt=mysql_real_escape_string($_POST['gstamt']);
							$main_total=mysql_real_escape_string($_POST['main_total']);
							$description=mysql_real_escape_string($_POST['description']);

							$db->query("insert into pur_total(invoiceno,taxableamt,gst_percentage,gstamt,grandamt,description)values('$invoiceno','$taxoble','$gst','$gstamt','$main_total','$description')");
							       
							//$db->execute("UPDATE stock_avail SET quantity=$amount1 WHERE sku='$sku[$i]'");
								  	
							$msg="Purchase order Added successfully Ref: ". $_POST['invoiceno']."" ;
							header("Location: view_purchase.php?msg=$msg");
			                
						}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Add Purchase</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 </head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<?php include_once("dist/bootstrap.php"); ?>
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
							<li><a href="dashboard.php" class="active-tab dashboard-tab">Dashboard</a></li>
								<li></li>
								<li><a href="view_purchase.php" class="active-tab purchase-tab"><u>View Purchase</u></a></li>
								<li><u><a href="purchase_report.php" class="active-tab purchase-tab">Purchase Report</a></u></li>

			</ul><!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
					<?php
					//Gump is libarary for Validatoin
                                         if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'AAC');
			
</script>
                                                        <?php
                                         }
				
				?>
				
				<form name="form1" method="post" id="form1" action="">
                                    <input type="hidden" id="posnic_total" >
                                    <input type="hidden" id="roll_no" value="1" >
            <div class="mytable_row " align="center">
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><span class="man">*</span>Invoice No:
					  <input name="invoiceno" placeholder="ENTER BILL NO" type="text" id="bill_no" maxlength="200"  class="round default-width-input" style="width:120px " /></td>
					  <td>Date:<input  name="date" id="test1" placeholder="" value="<?php echo date('d-m-Y');?>" type="text" id="name" maxlength="200"  class="round default-width-input"  /></td>
                      <td><span class="man">*</span>Supplier:<input name="supplier" placeholder="ENTER SUPPLIER" type="text" id="supplier"  maxlength="200"  class="round default-width-input"  style="width:130px " /></td>
                      <td>Address:<input name="address" placeholder="ENTER ADDRESS" type="text" id="address" maxlength="200"  class="round default-width-input"  /></td>
                      <td>Contact:<input name="contact" placeholder="ENTER CONTACT" type="text" id="contact1" maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" style="width:120px " /></td>
                    </tr>
                  </table>
            </div>
			<br>
                <div class="mytable_row " align="center">
                  <input type="hidden" id="guid">
                  <input type="hidden" id="edit_guid">
                  <table class="form" >
                     
					 <tr>
						<td>SI_No:</td>
                        <td>Item_Name:</td>
                        <td>Quantity:</td>
                        <td>Rate:</td>
                        <td>Amount:</td>
                       </tr>
                      					  
					   <tr>
						<td><input name="sku1"  type="text" id="sku1"  maxlength="200"  class="round default-width-input " style="width: 30px"  value="1" readonly="readonly"/></td>				
						<td><select name="item1"><option>SELECT (Item_Name)</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>
                        <td><input name="quty1"  type="text" id="quty1"  maxlength="200"   class="round default-width-input my_with" /></td>
                        <td><input name="cost1"  type="text" id="cost1"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total1"  type="text" id="total1" maxlength="200"  class="round default-width-input " style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  <tr></tr>
					  <tr>
						<td><input name="sku2"  type="text" id="sku2" maxlength="200"  class="round default-width-input " style="width: 30px"  value="2" readonly="readonly"/></td>										
						<td><select name="item2"><option>SELECT (Item_Name)</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>
                        <td><input name="quty2"  type="text" id="quty2"  maxlength="200"   class="round default-width-input my_with"     /></td>
                        <td><input name="cost2"  type="text" id="cost2"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total2"  type="text" id="total2" maxlength="200"  class="round default-width-input " style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  <tr></tr>
					  <tr>
						<td><input name="sku3"  type="text" id="sku3"  maxlength="200"  class="round default-width-input " style="width: 30px"  value="3" readonly="readonly"/></td>				
						<td><select name="item3"><option>SELECT (Item_Name)</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>
                        <td><input name="quty3"  type="text" id="quty3"  maxlength="200"   class="round default-width-input my_with"     /></td>
                        <td><input name="cost3"  type="text" id="cost3"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total3"  type="text" id="total3" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  <tr></tr>
					  <tr>
						<td><input name="sku4"  type="text" id="sku4"  maxlength="200"  class="round default-width-input " style="width: 30px"  value="4" readonly="readonly"/></td>				
						<td><select name="item4"><option>SELECT (Item_Name)</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                        <td><input name="quty4"  type="text" id="quty4"  maxlength="200"   class="round default-width-input my_with"     /></td>
                        <td><input name="cost4"  type="text" id="cost4"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total4"  type="text" id="total4" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  <tr></tr>
					  <tr>
						<td><input name="sku5"	 type="text" id="sku5"   maxlength="200"  class="round default-width-input " style="width:30px" align=""  value="5" readonly="readonly"/></td>				
						<td><select name="item5"><option>SELECT (Item_Name)</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                        <td><input name="quty5"  type="text" id="quty5"  maxlength="200"   class="round default-width-input my_with"/></td>
                        <td><input name="cost5"  type="text" id="cost5"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total5" type="text" id="total5" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
                  </table>     	
                 </div >
				 <br>
				 <div class="mytable_row " align="center">
					  <table>
                      <tr><td>Taxable Amount:</td>
					  <td><input type="text"  class="round" onclick="taxable()" name="taxoble" id="taxoble" readonly="readonly"></td>
					  <td>GST:</td><td><input type="text" class="round" id="gst" name="gst" style="width: 50px" onkeyup="igst();mgt()">&nbsp%</td>
					  <td><input type="text"  class="round" id="gstamt" name="gstamt" readonly="readonly" ></td>
                      <td>Grand Total:</td>
					  <td>
                      <input type="text" id="main_total" name="main_total" class="round" onclick="mgt()" style="width:120px" readonly="readonly" >
                      </td>
					  <td>Description:</td>
					  <td><textarea class="round" name="description"></textarea></td>
					  </tr>
					  <tr><td></td><td></td><td></td><td></td>
                      <td><input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="SAVE"></td>
					  <td><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
					  </tr>
					  </table>	
                 </div>
                </form>						
		</body>
</html>


<script type="text/javascript">

function ta(){
                  
        document.getElementById('total1').value=document.getElementById('cost1').value * document.getElementById('quty1').value
        document.getElementById('total2').value=document.getElementById('cost2').value * document.getElementById('quty2').value
        document.getElementById('total3').value=document.getElementById('cost3').value * document.getElementById('quty3').value
        document.getElementById('total4').value=document.getElementById('cost4').value * document.getElementById('quty4').value
        document.getElementById('total5').value=document.getElementById('cost5').value * document.getElementById('quty5').value

}
function taxable(){
	
    var ta1 = parseFloat(document.getElementById('total1').value) || 0;
    var ta2 = parseFloat(document.getElementById('total2').value) || 0;
    var ta3 = parseFloat(document.getElementById('total3').value) || 0;
    var ta4 = parseFloat(document.getElementById('total4').value) || 0;
    var ta5 = parseFloat(document.getElementById('total5').value) || 0;

    document.getElementById('taxoble').value= ta1+ta2+ta3+ta4+ta5;
}
function igst()
{
	document.getElementById('gstamt').value=document.getElementById('taxoble').value * document.getElementById('gst').value/100;
}
function mgt()
{
			var mt1 = parseFloat(document.getElementById('taxoble').value);
			var mt2 = parseFloat(document.getElementById('gstamt').value); 
			var mt3 = mt1+mt2;
	
	        document.getElementById('main_total').value = mt3;

}


$(function() {
   
    	$("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
        
        $("#supplier").blur(function()
			{
			  $.post('check_supplier_details.php', {sup_name: $(this).val() },
				function(data){
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								if(data.address!=undefined)
								$("#0").focus();
								
							}, 'json');
			});
});			
</script>