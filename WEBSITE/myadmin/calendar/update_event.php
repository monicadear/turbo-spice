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
<? include ("../../codes/adminconfig.php"); ?>

<h1>Admin: CALENDAR</h1>
$id=$_REQUEST['id'];
$subcategory= $row->subcategory;

$publish= $row->publish;
$evt_type= $row->evt_type;
$tags= $row->tags;

$website=$row->website;
$websiteshow="http://".$website;


echo "<tr><th width=50>Document Category:<BR></th><td>";
echo "<a href=../documentcategories/viewall.php target=new>view all document categories</a><BR>";

echo "<select name=category>";

echo "</td></tr>";

echo "<tr><th width=50>Document Subcategory:<BR></th><td>";
echo "<a href=../documentsubcategories/viewall.php target=new>view all document subcategories</a><BR>";

echo "<select name=subcategory>";

echo "</td></tr>";


echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title'></td></tr>";



?>

<tr><th valign=top>Description</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=60>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>


<?


echo "<tr><th width=50>Start Date: </th><td><input type=text name='startdate' value='$row->startdate'></td></tr>";



echo "<tr><th>Published?</th><td>";



} else if ($publish=='N'|| $publish=='') {

} else {  echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N>not published</option></select><BR>\n";


echo "</td></tr>";

echo "<tr><th>Members-Only?</th><td>";

if ($evt_type=='1') {

} else if ($evt_type=='0' || $evt_type=='') {

} else {  echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0>PUBLIC, open to all</option></select><BR>\n";


echo "</td></tr>";


echo "<tr><th width=50>Tags: </th><td><input type=text name='tags' value='$tags'></td></tr>";

<?



<? }
 ?>