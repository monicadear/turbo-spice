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

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("calendar_nav.php"); ?>


<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];

$category=$_POST['category'];$subcategory=$_POST['subcategory'];$startdate=$_POST['startdate'];$enddate=$_POST['enddate'];$title=$_POST['title'];$description=$_POST['description'];$starttime=$_POST['starttime'];$endtime=$_POST['endtime'];$location=$_POST['location'];$price=$_POST['price'];$pricenonmembers=$_POST['pricenonmembers'];

$contact=$_POST['contact'];$website=$_POST['website'];
$publish=$_POST['publish'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];

$title = htmlspecialchars("$title", ENT_QUOTES);$description = htmlspecialchars("$description", ENT_QUOTES);$description = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $description);$description = ereg_replace("\r\n", "&lt;BR&gt;\n", $description);$website = ereg_replace ("http://","",$website);

$today=date(Ymdhis);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="calendar";$sql = "update $tablebase set category='$category', subcategory='$subcategory', startdate='$startdate', enddate='$enddate', title='$title', description='$description', starttime='$starttime', endtime='$endtime', location='$location', price='$price', pricenonmembers='$pricenonmembers', contact='$contact', website='$website', publish='$publish', evt_type='$evt_type', dateupdated='$today',   tags='$tags' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query('$database',$query2);  mysql_close();}?><?echo "<h1>Admin: CALENDAR</h1>";echo "<BR>";echo "<p>Thanks for your update.</p>";echo "<p><b>$startdate</b> to <b>$enddate</b><BR>\n";echo "<h2>$title</h2>\n";echo "$description<BR>\n";echo "Time: $starttime to $endtime<BR>";echo "Location: $location<BR>";echo "Price members: $price<BR>\n";echo "Price visitors: $pricenonmembers<BR>\n";echo "Contact: $contact<BR>\n";echo "Website: $website<BR>\n";echo "Publish: $publish<BR>\n";echo "<p align=center><font size=+2><a href=calendaradmin.php?id=$id>view all...</a></p>";unset ($startdate);unset ($enddate);unset ($title);unset ($description);unset ($starttime);unset ($endtime);unset ($location);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
 ?>