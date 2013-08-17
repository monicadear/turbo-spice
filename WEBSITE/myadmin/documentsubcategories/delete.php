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
<? include ("../../codes/functions.php"); ?>
<? include ("../../codes/adminconfig.php"); ?><? include ("../adminnav.php"); ?>
<? include ("documentsubcategorycontent_nav.php"); ?><h1>Admin: Upload Content Edit</h1><?$submit_delete=$_POST['submit_delete'];$subcategoryid=$_POST['subcategoryid']; ?><BR><table border=0 cellpadding=2 cellspacing=0 width="100%"><? echo "<form method='post' action='delete_handler.php'>"; ?> <?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM documentsubcategory where subcategoryid='$subcategoryid'"; 
$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); 
 $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $subcategoryid=$myrow["subcategoryid"];					   $subcategoryname=$myrow["subcategoryname"];    echo "<tr><th width=50>Title</th><td>$subcategoryname</td></tr>";echo "<tr><td colspan=2><br><input type=hidden name='subcategoryid' value='$subcategoryid'>";echo "</td></tr></table><p>";
}
?><p>Are you sure you want to <strong>DELETE</strong> this record?<BR><input type=submit name="dont" value="No, DON'T DELETE!!"><input type=submit name="delete_me" value="Yes, DELETE RECORD"><BR></form>
<?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>