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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("calendar_nav.php"); ?>

<h1>Admin: CALENDAR EVENTS</h1>
See all <a href=<?echo"$PHP_SELF?type=viewall";?>>archived events</a>.</p>
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
</tr>
$todaydateforsearch=date(Y)."-".date(m)."-".date(d);

$type=$_REQUEST['type'];
if ($type=="viewall") 
{
$query= "SELECT * FROM calendar order by startdate ASC"; 
}
else {
$query= "SELECT * FROM calendar where enddate >= '$todaydateforsearch' order by startdate ASC"; 
}

$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); 
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


echo "<td valign=top width=20% valign=top><b>$title:</b></td>\n";

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


echo"</td>";

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

echo "</td>";

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



<? }
 ?>