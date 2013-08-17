<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("calendar_nav.php"); ?>

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$category=$_POST['category'];$subcategory=$_POST['subcategory'];$startmonth=$_POST['startmonth'];$startday=$_POST['startday'];$startyear=$_POST['startyear'];$endmonth=$_POST['endmonth'];$endday=$_POST['endday'];$endyear=$_POST['endyear'];$title=$_POST['title'];$description=$_POST['description'];$starttime=$_POST['starttime'];$endtime=$_POST['endtime'];$location=$_POST['location'];$price=$_POST['price'];$pricenonmembers=$_POST['pricenonmembers'];
$contact=$_POST['contact'];
$website=$_POST['website'];
$publish=$_POST['publish'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];
?><?$startdate=$startyear."-".$startmonth."-".$startday;
$enddate=$endyear."-".$endmonth."-".$endday;

if ($enddate =="0000-00-00" || $enddate=="$startyear-Month-Day" || $enddate==null || $enddate=="$endyear-Month-Day") {
$enddate="$startdate";
}

else {
$enddate=$endyear."-".$endmonth."-".$endday;
}

$title = ereg_replace("'", "&#39;", $title);$description = ereg_replace("\r\n", "\n<BR>", $description);$description = htmlspecialchars("$description", ENT_QUOTES);

$website = ereg_replace("http://", "", $website);

$today=date(Ymdhis);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB. Try again."); $sql = "insert into calendar values ('','$category','$subcategory','$startdate','$enddate','$title','$description','$starttime','$endtime','$location','$price','$pricenonmembers','$contact','$website','0','$publish','$evt_type','$today','$today','$tags')"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?>
<?echo "<h1>Admin: CALENDAR</h1>";echo "<BR>";echo "<p>Thanks for your  submission for $title starting $startdate.<BR><a href=calendaradmin.php>click to return to calendar home</a>";echo "<div id=calendarbox>";
echo "<h2>$title</h2>";echo "$description<BR>\n";echo "$startdate to \n";echo "$enddate<BR>\n";echo "Price:<BR>";echo "Members $price<BR>\n";echo "Non-members $pricenonmembers<BR>\n";echo "</div>";unset ($startdate);unset ($enddate);unset ($title);unset ($description);unset ($price);unset ($pricenonmembers);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>