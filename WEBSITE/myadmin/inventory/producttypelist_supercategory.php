
<?
$dbsuper="productsupercategory";
	@mysql_select_db("$database") or die( "Unable to open database"); 
	$queryselectionsuper = "SELECT productsupercategoryid,productsupercategoryname from $dbsuper order by productsupercategoryid";
	$resultselectionsuper = mysql_query($queryselectionsuper);
?>
<?php
if (isset($supercategory)) {
	while(list($productsupercategoryid,$productsupercategoryname) = mysql_fetch_row($resultselectionsuper)) {
$code3 = htmlentities("$productsupercategoryname", ENT_QUOTES);
	print "<option value=$productsupercategoryid";
	if ($productsupercategoryid == $supercategory) echo " selected";
    	print ">$productsupercategoryname</option>\n";
}

} // end if isset
else 
	while(list($productsupercategoryid,$productsupercategoryname) = mysql_fetch_row($resultselectionsuper)) {
$code3 = htmlentities("$productsupercategoryname", ENT_QUOTES);
	print "<option value=$productsupercategoryid>$productsupercategoryname</option>\n";
}
?>

<?
mysql_close();
?>
