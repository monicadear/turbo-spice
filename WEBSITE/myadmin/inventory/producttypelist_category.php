
<?
$dbsec="productcategory";
	@mysql_select_db("$database") or die( "Unable to open database"); 
	$queryselectionsec = "SELECT productcategoryid,productcategoryname from $dbsec order by productcategoryid";
	$resultselectionsec = mysql_query($queryselectionsec);
?>
<?php
if (isset($category)) {
	while(list($productcategoryid,$productcategoryname) = mysql_fetch_row($resultselectionsec)) {
$code3 = htmlentities("$productcategoryname", ENT_QUOTES);
	print "<option value=$productcategoryid";
	if ($productcategoryid == $category) echo " selected";
    	print ">$productcategoryid $productcategoryname</option>\n";
}

} // end if isset
else 
	while(list($productcategoryid,$productcategoryname) = mysql_fetch_row($resultselectionsec)) {
$code3 = htmlentities("$productcategoryname", ENT_QUOTES);
	print "<option value=$productcategoryid>$productcategoryid $productcategoryname</option>\n";
}
?>

<?
mysql_close();
?>
