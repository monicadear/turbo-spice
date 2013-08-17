<?
echo "<br><BR>";




$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM faqcategory order by categoryid"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	
echo "<tr><td colspan=9><h2>$cattitle</h2></td></tr>";
?>

<?


$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM faqs where category=$categoryid order by showorder"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $datedown=$myrowdown["date"];                   $titledownf=$myrowdown["title"];                   $textdownf=$myrowdown["text"];                   $webslinkdown=$myrowdown["webslink"];                   $filenamedown=$myrowdown["filename"];$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&quot;"] = "'";$titledownf = strtr($titledownf,$trans); $textdownf = strtr($textdownf,$trans); $transwebslink["http://"] = "";$webslinkdown = strtr($webslinkdown, $transwebslink);



$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);



echo "<b><a href=$PHP_SELF?pageid=30#$iddown>$titledownf</a></b><BR>";
if (isset($webslinkdown) && $webslinkdown !== "") {echo "<a href=http://$webslinkdown class=heavy target=new>link</a><BR>";}else {echo "<BR>";}echo "<BR clear=all>";}$t++; echo "<BR>";
?>


<?
}
$g++;
?>