<div id=additionalcontent>

<?

$dbshowstaffcategory = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$sql_resultcatalogshowstaffcategory = mysql_query($querycatalogshowstaffcategory, $connection) or die ("Couldn't execute query. Please try again later"); 
{
$staffcategoryid=$myrowcatalogshowstaffcategory["categoryid"];	
$cattitleshowstaffcategory=$myrowcatalogshowstaffcategory["categoryname"];	







$dbstaff = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 






echo "<b>$firstnamestaff $lastnamestaff</b><BR>\n";

if (isset($picturestaff) && $picturestaff !=="") {
echo "<a href=/pages/contactus.php?passid=$aid class=nounderline><img src=/images/faces/$picturestaff border=0 width=100></a>";
}
else {
}




echo "</td>";

echo "<td valign=top>";
echo "<i>$titlestaff</i><BR>\n";

if (isset($textstaff) && $textstaff !=="") {
echo "$textstaff<BR>\n";
}

echo "<a href=contactus.php?passid=$aid>send e-mail</a><BR>\n";
}


echo "<tr><td colspan=2>";
echo "<div align=right>";
echo "<a href=#top class=smaller>top of page</a>\n";
echo "</div><br><hr></td></tr>";
}
$b++;
?>



</table>


</div>