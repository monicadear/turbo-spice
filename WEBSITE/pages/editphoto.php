<?
/**
 * editphoto.php
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
$id=$_REQUEST['id'];?>


<?
if($session->logged_in){
include ("libraryprofile.php");
}







if ($picturepass == "") 


echo "Updating picture/logo for <b>$firstname $lastname</b>.<BR>";

if($session->logged_in){

echo "<form enctype='multipart/form-data' method='post'  action='$PHP_SELF'>";

echo "File Upload:<BR>\n";
echo "</form>";
}

else {
echo " Please log in.";
}






   echo "<img src=/memberuploads/$picturepass height=100 border=1><BR><BR>\n";

if($session->logged_in){
echo "<BR>Use the following button to choose a file from your hard drive:<BR>";
echo "<input type='file' name='picture' size='18'><BR><BR>\n";
echo "</form>";
}

else {
echo " Please log in.";
}


}



?>
$newname = "$datestamp".$newname;
$id=$_REQUEST['id'];

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");

$timestamp=date(Ymdhis);
$from = "From: Assets Alliance Website <$timestamp@assetsalliance.org>";
$to = "Membership <monica@10kgroup.com>";
$ip = $_SERVER['REMOTE_ADDR'];
$subject = "UPDATED PHOTO for ASSETSALLIANCE.org";

  # Setup for text OR html

  $eol="\r\n";
  $subject = strip_tags(str_replace("\r", "\n\n", $subject)).$eol.$eol;
  $subject = strip_tags(str_replace("<br>", "\n\n", $subject)).$eol.$eol;

$transmessage[","] = "\r\n"; 

$subject = strtr($subject, $transmessage);


$message = "A participant in the MEMBER DIRECTORY has updated their photo online at:\r http://www.assetsalliance.org$url\r\nThis message was automatically sent from the AssetsAlliance.org website.\r\n\r\nYou do not have to do anything to accept this listing.\r\n\r\n$subject\r\nhttp://www.assetsalliance.org/pages/moreinfo.php?id=$id\r\n\r\n";
$subjecttosend = "Updated PHOTO initiated by Assets Alliance MEMBER";



mail($to, $subjecttosend, $message, $from);



























<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>