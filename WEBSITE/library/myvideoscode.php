


<?


$dbshowtags = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
{ 
$cattitleshowtags=$myrowcatalogshowtags["categoryname"];	

$n++;
}


echo "<BR><BR><table border=0>\n";

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	




$dbvideos = "videos";


echo "</tr>\n\n";
echo "<tr>\n";
echo "<td valign=top>\n";

echo "<div id=indent>\n";
if ($weblinkvideos !== "")
echo "<a href=$weblinkvideosshow class=heavy target=new>$weblinkvideosshow</a><BR>\n";
}
else {
echo "";
}
echo "$textvideos\n";
echo "<BR><HR width=85% color=#CCCCCC>\n";
echo "</td>\n";


<?
echo "<tr><td>\n";
echo "<div align=right>\n";
echo "<a href=#top>top of page</a>\n\n";
echo "</div></td></tr>\n";
}
$g++;
?>



</table>