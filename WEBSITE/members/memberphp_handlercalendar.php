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

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$startmonth=$_POST['startmonth'];$startday=$_POST['startday'];$startyear=$_POST['startyear'];$endmonth=$_POST['endmonth'];$endday=$_POST['endday'];$endyear=$_POST['endyear'];$title=$_POST['title'];$description=$_POST['description'];$starttime=$_POST['starttime'];$endtime=$_POST['endtime'];$location=$_POST['location'];$price=$_POST['price'];$pricenonmembers=$_POST['pricenonmembers'];
$contact=$_POST['contact'];
$website=$_POST['website'];
$evt_type=$_POST['evt_type'];$tags=$_POST['tags'];

$transm["javascript"] ="jscript";$title=strtr($title,$transm);
$description=strtr($description,$transm);



$title = htmlspecialchars("$title", ENT_QUOTES);$description = ereg_replace("\r\n\r\n", "\n<BR><BR>", $description);$description = ereg_replace("\r\n", "\n<BR>", $description);$description = htmlspecialchars("$description", ENT_QUOTES);$date = date("Ymdhis");

$startdate=$startyear."-".$startmonth."-".$startday;

if ($enddate =="0000-00-00" || $enddate=="$startyear-Month-Day" || $enddate==null) {
$enddate="$startdate";
}
else {
$enddate=$endyear."-".$endmonth."-".$endday;}




?><? include ("../codes/adminconfig.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into calendar values ('','$category','$subcategory','$startdate','$enddate','$title','$description','$starttime','$endtime','$location','$price','$pricenonmembers','$contact','$website','','Y','$evt_type','$date','$date','$tags')"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>

<? include ("../pages/exclusions.php"); ?>

<? include ("../pages/pagepartial0.php"); ?>

<?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";
echo "Our webmaster will review your announcement for suitability.<BR>";
echo "Return to the <a href=/>homepage</a>.<BR>";echo "</div>";






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



unset ($title);unset ($description);unset ($date);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>



<? include ("../pages/exclusionsbottom.php"); ?>





<?php include ("../library/myfooter.php"); ?>