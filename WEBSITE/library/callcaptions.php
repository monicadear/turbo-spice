<? include ("../codes/adminconfig.php"); ?><?$dbcaption = "pagecontent";$query1caption = "select text from $dbcaption where id = 45";$result1caption = mysql_db_query($database, $query1caption);while($row = mysql_fetch_object($result1caption)) {

$transcaption["&lt;"] = "<"; $transcaption["&gt;"] = ">"; $transcaption["&quot;"] = "'"; $transcaption["&amp;"] = "&"; $transcaption["&#039;"] = "'";
$transcaption["&lt;p&gt;"] = "";
$transcaption["&lt;/p&gt;"] = "";
$transcaption["&lt;BR&gt;"] = "";
$transcaption["&lt;br /&gt;"] = "\n ";
$transcaption["<br />"] = "\n ";

$transcaption["<p>"] = ""; 
$transcaption["</p>"] = ""; 



$textcaption = strtr($row->text,$transcaption); echo "<!-- TEXT-->\n";echo "$textcaption";}?>