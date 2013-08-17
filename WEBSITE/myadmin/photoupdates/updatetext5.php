<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";

include ("../../library/logmein_members.php"); 


}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("allphotos_nav.php"); ?>


<table border=0>

<?
$submit=$_POST['submit'];




$pid=$_REQUEST['pid'];
 ?>



<form method='post' action='updatetext5_handler.php'>

<?
$db = "allphotosextended";
$query1 = "select * from $db where pid = '$pid'";
$result1 = mysql_db_query($database, $query1);
while($row = mysql_fetch_object($result1)) {
$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";

$picturedescription = strtr($row->picture5description,$trans); 
$trans4["\n"]= "";
$trans4["<BR><BR>"] = "\r\r\n";
$trans4["<BR>"] = "\r\n";
$picturedescription = strtr($picturedescription,$trans4);
$picture=$row->picture5;
$pid = $row->pid;
 
    echo "<tr><th width=50>Text</th><td>";

?>
<span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='picturedescription' id='picturedescription' rows=7 cols=60>
    <?echo "$picturedescription";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('picturedescription');
		//-->
		</script>


<?



echo "</td></tr>";
echo "<tr><th>Image</th><td>";

if ($picture == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture width=150 border=1>";
}




echo "</td></tr>";






}



echo "<tr><td colspan=2><br><input type=hidden name='pid' value='$pid'>";

echo "</td></tr></table><p>";
?>

<input type=submit name="update" value="UPDATE record">
</form>

<? include ("../adminfooter.php"); ?>

<? }
?>