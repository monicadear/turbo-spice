<?
/**
 * updatemylisting_handler.php
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

<div id=memberdetails>
<h1>Update my Information</h1>

<?
if($session->logged_in){
include ("libraryprofile.php");
}
?>


<?
$update=$_POST['update'];

if ($update) {

$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$company=$_POST['company'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];

$company_phone_number=$_POST['company_phone_number'];
$company_fax_number=$_POST['company_fax_number'];

$website=$_POST['website'];
$email=$_POST['email'];

$date = date("YmdHis");

$transweb["http://"] = "";$website = strtr($website, $transweb);


 include ("../codes/adminconfig.php"); 

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="directory";


$sql = "update $tablebase set dateupdated='$date', firstname='$firstname', lastname='$lastname',  company='$company', address='$address', city='$city', state='$state', zip='$zip',  company_phone_number='$company_phone_number', company_fax_number='$company_fax_number', website='$website', email='$email'	  where id='$id'";


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 
    mysql_db_query('$database',$query2);

  mysql_close();

echo "<span class=red><b>SUCCESS!</b> Your contact information in the Member Directory was updated.</span><BR><br><div id=indent>$firstname $lastname<BR><b>Company:</b> $company<BR>$address<BR>$city, $state, $zip<BR><b>Phone:</b> $company_phone_number<BR><b>Fax:</b> $company_fax_number<BR><b>Website:</b> $website<BR><b>E-mail:</b> $email<BR></div><BR><BR>";
echo "<a href=moreinfo.php?id=$id class=larger>see changes</a><BR>";



$from = "From: $firstname $lastname <$email>";
$to2 = "Membership <monica@10kgroup.com>";
$ip = $_SERVER['REMOTE_ADDR'];
$subject = "$sql";

  # Setup for text OR html

  $eol="\r\n";
  $subject = strip_tags(str_replace("\r", "\n\n", $subject)).$eol.$eol;
  $subject = strip_tags(str_replace("<br>", "\n\n", $subject)).$eol.$eol;

$transmessage[","] = "\r\n"; 

$subject = strtr($subject, $transmessage);


$message = "A participant in the MEMBER DIRECTORY has updated their listing online. They have received a confirmation message, and this message was automatically sent from the  website:\r\n\r\n You do not have to do anything to accept this listing.\r\n\r\n$subject\r\n$basewebsite/pages/moreinfo.php?id=$id\r\n\r\n";
$subjecttosend = "Updated Listing initiated by MEMBER!";



mail($to2, $subjecttosend, $message, $from);

}

?>



<?
unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);

mysql_close($connection); 

?>

</div>

<!-- end of page content -->

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>