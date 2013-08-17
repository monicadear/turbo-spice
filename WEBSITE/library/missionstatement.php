<h1 class=special>Mission Statement</h1>

<? include ("../codes/adminconfig.php"); ?><?$dbmissioninfo = "pagecontent";$query1missioninfo = "select text from $dbmissioninfo where id = 12";$result1missioninfo = mysql_db_query($database, $query1missioninfo);while($row = mysql_fetch_object($result1missioninfo)) {$transmissioninfo["&quot;"] = "'"; $transmissioninfo["&amp;"] = "&"; $transmissioninfo["&#039;"] = "'";
$transmissioninfo["&lt;BR&gt;"] = "";
$transmissioninfo["&lt;"] = "<";
$transmissioninfo["&gt;"] = ">";
$transmissioninfo["\n"] = "<BR>";
$transmissioninfo["&lt;p&gt;"] = "";
$transmissioninfo["&lt;/p&gt;"] = "";


$textmissioninfo = strtr($row->text,$transmissioninfo); 

echo "<!-- TEXT-->\n";echo "$textmissioninfo";echo "<BR>";}?>