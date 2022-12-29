<?php
include_once("init.php");
	if(isset($_POST['Submit']))
						{
							$username = $_SESSION['username'];
                            
							//first column                
							$invoiceno =mysql_real_escape_string($_POST['invoiceno']);
                            $sdate=$_POST['date'];
							$customer=mysql_real_escape_string($_POST['customer']);
							$address=mysql_real_escape_string($_POST['address']);
							$contact=mysql_real_escape_string($_POST['contact']);
							
							$db->query("insert into sales_logs(invoiceno,sdate,cusname,cusaddr,cuscont)values('$invoiceno','$sdate','$customer','$address','$contact')");

							//second column
							if($_POST["sku1"]!="" && $_POST["item1"]!="" && $_POST["quty1"]!="" && $_POST["cost1"]!="" && $_POST["total1"]!="")
							{
                            $sku1=$_POST["sku1"];                         
                            $itemname1=$_POST["item1"];
							$quty1=$_POST["quty1"];
							$rate1=$_POST["cost1"];
							$amt1=$_POST["total1"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku1','$itemname1','$quty1','$rate1','$amt1')");
							}
							if($_POST["sku2"]!="" && $_POST["item2"]!="" && $_POST["quty2"]!="" && $_POST["cost2"]!="" && $_POST["total2"]!="")
							{
							$sku2=$_POST["sku2"];                         
                            $itemname2=$_POST["item2"];
							$quty2=$_POST["quty2"];
							$rate2=$_POST["cost2"];
							$amt2=$_POST["total2"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku2','$itemname2','$quty2','$rate2','$amt2')");
							}
							if($_POST["sku3"]!="" && $_POST["item3"]!="" && $_POST["quty3"]!="" && $_POST["cost3"]!="" && $_POST["total3"]!="")
							{
							$sku3=$_POST["sku3"];                         
                            $itemname3=$_POST["item3"];
							$quty3=$_POST["quty3"];
							$rate3=$_POST["cost3"];
							$amt3=$_POST["total3"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku3','$itemname3','$quty3','$rate3','$amt3')");
							}													
							if($_POST["sku4"]!="" && $_POST["item4"]!="" && $_POST["quty4"]!="" && $_POST["cost4"]!="" && $_POST["total4"]!="")
							{
							$sku4=$_POST["sku4"];                         
                            $itemname4=$_POST["item4"];
							$quty4=$_POST["quty4"];
							$rate4=$_POST["cost4"];
							$amt4=$_POST["total4"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku4','$itemname4','$quty4','$rate4','$amt4')");
							}
							if($_POST["sku5"]!="" && $_POST["item5"]!="" && $_POST["quty5"]!="" && $_POST["cost5"]!="" && $_POST["total5"]!="")
							{
							$sku5=$_POST["sku5"];                         
                            $itemname5=$_POST["item5"];
							$quty5=$_POST["quty5"];
							$rate5=$_POST["cost5"];
							$amt5=$_POST["total5"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku5','$itemname5','$quty5','$rate5','$amt5')");
							}
							if($_POST["sku6"]!="" && $_POST["item6"]!="" && $_POST["quty6"]!="" && $_POST["cost6"]!="" && $_POST["total6"]!="")
							{
							$sku6=$_POST["sku6"];                         
                            $itemname6=$_POST["item6"];
							$quty6=$_POST["quty6"];
							$rate6=$_POST["cost6"];
							$amt6=$_POST["total6"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku6','$itemname6','$quty6','$rate6','$amt6')");
							}
							if($_POST["sku7"]!="" && $_POST["item7"]!="" && $_POST["quty7"]!="" && $_POST["cost7"]!="" && $_POST["total7"]!="")
							{
							$sku7=$_POST["sku7"];                         
                            $itemname7=$_POST["item7"];
							$quty7=$_POST["quty7"];
							$rate7=$_POST["cost7"];
							$amt7=$_POST["total7"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku7','$itemname7','$quty7','$rate7','$amt7')");
							}
							if($_POST["sku8"]!="" && $_POST["item8"]!="" && $_POST["quty8"]!="" && $_POST["cost8"]!="" && $_POST["total8"]!="")
							{
							$sku8=$_POST["sku8"];                         
                            $itemname8=$_POST["item8"];
							$quty8=$_POST["quty8"];
							$rate8=$_POST["cost8"];
							$amt8=$_POST["total8"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku8','$itemname8','$quty8','$rate8','$amt8')");
							}
							if($_POST["sku9"]!="" && $_POST["item9"]!="" && $_POST["quty9"]!="" && $_POST["cost9"]!="" && $_POST["total9"]!="")
							{
							$sku9=$_POST["sku9"];                         
                            $itemname9=$_POST["item9"];
							$quty9=$_POST["quty9"];
							$rate9=$_POST["cost9"];
							$amt9=$_POST["total9"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku9','$itemname9','$quty9','$rate9','$amt9')");
							}
							if($_POST["sku10"]!="" && $_POST["item10"]!="" && $_POST["quty10"]!="" && $_POST["cost10"]!="" && $_POST["total10"]!="")
							{
							$sku10=$_POST["sku10"];                         
                            $itemname10=$_POST["item10"];
							$quty10=$_POST["quty10"];
							$rate10=$_POST["cost10"];
							$amt10=$_POST["total10"];
							$db->query("insert into sales_items(invoiceno,itemno,itemname,quty,rate,amt)values('$invoiceno','$sku10','$itemname10','$quty10','$rate10','$amt10')");
							}
							//third column
							$taxoble=$_POST['taxoble'];
							$gst=mysql_real_escape_string($_POST['gst']);
							$gstamt=mysql_real_escape_string($_POST['gstamt']);
							$main_total=mysql_real_escape_string($_POST['main_total']);
							$description=mysql_real_escape_string($_POST['gst1']);

							$db->query("insert into sales_total(invoiceno,taxableamt,gst_percentage,gstamt,grandamt,description)values('$invoiceno','$taxoble','$gst','$gstamt','$main_total','$description')");
							       
							//$db->execute("UPDATE stock_avail SET quantity=$amount1 WHERE sku='$sku[$i]'");
							
							$msg="Sales order Added successfully Ref: ". $_POST['invoiceno']."" ;
							$msg1=$_POST['invoiceno'];
							header("Location: view_sales.php?msg=$msg1");
			                
						}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Sales</title>
	
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
								<li><a href="view_sales.php" class="active-tab purchase-tab">View Sales</a></li>
								<li><u><a href="sales_report.php" class="active-tab purchase-tab">Sales Report</a></u></li>

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
                      <?php
					  
					  $max = $db->maxOfAll("id","sales_logs");
					  $max = $max+1;
					  $autoid="SR".$max."";
					  ?>
					  <td style="color:yellow"><span class="man">*</span>Invoice No:
					  <input name="invoiceno" placeholder="ENTER BILL NO" type="text" id="bill_no" maxlength="200"  class="round default-width-input" style="width:120px" value="<?php echo $autoid; ?>" /></td>
					  <td style="color:yellow">Date:<input  name="date" id="test1" placeholder="" value="<?php echo date('d-m-Y');?>" type="text" id="name" maxlength="200"  class="round default-width-input"  /></td>
                      <td style="color:yellow"><span class="man">*</span>Customer:<input name="customer" placeholder="ENTER Customer" type="text" id="customer"  maxlength="200"  class="round default-width-input"  style="width:130px " /></td>
                      <td style="color:yellow">Address:<input name="address" placeholder="ENTER ADDRESS" type="text" id="address" maxlength="200"  class="round default-width-input"  /></td>
                      <td style="color:yellow">Contact:<input name="contact" placeholder="ENTER CONTACT" type="text" id="contact1" maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" style="width:120px " /></td>
                       
                    </tr>
                  </table>
            </div>
			<br>
                <div class="mytable_row " align="center">
                  <input type="hidden" id="guid">
                  <input type="hidden" id="edit_guid">
                  <table class="form" >
                     
					 <tr>
						<td style="color:yellow">SI_No:</td>
                        <td style="color:yellow">Item_Name:</td>
                        <td style="color:yellow">Stock:</td>
                        <td style="color:yellow">Qty:</td>
                        <td style="color:yellow">Rate:</td>
                        <td style="color:yellow">Amount:</td>
                       </tr>
                      					  
					   <tr>
						<td align="center"><input name="sku1"  type="text" id="sku1"  maxlength="200"  class="round default-width-input " style="width:20px" value="1"/></td>
						<td><select name="item1" id="item1" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                       
						<td><input name="stk1"  type="text" class="result1"  maxlength="200"   class="round default-width-input my_with"  style="width:50px" readonly="readonly"  /></td>
						<td><input name="quty1"  type="text" id="quty1"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost1"  type="text" id="cost1"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total1"  type="text" id="total1" maxlength="200"  class="round default-width-input " style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku2"  type="text" id="sku2"  maxlength="200"  class="round default-width-input " style="width: 20px"  value="2" /></td>
						<td><select name="item2" id="item2"  class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                       
						<td><input name="stk2"  type="text" class="result2"  maxlength="200"   class="round default-width-input my_with"   style="width:50px" readonly="readonly" /></td>
						<td><input name="quty2"  type="text" id="quty2"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost2"  type="text" id="cost2"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total2"  type="text" id="total2" maxlength="200"  class="round default-width-input " style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku3"  type="text" id="sku3"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="3"/></td>
						<td><select name="item3" id="item3" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                       
						<td><input name="stk3"  type="text" class="result3"  maxlength="200"   class="round default-width-input my_with"   style="width:50px" readonly="readonly" /></td>						
						<td><input name="quty3"  type="text" id="quty3"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>						
                        <td><input name="cost3"  type="text" id="cost3"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total3"  type="text" id="total3" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku4"  type="text" id="sku4"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="4"/></td>
						<td><select name="item4" id="item4" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                       
						<td><input name="stk4"  type="text" class="result4"  maxlength="200"   class="round default-width-input my_with"   style="width:50px" readonly="readonly" /></td>
						<td><input name="quty4"  type="text" id="quty4"  maxlength="200"   class="round default-width-input my_with"  style="width:30px"   /></td>
                        <td><input name="cost4"  type="text" id="cost4"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total4"  type="text" id="total4" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku5"  type="text" id="sku5"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="5"/></td>
						<td><select name="item5" id="item5" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                        
						<td><input name="stk5"  type="text" class="result5"  maxlength="200"   class="round default-width-input my_with"  style="width:50px"  readonly="readonly" /></td>
						<td><input name="quty5"  type="text" id="quty5"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost5"  type="text" id="cost5"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total5"  type="text" id="total5" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku6"  type="text" id="sku6"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="6"/></td>
						<td><select name="item6" id="item6" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                       
						<td><input name="stk6"  type="text" class="result6" maxlength="200"   class="round default-width-input my_with"  style="width:50px"   readonly="readonly"/></td>
						<td><input name="quty6"  type="text" id="quty6"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost6"  type="text" id="cost6"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total6"  type="text" id="total6" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku7"  type="text" id="sku7"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="7"/></td>
						<td><select name="item7" id="item7" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                  
						<td><input name="stk7"  type="text" class="result7"  maxlength="200"   class="round default-width-input my_with"  style="width:50px"  readonly="readonly" /></td>
						<td><input name="quty7"  type="text" id="quty7"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost7"  type="text" id="cost7"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total7"  type="text" id="total7" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku8"  type="text" id="sku8"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="8"/></td>
						<td><select name="item8" id="item8" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                  
						<td><input name="stk8"  type="text" class="result8"  maxlength="200"   class="round default-width-input my_with"  style="width:50px"  readonly="readonly" /></td>
						<td><input name="quty8"  type="text" id="quty8"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost8"  type="text" id="cost8"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total8"  type="text" id="total8" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku9"  type="text" id="sku9"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="9"/></td>
						<td><select name="item9" id="item9" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>                     
						<td><input name="stk9"  type="text" class="result9" maxlength="200"   class="round default-width-input my_with"    style="width:50px" readonly="readonly" /></td>
						<td><input name="quty9"  type="text" id="quty9"  maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost9"  type="text" id="cost9"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total9"  type="text" id="total9" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					  <tr>
						<td align="center"><input name="sku10"  type="text" id="sku10"  maxlength="200"  class="round default-width-input " style="width: 20px"   value="10"/></td>
						<td><select id="item10" name="item10" class="round default-width-input"><option align="center">-----SELECT (Item_Name)-----</option>
						<?php
						$sql = "SELECT * FROM category_details";
						$result = mysql_query($sql);
						while ($row = mysql_fetch_array($result)) 
						{ 	$option =$row['item_name'];		
						?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
						<?php } ?>
						</td>
                        <td><input name="stk10"  type="text" class="result10"  maxlength="200"   class="round default-width-input my_with"   style="width:50px" readonly="readonly" /></td>
                        <td><input name="quty10"  type="text" id="quty10" maxlength="200"   class="round default-width-input my_with"   style="width:30px"  /></td>
                        <td><input name="cost10"  type="text" id="cost10"  maxlength="200"  class="round default-width-input my_with"  onkeyup="ta();taxable()" /></td>
                       	<td><input name="total10"  type="text" id="total10" maxlength="200"  class="round default-width-input "  style="width:120px;  margin-left: 20px" readonly="readonly" /></td>
				      </tr>
					  
					</table>
					                      	
                 </div >
				 <br>
				 <div class="mytable_row " align="center">
					  <table>
                      <tr>
					  <td style="color:yellow">Sub Total:
					  <input type="text"  class="round" onclick="stot()" name="st" id="st" readonly="readonly" style="width: 50px"></td>
					  <input type="hidden"  class="round" onkeyup="" name="dis" id="dis"  style=""></td>
  					  <td style="color:yellow">Discount:
  					  <input type="text"  class="round" onclick="" name="taxoble" id="discount"  style="width: 50px"></td>
					  
					  <td style="color:yellow">Taxable Amount:
					  <input type="text"  class="round" onclick="" name="taxoble" id="taxoble" readonly="readonly" style="width: 50px"></td>
					  <td style="color:yellow">CGST:
					  <input type="text" class="round" id="gst" name="gst" style="width: 30px" onkeyup="igst()">&nbsp%</td>
					  <td><input type="hidden" class="round" id="hgst" name="hgst" style="" onkeyup=""></td>
  					  <td style="color:yellow">SGST:
					  <input type="text" class="round" id="gst1" name="gst1" style="width: 30px" onkeyup="jgst()">&nbsp%</td>
					  <td><input type="hidden" class="round" id="hgst1" name="hgst1" style="" onkeyup=""></td>
					  <td style="color:yellow">GST Amt:
					  <input type="text"  class="round" id="gstamt" name="gstamt" style="width: 50px"readonly="readonly" onclick="gamt();mgt()"></td>
                      <td style="color:yellow">Grand Total:
                      <input type="text" id="main_total" name="main_total" class="round" onclick="mgt()" style="width:120px" readonly="readonly" >
                      </td>
					  </tr>
					  <tr>
                      <td><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td><input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="SAVE"></td>
					  </tr>
					  </table>
					</div>
					<div class="result"></div>
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
        document.getElementById('total6').value=document.getElementById('cost6').value * document.getElementById('quty6').value
        document.getElementById('total7').value=document.getElementById('cost7').value * document.getElementById('quty7').value
        document.getElementById('total8').value=document.getElementById('cost8').value * document.getElementById('quty8').value
        document.getElementById('total9').value=document.getElementById('cost9').value * document.getElementById('quty9').value
        document.getElementById('total10').value=document.getElementById('cost10').value * document.getElementById('quty10').value

}


function stot()
{
	var ta1 = parseFloat(document.getElementById('total1').value) || 0;
    var ta2 = parseFloat(document.getElementById('total2').value) || 0;
    var ta3 = parseFloat(document.getElementById('total3').value) || 0;
    var ta4 = parseFloat(document.getElementById('total4').value) || 0;
    var ta5 = parseFloat(document.getElementById('total5').value) || 0;
    var ta6 = parseFloat(document.getElementById('total6').value) || 0;
    var ta7 = parseFloat(document.getElementById('total7').value) || 0;
    var ta8 = parseFloat(document.getElementById('total8').value) || 0;
    var ta9 = parseFloat(document.getElementById('total9').value) || 0;
    var ta10 = parseFloat(document.getElementById('total10').value) || 0;

    document.getElementById('st').value= ta1+ta2+ta3+ta4+ta5+ta6+ta7+ta8+ta9+ta10;
	
}

var discountOption = document.getElementById("discount");

discountOption.addEventListener('keyup', function (e) {

var dropdownVal = document.getElementById("discount").value;
var subTotal = document.getElementById("st").value;
//var grossTotal = document.getElementById("txtGrossTotal").value;
document.getElementById('dis').value = subTotal * dropdownVal/100;
document.getElementById('taxoble').value=subTotal-document.getElementById('dis').value;

});


function igst()
{
		document.getElementById('hgst').value=parseFloat(document.getElementById('taxoble').value)*parseFloat(document.getElementById('gst').value/100);		
}
function jgst()
{
	document.getElementById('hgst1').value=parseFloat(document.getElementById('taxoble').value) * parseFloat(document.getElementById('gst1').value/100);
}
function gamt()
{
	var g1=parseFloat(document.getElementById('hgst').value) + parseFloat(document.getElementById('hgst1').value);
	document.getElementById('gstamt').value=g1.toFixed(2);
}

function mgt()
{
			var mt1 = parseFloat(document.getElementById('taxoble').value);
			var mt2 = parseFloat(document.getElementById('gstamt').value); 
			var mt3 = mt1+mt2;
	
	        document.getElementById('main_total').value =Math.round(mt3);
}	

$(function() {
   
    	$("#customer").autocomplete("customer1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
        
        $("#customer").blur(function()
			{
			  $.post('check_customer_details.php', {cus_name: $(this).val() },
				function(data){
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								if(data.address!=undefined)
								$("#0").focus();
								
							}, 'json');
			});
});


$(document).ready(function() { $("#item1").change(function(){ $.post( "ajax.php", { item1: $(this).val() }).success(function(data) { $(".result1").val(data); }); }); });
$(document).ready(function() { $("#item2").change(function(){ $.post( "ajax.php", { item2: $(this).val() }).success(function(data) { $(".result2").val(data); }); }); });
$(document).ready(function() { $("#item3").change(function(){ $.post( "ajax.php", { item3: $(this).val() }).success(function(data) { $(".result3").val(data); }); }); });
$(document).ready(function() { $("#item4").change(function(){ $.post( "ajax.php", { item4: $(this).val() }).success(function(data) { $(".result4").val(data); }); }); });
$(document).ready(function() { $("#item5").change(function(){ $.post( "ajax.php", { item5: $(this).val() }).success(function(data) { $(".result5").val(data); }); }); });
$(document).ready(function() { $("#item6").change(function(){ $.post( "ajax.php", { item6: $(this).val() }).success(function(data) { $(".result6").val(data); }); }); });
$(document).ready(function() { $("#item7").change(function(){ $.post( "ajax.php", { item7: $(this).val() }).success(function(data) { $(".result7").val(data); }); }); });
$(document).ready(function() { $("#item8").change(function(){ $.post( "ajax.php", { item8: $(this).val() }).success(function(data) { $(".result8").val(data); }); }); });
$(document).ready(function() { $("#item9").change(function(){ $.post( "ajax.php", { item9: $(this).val() }).success(function(data) { $(".result9").val(data); }); }); });
$(document).ready(function() { $("#item10").change(function(){ $.post( "ajax.php", { item10: $(this).val() }).success(function(data) { $(".result10").val(data); }); }); });

</script>
	