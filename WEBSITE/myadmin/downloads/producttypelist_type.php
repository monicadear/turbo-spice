<?$dbsec="documentcategory";

$querydbsec = "select * from $dbsec where categoryid='$category'";$resultdbsec = mysql_db_query($database, $querydbsec);while($rowdbsec = mysql_fetch_object($resultdbsec)) {$showtype=$rowdbsec->categoryname;


echo "$showtype<BR>";
}
mysql_close();?>