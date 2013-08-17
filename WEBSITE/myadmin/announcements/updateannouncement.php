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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("announcements_nav.php"); ?><BR>
<h1>Update this Announcement</h1><table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><form method='post' action='update_handler.php'>

<?$db = "announcements";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";

$description = strtr($row->description,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$trans4["<br><br>"] = "\r\r\n";$trans4["<br>"] = "\r\n";$description = strtr($description,$trans4);

$author = strtr($row->author,$trans4);
$id = $row->id;
$publish = $row->publish;
$evt_type = $row->evt_type;
$tags = $row->tags;



echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";

?>


<tr><th valign=top>Description</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=10 cols=60>    <?echo "$description";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>




<?echo "<tr><th valign=top>Web link URL, if any</th><td><input type=text name='url' value='$row->url' size=100></td></tr>";

echo "<tr><th width=50>Author: </th><td>$session->username <input type=hidden name='author' value='$session->username' size=50></td></tr>";




echo "<tr><th>Published?</th><td>";

if ($publish=='Y') {echo "Published to live website?: <select name=publish><option value=Y selected>published</option><option value=N>not published</option></select>\n";

} else if ($publish=='N'|| $publish=='') {echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N selected>not published</option></select>\n";

} else {  echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N>not published</option></select><BR>\n";}


echo "</td></tr>";




echo "<tr><th>Members-Only?</th><td>";

if ($evt_type=='1') {echo "Members-only?: <select name=evt_type><option value=1 selected>members-only</option><option value=0>PUBLIC, open to all</option></select>\n";

} else if ($evt_type=='0' || $evt_type=='') {echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0 selected>PUBLIC, open to all</option></select>\n";

} else {  echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0>PUBLIC, open to all</option></select><BR>\n";}


echo "</td></tr>";

echo "<tr><td>Tags:</td><td><input type=text name=tags value='$tags'></td></tr>";echo "<tr><td colspan=2><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";

}

?><input type=submit name="update" value="UPDATE record"></form>


<? include ("../adminfooter.php"); ?>

<? }
 ?>