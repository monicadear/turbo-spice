<?
/**
 * Memberphp_handlercalendar.php
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
$contact=$_POST['contact'];
$website=$_POST['website'];
$evt_type=$_POST['evt_type'];


$description=strtr($description,$transm);





$startdate=$startyear."-".$startmonth."-".$startday;

if ($enddate =="0000-00-00" || $enddate=="$startyear-Month-Day" || $enddate==null) {
$enddate="$startdate";
}
else {
$enddate=$endyear."-".$endmonth."-".$endday;







<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>

<? include ("../pages/exclusions.php"); ?>

<? include ("../pages/pagepartial0.php"); ?>

<?
echo "Our webmaster will review your announcement for suitability.<BR>";
echo "Return to the <a href=/>homepage</a>.<BR>";






$headers = 'From: Membership Updates <no-reply@strawbuilding.org>' . "\r\n" .
    'Reply-To: no-reply@strawbuilding.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$subject = "MEMBER-UPDATED CALENDAR EVENT Added to website";
$message = "A member has logged in and added an event on the Website. This is the text of their event:\r\n

Start Date:$startdate\r
End Date: $enddate\r
Start Time: $starttime\r
End Time: $endtime\r
Title: $title\r
Description: $description\r
Location: $location\r
Price: $price\r
Price nonmembers: $pricenonmembers\r
Contact: $contact\r
Website: $website\r


********************\r
NOTICE: You do not need to do anything. If the above contains inappropriate or offensive material, please log onto the administration page and delete this listing:\r\n

$basewebsite/myadmin/calendar/calendaradmin.php\r

Thank you,\r
The Website Team";

mail($to, $subject, $message, $headers);







<? include ("../pages/exclusionsbottom.php"); ?>





<?php include ("../library/myfooter.php"); ?>