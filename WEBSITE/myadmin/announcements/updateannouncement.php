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
<? include ("announcements_nav.php"); ?>
<h1>Update this Announcement</h1>

<?

$description = strtr($row->description,$trans); 

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

<textarea name='description' id='description' rows=10 cols=60>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>




<?

echo "<tr><th width=50>Author: </th><td>$session->username <input type=hidden name='author' value='$session->username' size=50></td></tr>";




echo "<tr><th>Published?</th><td>";



} else if ($publish=='N'|| $publish=='') {

} else {  echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N>not published</option></select><BR>\n";


echo "</td></tr>";




echo "<tr><th>Members-Only?</th><td>";



} else if ($evt_type=='0' || $evt_type=='') {

} else {  echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0>PUBLIC, open to all</option></select><BR>\n";


echo "</td></tr>";

echo "<tr><td>Tags:</td><td><input type=text name=tags value='$tags'></td></tr>";

}

?>




<? }
 ?>