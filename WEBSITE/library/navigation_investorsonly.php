<?
include ("../codes/adminconfig.php"); 
$sql_resultmembersonly = mysql_query($querymembersonly, $connection) or die ("Couldn't execute query. Please try again later"); 
$categorymembersonly=$myrowmembersonly["category"];
	


$dbmembdrop = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 






echo "<BR>\n";
$g++; 

?>