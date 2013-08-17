<? include ("../codes/adminconfig.php"); ?><?$dbcontactinfo = "pagecontent";$query1contactinfo = "select text from $dbcontactinfo where id = 51";$result1contactinfo = mysql_db_query($database, $query1contactinfo);while($row = mysql_fetch_object($result1contactinfo)) {$transcontactinfo["&quot;"] = "'"; $transcontactinfo["&amp;"] = "&"; $transcontactinfo["&#039;"] = "'";
$transcontactinfo["&lt;BR&gt;"] = "";
$transcontactinfo["&lt;"] = "<";
$transcontactinfo["&gt;"] = ">";
$transcontactinfo["\n"] = "<BR>";


$textcontactinfo = strtr($row->text,$transcontactinfo); echo "<!-- TEXT-->\n";echo "$textcontactinfo";}?>