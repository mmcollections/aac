<?php
ob_start();
include_once("init.php");

?>
<?php 
		if(isset($_POST[dsubmit])){
			$bno = $_POST['bno'];
			$db->execute("DELETE FROM category_details WHERE id='$bno'");
			}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Items</title>
	
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
 
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
		$("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		$("#category").autocomplete("category.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				
				stockid: {
					required: true,
					minlength: 1,
					maxlength: 200
				},
				
			},
			messages: {
				name: {
					required: "Please Enter Stock Name",
					minlength: "Category Name must consist of at least 3 characters"
				},
				stockid: {
					required: "Please Enter Stock ID",
					minlength: "Category Name must consist of at least 3 characters"
				},
				
				}
		});
	
	});
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40 && unicode!=9){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
	</script>
	</script>

	<style type="text/css">

td{    
  width:50px; 
  height:20px;max-width:100px;
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
		
		<div class="page-full-width cf">

				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add Items</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
                                                <div style="margin-top: 15px;margin-left: 150px"></div>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
							
					<?php
					//Gump is libarary for Validatoin
					
					if(isset($_POST['name'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(
						'name'    	  => 'required|max_len,100|min_len,3',
						'stockid'     => 'required|max_len,200',
						
					));
				
					$gump->filter_rules(array(
						'name'    	  => 'trim|sanitize_string|mysql_escape',
						'stockid'     => 'trim|sanitize_string|mysql_escape',
						
					));
				
					$validated_data = $gump->run($_POST);
					$name 		= "";
					$stockid 	= "";
					$sku 		= "";
					
					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
						
						
							$name=mysql_real_escape_string($_POST['name']);
							$stockid=mysql_real_escape_string($_POST['stockid']);
							$sku=mysql_real_escape_string($_POST['sku']);
							
							$uploads_dir="./stock_images";
							$tmp_name=$_FILES["userfile"]["tmp_name"];
							$iname= $_FILES["userfile"]["name"];
							move_uploaded_file($tmp_name,"$uploads_dir/$iname");
							$image_path= $uploads_dir."/".$iname;
						
						//$count = $db->countOf("stock_details", "sku ='$sku'");
						//echo $count;exit;
		if($count>0)
			{
	        $data='Dublicat Entry. Please Verify';
                                            $msg='<p style=color:red;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'POSNIC');
			
</script>
                                                        <?php
			}
			else
			{
				
			if($db->query("insert into category_details(id,item_name) values('$stockid','$name')"))
			{ 
				$msg=" $name Stock Details Added" ;
				header("Location: add_items.php?msg=$msg");
                        }else
			echo "<br><font color=red size=+1 >Problem in Adding !</font>" ;
			
			}
			
			
			}
							
							}
						
				if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
                                         <?php
                                         }
				
				?>
				
				<form name="form1" method="post" id="form1" action="" enctype="multipart/form-data">
                  
                
                  <table class=""  border="0" cellspacing="" cellpadding="">
                  
						<tr>
                         <?php
						$max = $db->maxOfAll("id","category_details");
						$max=$max+1;
						$autoid=$max;
						?>
						<td><span class="man">*</span>S.No:</td>
						<td><input name="stockid" type="text" id="stockid" readonly="readonly" maxlength="200"  class="round default-width-input" value="<?php echo $autoid; ?>" /></td>
						<td></td>
						</tr> 
						<tr>
						<td><span class="man">*</span>Name:</td>
						<td><input name="name"placeholder="ENTER CATEGORY NAME" type="text" id="name" maxlength="200"  class="round default-width-input"  /></td>
						<td></td>
						</tr>
						<tr>
						<td align=""><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
					  	<td><input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Add"></td>
						</tr>
						
                  </table>
                </form>  

				<div class="content-module-heading cf">
					
						<h3 class="fl">Items Lists</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
                                                <div style="margin-top: 15px;margin-left: 150px"></div>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div>
											<div class="content-module-main cf" >

			<div align="center" class="">
				<form name="deletefiles"  method="post">
			<p>Enter (S.No) to Delete the Row:<input class="round" type="text" name="bno" placeholder="Enter S.No" style="margin-left:10px;" />
			<input class="button round red   text-upper" name="dsubmit" type="submit" value="Delete" </P>
		</div>
			<table border=1>
				<tr class="trbg">
					<td><u>S.No:</td>
					<td><u>ITEM NAME</td>							
				</tr>
			</table>
				<?php
				$sql1 = "select * from category_details order by id DESC";
				$result1 = mysql_query($sql1);
			
			while($row1 = mysql_fetch_array($result1)) 
			{
?> 				
				<table border=1>	
				<tr>
					<td style="color:blue"> <?php echo $row1['id']; ?></td>
					<td style="color:blue"> <?php echo $row1['item_name']; ?></td>
				</tr>
				</table>
				
<?php  
} 
?>
		</div>
		</div> <!-- end full-width -->
		  	
	</div> <!-- end content -->
	
</body>
</html>
