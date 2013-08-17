
<?
include ("../codes/adminconfig.php"); 

echo "<BR>";$dbloggedin = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $queryloggedin= "SELECT * FROM pagecontent where subcategory='8' and publish='Y' order by showorder"; 
$sql_resultloggedin = mysql_query($queryloggedin, $connection) or die ("Couldn't execute query. Please try again later");                 $x = 1;while ($myrowloggedin = mysql_fetch_array($sql_resultloggedin)){ $idloggedin=$myrowloggedin["id"];                   		$navtitleloggedin=$myrowloggedin["titleshow"];	echo "<img src=/images/icons/personal.gif border=0 width=25 alt=member align=left hspace=2> <a href=/members/memberhome.php?pageid=$idloggedin class=whitetoptop>";echo "$navtitleloggedin";echo "</a>\n";echo "<BR>\n";$x++; }

?>











