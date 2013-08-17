
<?
$dbsec="productsubcategory";

$querydbsec = "select * from $dbsec where productsubcategoryid='$type'";
$resultdbsec = mysql_db_query($database, $querydbsec);
while($rowdbsec = mysql_fetch_object($resultdbsec)) {

$showtype=$rowdbsec->productsubcategoryname;


echo "$showtype<BR>";
}

mysql_close();
?>
