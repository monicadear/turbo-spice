<?
/**
 * Memberphp_handlerannouncement.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 * Edits: monicadear January 11, 2010
 */
include("../include/session.php");
?>

<?
unset ($database);
unset ($connection);
unset ($db);
unset ($sql);
unset ($sql_result);
unset ($tablebase);
unset ($myrow);

$submit_enter=$_POST['submit_enter'];



if ($submit_enter) {

/*Insert into database */



$titleannounce=$_POST['titleannounce'];
$description=$_POST['description'];
$author=$_POST['author'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];




$transm["javascript"] ="jscript";
$titleannounce=strtr($titleannounce,$transm);
$description=strtr($description,$transm);
$author=strtr($author,$transm);


$titleannounce = htmlspecialchars("$titleannounce", ENT_QUOTES);
$description = ereg_replace("\r\n\r\n", "\n<BR><BR>", $description);
$description = ereg_replace("\r\n", "\n<BR>", $description);
$description = htmlspecialchars("$description", ENT_QUOTES);
$date = date("Ymdhis");

$author = htmlspecialchars("$author", ENT_QUOTES);






?>


<? include ("../codes/adminconfig.php"); ?>


<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql = "insert into announcements values ('','$date','$titleannounce','$description','','0','$author','Y','$evt_type','$tags')"; 

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

mysql_close();




}

?>


<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>

<? include ("../pages/exclusions.php"); ?>

<? include ("../pages/pagepartial0.php"); ?>

<?

echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";
echo "Our webmaster will review your announcement for suitability.<BR>";




$to = "$to";


$headers = 'From: Membership Updates <no-reply@strawbuilding.org>' . "\r\n" .
    'Reply-To: no-reply@strawbuilding.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();




$subject = "MEMBER-UPDATED ANNOUNCEMENT Added to the website";
$message = "A member has logged in and added an announcement on the Website. This is the text of their announcement:\r\n

Date: $date\r\n
Title: $titleannounce\r
Description: $description\r
Author: $author\r

********************\r
NOTICE: You do not need to do anything. If the above contains inappropriate or offensive material, please log onto the administration page and delete this listing:\r\n

$basewebsite/myadmin/announcements/viewallannouncements.php\r

Thank you,\r
The Website Team";

mail($to, $subject, $message, $headers);




unset ($titleannounce);
unset ($description);
unset ($date);
unset ($author);
unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);

?>





<? include ("../pages/exclusionsbottom.php"); ?>





<?php include ("../library/myfooter.php"); ?>                                                                                                           