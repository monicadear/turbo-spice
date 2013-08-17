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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("calendar_nav.php"); ?>

<h1>Admin: CALENDAR</h1><BR><table border=0 cellpadding=2 cellspacing=0 width="100%"><? echo "<form method='post' action='update_handler_event.php'>"; ?> <?
$id=$_REQUEST['id'];$db = "calendar";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$description = strtr($row->description,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\n\r\n";$trans4["<BR>"] = "\r\n";$description = strtr($description,$trans4); $category= $row->category;
$subcategory= $row->subcategory;

$publish= $row->publish;
$evt_type= $row->evt_type;
$tags= $row->tags;

$website=$row->website;
$websiteshow="http://".$website;


echo "<tr><th width=50>Document Category:<BR></th><td>";
echo "<a href=../documentcategories/viewall.php target=new>view all document categories</a><BR>";

echo "<select name=category>";include("../../codes/adminconfig.php");include("producttypelist_category.php");echo "</select><BR>\n";

echo "</td></tr>";
 
echo "<tr><th width=50>Document Subcategory:<BR></th><td>";
echo "<a href=../documentsubcategories/viewall.php target=new>view all document subcategories</a><BR>";

echo "<select name=subcategory>";include("../../codes/adminconfig.php");include("producttypelist_subcategory.php");echo "</select><BR>\n";

echo "</td></tr>";


echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title'></td></tr>";



?>

<tr><th valign=top>Description</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=60>    <?echo "$description";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>


<?


echo "<tr><th width=50>Start Date: </th><td><input type=text name='startdate' value='$row->startdate'></td></tr>";echo "<tr><th width=50>End Date: </th><td><input type=text name='enddate' value='$row->enddate'></td></tr>";echo "<tr><th width=50>Start Time: </th><td><input type=text name='starttime' value='$row->starttime'></td></tr>";echo "<tr><th width=50>End Time: </th><td><input type=text name='endtime' value='$row->endtime'></td></tr>";echo "<tr><th width=50>Location: </th><td><input type=text name='location' value='$row->location'></td></tr>";echo "<tr><th width=50>Price: </th><td>$<input type=text name='price' value='$row->price'></td></tr>";echo "<tr><th width=50>Price Non-members: </th><td>$<input type=text name='pricenonmembers' value='$row->pricenonmembers'></td></tr>";echo "<tr><th width=50>Contact: </th><td><input type=text name='contact' value='$row->contact'></td></tr>";echo "<tr><th width=50>Website: </th><td><input type=text name='website' value='$websiteshow'></td></tr>";



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
$id = $row->id;}

echo "<tr><th width=50>Tags: </th><td><input type=text name='tags' value='$tags'></td></tr>";echo "<tr><td colspan=2><input type=hidden name='id' value='$id'>";echo "</td></tr></table>";?><input type=submit name="update" value="UPDATE record"></form>

<?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>