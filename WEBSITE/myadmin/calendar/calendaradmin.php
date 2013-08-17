<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("calendar_nav.php"); ?>

<h1>Admin: CALENDAR EVENTS</h1><p><B>This is the  calendar of <b>upcoming</b> events within the site.</B><BR>
See all <a href=<?echo"$PHP_SELF?type=viewall";?>>archived events</a>.</p><table border=1 width=100%>
<tr>
<td>Date</td>
<td>Title</td>
<td>Description</td>
<td>Time</td>
<td>Location</td>
<td>Price</td>
<td>Contact</td>
<td>Website</td>
<td>Live?</td>
<td>Members/</td>
<td></td>
</tr><?
$todaydateforsearch=date(Y)."-".date(m)."-".date(d);$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$type=$_REQUEST['type'];
if ($type=="viewall") 
{
$query= "SELECT * FROM calendar order by startdate ASC"; 
}
else {
$query= "SELECT * FROM calendar where enddate >= '$todaydateforsearch' order by startdate ASC"; 
}

$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $startdate=$myrow["startdate"];                   $enddate=$myrow["enddate"];                   $title=$myrow["title"];                   $description=$myrow["description"];                   $starttime=$myrow["starttime"];                   $endtime=$myrow["endtime"];	                   $location=$myrow["location"];                   $price=$myrow["price"];                   $pricenonmembers=$myrow["pricenonmembers"];                   $contact=$myrow["contact"];                   $website=$myrow["website"];                   $publish=$myrow["publish"];                   $evt_type=$myrow["evt_type"];				   $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$description = strtr($description,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\n\r\n";$trans4["<BR>"] = "\r\n";$description = strtr($description,$trans4);echo "<tr";
if ($publish==Y) {
echo " bgcolor=#CCFFCC";
}
echo ">";
echo "<td valign=top width=20%><span class=smalladmintext>$startdate</span>\n<BR>";

if (isset($enddate)  && $enddate !==$startdate) {
echo "<span class=smalladmintext> to $enddate</span>\n";
}
else {
echo "";
}

echo "</td>";
echo "<td valign=top width=20% valign=top><b>$title:</b></td>\n";echo "<td valign=top width=10%><span class=smalladmintext>$description</span></td>\n";echo "<td valign=top width=10%>";

if (isset($starttime) && $starttime !=="") {
echo "<span class=smalladmintext>Starts: $starttime</span>\n";
}
else {
echo "";
}

echo "<BR>";

if (isset($endtime) && $endtime !=="") {
echo "<span class=smalladmintext>Ends: $endtime</span>\n";
}
else {
echo "";
}


echo"</td>";echo "<td valign=top><span class=smalladmintext>$location</span></td>";echo "<td valign=top>";

if (isset($price) && $price > 0) {
echo " <b>members $$price</b><BR>";
}
else {
echo "";
}

if (isset($pricenonmembers) && $price > 0) {
echo "nonmembers $$pricenonmembers<BR>";
}
else {
echo "";
}

echo "</td>";echo "<td valign=top><b>$contact</b></td>";

echo "<td valign=top>";
if (isset($website) && $website !=="") {
echo "<a href=http://$website>link</a>";
}
else {
}
echo "</td>";



echo "<td valign=top>";
if ($publish =="Y") {
echo "<span class=green><b>PUBLISHED</b></span>"; 
} else if ($publish =="N" || $publish == null || $publish =="") {
echo "<span class=rednotlive>NOT PUBLISHED</span>";
}

echo "</td>\n";


if ($evt_type == "1") {
echo "<td bgcolor=#FF0000 valign=top>";
echo "<span class=redbackground>MEMBERS ONLY</span><BR><img src=/images/icons/personal.gif width=20 border=0>";
}

else {
echo "<td valign=top>";
echo "<span class=blue>PUBLIC</span>";
}

echo "</td>\n";

echo "<td valign=top><a href=update_event.php?id=$id>update</a><BR><a href=delete_event.php?id=$id class=red>delete</a></td></tr>";}$e++; ?></table><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
 ?>