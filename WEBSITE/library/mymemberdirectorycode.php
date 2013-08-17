
<BR>

<?
$dbshowall = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalogshowall= "SELECT * FROM membertype where categoryid >3 order by categoryid"; $sql_resultcatalogshowall = mysql_query($querycatalogshowall, $connection) or die ("Couldn't execute query. Please try again later");                 $x = 1;while ($myrowcatalogshowall = mysql_fetch_array($sql_resultcatalogshowall))
{ 
$categoryidshowall=$myrowcatalogshowall["categoryid"];	
$cattitleshowall=$myrowcatalogshowall["categorytitle"];	

$cattitleshowall = ucwords($cattitleshowall);


echo "<a href=#$categoryidshowall>$cattitleshowall</a> &#124; ";
}
$x++;

?>

<BR><BR>
<!--- -------------- -->

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM membertype where categoryid >3 order by categoryid"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categorytitle"];	



$cattitle = ucwords($cattitle);


echo "<a name=$categoryid></a><h1>$cattitle</h1>";
?>


<table border=0 cellspacing=2 cellpadding=2>
<tr><td><a href=/pages/directory.php?orderitem=lastname&lastsort=$orderitem>Name</a></td>
<td width=25%><a href=/pages/directory.php?orderitem=company&lastsort=$orderitem>Company</a></td>

<td width=15%><a href=/pages/directory.php?orderitem=city&lastsort=$orderitem>City</a></td>

<td width=25%></td>

<td></td></tr>


<?


$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM directory where typeofcontact=$categoryid order by lastname"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $lastname=$myrowdown["lastname"];                   $firstname=$myrowdown["firstname"];                   $company=$myrowdown["company"];                   $city=$myrowdown["city"];                   $state=$myrowdown["state"];                   $company_phone_number=$myrowdown["company_phone_number"];	
		   $webslinkdown = $myrowdown['website'];$transwebslink["http://"] = "";$webslinkdown = strtr($webslinkdown, $transwebslink);


  echo ($t % 2) ? "<tr bgcolor=\"FFFFFF\">" : "<tr bgcolor=\"FFFFCC\">";	


echo "<td valign=middle><b>$firstname $lastname</b></td>\n";
echo "<td>$company<BR>$company_phone_number</td>\n";


echo "<td valign=middle>$city, $state</td>\n";


echo "<td>";
if (isset($webslinkdown) && $webslinkdown !== "") {echo "<a href=http://$webslinkdown class=heavy target=new>link</a><BR>";}else {echo "";}

echo "</td>";


echo "<td><a href=/pages/moreinfo.php?id=$iddown>details...</a></td>\n";



echo "</tr>\n\n";}$t++; ?>

</table><BR></hr><BR>
<div align=right><a href=#top>top of page</a></div>

<?
}
$g++;
?>
