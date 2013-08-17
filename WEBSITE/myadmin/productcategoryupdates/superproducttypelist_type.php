<?$dbsec="productsupercategory";

$querydbsec = "select * from $dbsec";$resultdbsec = mysql_db_query($database, $querydbsec);while($rowdbsec = mysql_fetch_object($resultdbsec)) {$showid=$rowdbsec->productsupercategoryid;
$showtype=$rowdbsec->productsupercategoryname;


echo "<option value=$showid>$showtype</option>";
}
mysql_close();?>