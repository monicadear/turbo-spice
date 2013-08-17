<div id=additionalcontent><table border=0 cellspacing=1 cellpadding=3> <? include ("../codes/adminconfig.php"); ?>

<?

$dbshowstaffcategory = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalogshowstaffcategory= "SELECT * FROM staffcategory where categoryid=2"; 
$sql_resultcatalogshowstaffcategory = mysql_query($querycatalogshowstaffcategory, $connection) or die ("Couldn't execute query. Please try again later");                 $b = 1;while ($myrowcatalogshowstaffcategory = mysql_fetch_array($sql_resultcatalogshowstaffcategory))
{
$staffcategoryid=$myrowcatalogshowstaffcategory["categoryid"];	
$cattitleshowstaffcategory=$myrowcatalogshowstaffcategory["categoryname"];	
echo "<tr><td colspan=2><h2>$cattitleshowstaffcategory</h2></td></tr>\n";


 include ("../codes/adminconfig.php"); 



$dbstaff = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querystaff= "SELECT * FROM staff where stackorder=$staffcategoryid order by showorder"; $sql_resultstaff = mysql_query($querystaff, $connection) or die ("Couldn't execute query. Please try again later"); $k=0;while ($myrow = mysql_fetch_array($sql_resultstaff)){                    $aid=$myrow["aid"];					                      $picturestaff=$myrow["picture"];                   $firstnamestaff=$myrow["firstname"];                   $lastnamestaff=$myrow["lastname"];                   $titlestaff=$myrow["title"];                   $textstaff=$myrow["text"];$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;BR&gt;"] = "<BR><BR>";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";
$textstaff = strtr($textstaff,$trans); $titlestaff = strtr($titlestaff, $trans);


echo "<tr>";


echo "<td valign=top>";
echo "<b>$firstnamestaff $lastnamestaff</b><BR>\n";

if (isset($picturestaff) && $picturestaff !=="") {
echo "<img src=/images/faces/$picturestaff border=0 width=100>";
}
else {
}




echo "</td>";

echo "<td valign=top>";
echo "<i>$titlestaff</i><BR>\n";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td valign=top colspan=2>";

if (isset($textstaff) && $textstaff !=="") {
echo "$textstaff<BR>\n";
}

echo "</td>";echo "</tr>\n";
}$k++; 


echo "<tr><td colspan=2>";
echo "<div align=right>";
echo "<a href=#top class=smaller>top of page</a>\n";
echo "</div><br><hr></td></tr>";
}
$b++;
?>



</table>


</div>