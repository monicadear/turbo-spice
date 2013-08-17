<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? $dbstaff = "staff"; ?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><h1>ADMINISTRATION: Staff Edit</h1><p><B>You may edit these staff profiles within the site. Names display based on category, and then alphabetically within the category.</p><table border=1 width=100% cellspacing=0 cellpadding=0>

<?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM staffcategory order by categoryid asc"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	
echo "<tr><td colspan=7><h1>$cattitle</h1></td></tr>";
?>

<?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM $dbstaff where stackorder=$categoryid order by showorder"; 
$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $aid=$myrow["aid"];					                      $picture=$myrow["picture"];                   $firstname=$myrow["firstname"];                   $lastname=$myrow["lastname"];                   $title=$myrow["title"];                   $text=$myrow["text"];                   $email=$myrow["email"];                   $showorder=$myrow["showorder"];                   $stackorder=$myrow["stackorder"];$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($text,$trans); $title = strtr($title, $trans);echo "<tr><td valign=top><a name=#$aid></a><b>$aid</b> \n";
echo "<b>$firstname $lastname</b></td>";
echo "<td valign=top><i>$title:</i></td>\n";

echo "<td valign=top>";if ($picture == ""){echo "<form method=post action=update_pic.php><input type=hidden name=aid value=$aid><input type=submit name=submit value='add photo'></form>";}else {echo "<img src=/images/faces/$picture width=100><BR><a href=update_pic.php?aid=$aid>change pic?</a><BR>";
echo "<a href=delete_picture.php?aid=$aid>delete pic?</a>";}

echo "</td>";echo "<td valign=top><span class=smalladmintext>$text</span></td>";echo "<td valign=top><span class=smalladminauthortext>$email</span>\n<BR>";echo "</td>\n";echo "<td valign=top><a href=update.php?aid=$aid>update</a></td>";echo "<td valign=top><a href=delete_staff.php?aid=$aid>delete</a> <font color=red>(caution!)</font></td>";echo "</tr>";}$e++; 


}
$g++;


?>


</table>




<hr>
<span class=red>NOT CATEGORIZED!</span><BR>

<? include ("../../codes/adminconfig.php"); ?><?$dbnot = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querynot= "SELECT * FROM staff where stackorder='' order by lastname"; $sql_resultnot = mysql_query($querynot, $connection) or die ("Couldn't execute query. Please try again later"); $z=0;while ($myrownot = mysql_fetch_array($sql_resultnot)){                    $aidnot=$myrownot["aid"];		                   $firstname=$myrownot["firstname"];                   $lastname=$myrownot["lastname"];                   $titlenot=$myrownot["title"];
echo "$firstname $lastname, ";
echo "$titlenot: ";
echo "<form method=post action=update.php><input type=hidden name=aid value=$aidnot><input type=submit name=submit value=update></form><form method=post action=delete_staff.php><input type=hidden name=aid value=$aidnot><input type=submit name=submit value=delete></form><BR>";

}
$z++;
?>



<?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>