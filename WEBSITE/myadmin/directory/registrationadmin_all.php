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
<? include ("../../codes/functions.php"); ?>
<td></td>


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


echo "<td><font size=-2 color=red>$datepaid</font></td>\n";

<?



<? }
 ?>