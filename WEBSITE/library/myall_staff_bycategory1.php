<div id=additionalcontent>

<?

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
?>



</table>


</div>