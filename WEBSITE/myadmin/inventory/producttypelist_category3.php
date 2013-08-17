
<?
$dbtri="productsubcategory";
	@mysql_select_db("$database") or die( "Unable to open database"); 
	$queryselectiontri = "SELECT * from $dbtri order by productsubcategoryid";
	$resultselectiontri = mysql_query($queryselectiontri);
?>
<?php
if (isset($type)) {
	while(list($productsubcategoryid,$productsubcategorysecid,$productsubcategoryname) = mysql_fetch_row($resultselectiontri)) {
$code4 = htmlentities("$productsubcategoryname", ENT_QUOTES);
	print "<option value=$productsubcategoryid";
	if ($productsubcategoryid == $type) echo " selected";
    	print ">$productsubcategorysecid $productsubcategoryname</option>\n";
}

} // end if isset
else 
	while(list($productsubcategoryid,$productsubcategorysecid,$productsubcategoryname) = mysql_fetch_row($resultselectiontri)) {
$code4 = htmlentities("$productsubcategoryname", ENT_QUOTES);
	print "<option value=$productsubcategoryid>$productsubcategorysecid $productsubcategoryname</option>\n";
}
?>

<?
mysql_close();
?>
