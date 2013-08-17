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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("slidecontent_nav.php"); ?><table border=0><? echo "<form method='post' action='update_handler.php'>"; ?> <?$db = "pagecontent";$query1 = "select * from $db where id = '103'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);$showorder=$row->showorder;
$publish=$row->publish;

$category=$row->category;$subcategory=$row->subcategory; echo "<tr><th width=100>Category:<BR></th><td>";


echo "<select name=category>";
include ("producttypelist_category.php");
echo "</select>";


echo "<a href=../categories/viewall.php target=new>(show categories)</a></td></tr>";



echo "<tr><th width=100>Type of Page:<BR></th><td>";


echo "<select name=subcategory>";
include ("producttypelist_subcategory.php");
echo "</select>";


echo "<a href=../pagetypes/viewall.php target=new>(show page types)</a></td></tr>";


<tr><th valign=top>Text</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='text' id='text' rows=10 cols=60>    <?echo "$text";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('text');
		//-->
		</script>


</td></tr>

echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";?>



<input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>