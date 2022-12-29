<?php
include_once("init.php");
?>

<?php 
if($_POST['item1']!='')
{
$srch=$_POST['item1'];
}
if($_POST['item2']!='')
{
$srch=$_POST['item2'];
}
if($_POST['item3']!='')
{
$srch=$_POST['item3'];
}
if($_POST['item4']!='')
{
$srch=$_POST['item4'];
}
if($_POST['item5']!='')
{
$srch=$_POST['item5'];
}
if($_POST['item6']!='') 
{
$srch=$_POST['item6'];
}
if($_POST['item7']!='') 
{
$srch=$_POST['item7'];
}
if($_POST['item8']!='') 
{
$srch=$_POST['item8'];
}
if($_POST['item9']!='') 
{
$srch=$_POST['item9'];
}
if($_POST['item10']!='') 
{
$srch=$_POST['item10'];
}
$pqty = $db->queryUniqueValue("SELECT sum(quty) FROM pur_items WHERE itemname='$srch'"); 
$sqty = $db->queryUniqueValue("SELECT sum(quty) FROM Sales_items WHERE itemname='$srch'"); 
$bqty=$pqty-$sqty;  
echo $bqty;
?>

