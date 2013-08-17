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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("registration_nav.php"); ?><h1>ADMINISTRATION: REGISTRATION</h1><? include("counters_all.php");?><table border=0 width=100%><tr>
<td></td><td width=12%><a href=registrationadmin_all.php?orderitem=lastname&lastorderitem=<?echo"$orderitem";?>>Name</a></td><td width=12%><a href=registrationadmin_all.php?orderitem=publish&lastorderitem=<?echo"$orderitem";?>>Pub?</a></td><td width=25%>Address</td><td width=5%><a href=registrationadmin_all.php?orderitem=email&lastorderitem=<?echo"$orderitem";?>>Email</a></td><td width=5%>Web</td><td width=12%>Phone</td><td width=8%><a href=registrationadmin_all.php?orderitem=lastpaiddate&lastorderitem=<?echo"$orderitem";?>>Last Paid Date?</a><BR>*MANUALLY UPDATE THIS</td><td>Category</td><td>Member Since</td><td width=5%><a href=registrationadmin_all.php?orderitem=validuntil&lastorderitem=<?echo"$orderitem";?>>Valid Until</a></td><td><a href=registrationadmin_all.php?orderitem=dateupdated&lastorderitem=<?echo"$orderitem";?>>Last Updated</a></td><td>&nbsp;</td></tr><?include("../../codes/adminconfig.php");?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); if (empty($orderitem)) { $orderitem='dateupdated'; $lastorderitem='dateupdated'; }$query= "SELECT * FROM directory order by $orderitem"; 	if (empty($lastorderitem)) {	$query = $query; }	else if ( $lastorderitem == $orderitem ) { $query = $query.' DESC'; }	else { $query = $query .', '.$lastorderitem; }$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					   		   $datecreated=$myrow["datecreated"];                   $dateupdated=$myrow["dateupdated"];				           $firstname=$myrow["firstname"];                   $lastname=$myrow["lastname"];		   $company=$myrow["company"];                   $address=$myrow["address"];                   $city=$myrow["city"];                   $state=$myrow["state"];                   $zip=$myrow["zip"];                   $company_phone_number=$myrow["company_phone_number"];                   $cell_phone_number=$myrow["cell_phone_number"];                   $website=$myrow["website"];                   $email=$myrow["email"];		   $membersince=$myrow["membersince"];		   $lastpaiddate=$myrow["lastpaiddate"];		   $validuntil=$myrow["validuntil"];		   $category=$myrow["category"];		   $publish=$myrow["publish"];		   $picture1=$myrow["picture1"];					   

 //Alternate row colors in our table    echo ($e % 2) ? "<tr bgcolor=FFFFFF>" : "<tr bgcolor=CCCCCC>";echo "<td>";
if (isset($picture1) && $picture1 !=="") {
echo "<a href=/pages/moreinfo.php?id=$id target=new><img src=/memberuploads/$picture1 width=25 border=0 alt=profile></a>";
}
else {
echo "<a href=/pages/moreinfo.php?id=$id target=new><img src=/images/icons/personal.gif width=25 border=0 alt=profile></a>";
}
echo "</td>";
echo "<td><a name=$lastname></a><b>$firstname $lastname</b></td>\n";

echo "<td valign=top>";
if ($publish =="Y") {
echo "<span class=green><b>PUBLISHED</b></span>"; 
} else if ($publish =="N" || $publish == null || $publish =="") {
echo "<span class=rednotlive>INACTIVE</span>";
}

echo "</td>\n";



echo "<td><font size=-2>$company</font><BR><font size=-2>$address</font>\n<BR><font size=-2>$city, $state $zip</font></td>\n";
echo "<td><font size=-3><a href=mailto:$email class=smallerbyfar>$email</a></font></td>\n";

echo "<td><font size=-3>";

if (isset($website) && $website!== "") {
$websiteshow="http://".$website;
echo "<font size=-3><a href=$websiteshow class=smallerbyfar target=new>$website</a></font>";
}

echo "</font></td>";
echo "<td><font size=-3>$company_phone_number</font><BR>";

if (isset($cell_phone_number) && $cell_phone_number !=="") {
echo "<font size=-2>C: $cell_phone_number</font>";
}
else {
echo "";
}

echo "</td>";


echo "<td><font size=-2 color=red>$datepaid</font></td>\n";echo "<td><font size=-2>$category</font></td>\n";echo "<td><font size=-2>$membersince</font></td>\n";echo "<td><font size=-2>$datevaliduntil</font></td>\n";echo "<td>";echo "<font size=-3>";print theDate ("F d Y","$dateupdated"); echo "</font>";echo "</td>\n";echo "<td><a href=update_registration.php?id=$id>update</a></td>\n";echo "<td><a href=delete_registration.php?id=$id>delete</a></td></tr>\n\n";$e++; }?></table><?mysql_close($connection); unset ($id);unset ($date);unset ($referred);unset ($firstname);unset ($lastname);unset ($address);unset ($city);unset ($state);unset ($zip);unset ($email);unset ($phone_area);unset ($phone_number);unset ($text);unset ($coursechoice1);unset ($PAID);?>

<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>