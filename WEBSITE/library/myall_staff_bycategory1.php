<div id=additionalcontent><table border=0 cellspacing=1 cellpadding=3> <? include ("../codes/adminconfig.php"); ?>

<?

$dbstaff = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querystaff= "SELECT * FROM staff where stackorder=1 order by showorder"; $sql_resultstaff = mysql_query($querystaff, $connection) or die ("Couldn't execute query. Please try again later"); $k=0;while ($myrow = mysql_fetch_array($sql_resultstaff)){                    $aid=$myrow["aid"];					                      $picturestaff=$myrow["picture"];                   $firstnamestaff=$myrow["firstname"];                   $lastnamestaff=$myrow["lastname"];                   $titlestaff=$myrow["title"];                   $textstaff=$myrow["text"];$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$textstaff = strtr($textstaff,$trans); $titlestaff = strtr($titlestaff, $trans);


echo "<tr>";


echo "<td valign=top>";
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

echo "<a href=contactus.php?passid=$aid>send e-mail</a><BR>\n";echo "</td>";echo "</tr>\n";
}$b++;
?>



</table>


</div>