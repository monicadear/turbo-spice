


<?
$dbshowall = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
{ 
$categoryidshowall=$myrowcatalogshowall["categoryid"];	
$cattitleshowall=$myrowcatalogshowall["categorytitle"];	

$cattitleshowall = ucwords($cattitleshowall);


echo "<a href=#$categoryidshowall>$cattitleshowall</a> &#124; ";
}
$x++;

?>

<BR><BR>


<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categorytitle"];	



$cattitle = ucwords($cattitle);


echo "<a name=$categoryid></a><h1>$cattitle</h1>";
?>


<table border=0 cellspacing=2 cellpadding=2>
<tr>


<td width=15%><a href=/pages/directory.php?orderitem=city&lastsort=$orderitem>City</a></td>

<td width=25%></td>

<td></td>


<?



		   $webslinkdown = $myrowdown['website'];


  echo ($t % 2) ? "<tr bgcolor=\"FFFFFF\">" : "<tr bgcolor=\"FFFFCC\">";	


echo "<td valign=middle><b>$firstname $lastname</b></td>\n";



echo "<td valign=middle>$city, $state</td>\n";


echo "<td>";
if (isset($webslinkdown) && $webslinkdown !== "") {

echo "</td>";


echo "<td><a href=/pages/moreinfo.php?id=$iddown>details...</a></td>\n";



echo "</tr>\n\n";

</table><BR></hr><BR>
<div align=right><a href=#top>top of page</a></div>

<?
}
$g++;
?>