<?
/**
 * updatemylistingnow.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2008 by Monica Flores 10kwebdesign
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>



<? include ("exclusions.php"); ?>


<? include ("pagepartial0.php"); ?>


<SCRIPT LANGUAGE="JavaScript"><!--
function noEntry() {if (document.myinfo_form.firstname.value.length<1) {alert("Please make sure we have your first name.");return false; }else if (document.myinfo_form.email.value.length<1) {alert("Please fill in your email.");return false; }else { return true; }}
-->


</SCRIPT>


<div id=memberdetails>

<h1>Update my Information</h1>


<?
if($session->logged_in){
include ("libraryprofile.php");
}
?>


<?
$submit=$_POST['submit'];



if ($submit) {

$id=$_REQUEST['id'];
$emailtopass=$_POST['emailtopass'];
}

?>

<?include("../codes/adminconfig.php"); ?>

<?
$db2 = "directory";
$query2 = "select * from $db2 where email = '$emailtopass'";
$result2 = mysql_db_query($database, $query2);

while($row = mysql_fetch_object($result2)) {

$id = $row->id;
$emailupdater = $row->email;
$firstname = $row->firstname;
$lastname = $row->lastname;
$company = $row->company;
$address = $row->address;
$city = $row->city;
$state = $row->state;
$zip = $row->zip;
$company_phone_number = $row->company_phone_number;
$company_fax_number = $row->company_fax_number;
$website = $row->website;
$email = $row->email;


$toupdate = "$firstname $lastname <$emailupdater>";
$subjectupdate = "UPDATE YOUR Member Listing at $nameoforg";
$messageupdate = "Someone, probably you, has updated the member directory listing for $firstname $lastname.\n\r\n\rIf this is correct, do nothing.\r\nIf this sounds incorrect, please contact us if necessary.\r\n\r\nThis member listing is at $basewebsite/pages/moreinfo.php?id=$id\r\nThank you!\r\n$nameoforg";
$fromupdate = "From: $nameoforg <NOSPAM-membership@$baseemail>";


mail($toupdate, $subjectupdate, $messageupdate, $fromupdate);


echo "<form method='post' name='myinfo_form' action='updatemylisting_handler.php' onsubmit=\"return noEntry()\">";
echo "Information currently on file:<BR>\n";
echo "Name: <input type=text name='firstname' value='$firstname'><input type=text name='lastname' value='$lastname'>";
echo "<BR>\n";
echo "Company: <input type=text name='company' value='$company'><BR>\n";
echo "Address: <input type=text name='address' value='$address'><BR>\n";
echo "City: <input type=text name='city' value='$city'><BR>\n";
echo "State: <input type=text name='state' value='$state'><BR>\n";
echo "Zip: <input type=text name='zip' value='$zip'><BR>\n";
echo "Phone Number: <input type=text name='company_phone_number' value='$company_phone_number' size='25'><BR>\n";
echo "Fax Number: <input type=text name='company_fax_number' value='$company_fax_number' size='25'><BR>\n";
echo "Website: <input type=text name='website' value='$website' size='25'><BR>";
echo "E-mail: <input type=text name='email' value='$email' size='25'><BR>";
echo "<input type=hidden name='id' value='$id'>";
echo "<input type=submit name='update' value='Update'><input type=reset name='reset'>";
echo "</form>";




} // end while

?>



<?
mysql_close($connection); 
unset ($query1);
unset ($result1);
unset ($row);
?>

<BR><BR>The above is your contact information in our database.<BR><BR>If nothing is showing, please check your e-mail and <a href=javascript:history.go(-2)>try again</a>, or contact the <a href=/pages/contactus.php?passnumber=3&subject=Problem+with+my+membership+info+in+the+directory>Membership Team</a>.<BR>


</div>


<!-- end of page content -->

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>
