<?
include ("../codes/adminconfig.php"); $dbmembersonly = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querymembersonly= "SELECT * FROM pagecontent where subcategory='3' and publish='Y' order by category"; 
$sql_resultmembersonly = mysql_query($querymembersonly, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 10;while ($myrowmembersonly = mysql_fetch_array($sql_resultmembersonly)){ $idmembersonly=$myrowmembersonly["id"];                   		$navtitlemembersonly=$myrowmembersonly["titleshow"];
$categorymembersonly=$myrowmembersonly["category"];
	echo " <a href=/members/memberhome.php?pageid=$idmembersonly&pagecategory=$categorymembersonly class=whitetoptop>";echo "$navtitlemembersonly";echo "</a><BR>\n";


$dbmembdrop = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querymembdrop= "SELECT * FROM pagecontent where category='$g' and subcategory='7' and publish='Y' order by showorder"; $sql_resultmembdrop = mysql_query($querymembdrop, $connection) or die ("Couldn't execute query. Please try again later");                 $w = 0;while ($myrowmembdrop = mysql_fetch_array($sql_resultmembdrop)){ $idmemb=$myrowmembdrop["id"];                   		$navtitlememb=$myrowmembdrop["titleshow"];	$categorymemb=$myrowmembdrop["category"];	echo "&nbsp; <a href=/members/memberhome.php?pageid=$idmemb&pagecategory=$categorymemb class=whitetoptop>";echo "$navtitlememb";echo "</a><BR>\n";



}$w++; 


echo "<BR>\n";
$g++; }

?>
