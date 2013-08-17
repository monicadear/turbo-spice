<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";



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

<p>Use standard HTML tags for bold and italic.</p>
<p>
To make something bold, but &lt;b&gt; and &lt;/b&gt; around the description, like this &lt;b&gt;<b>bold</b>&lt;/b&gt;.<BR>
To make something italic, but &lt;i&gt; and &lt;/i&gt; around the description, like this &lt;i&gt;<i>italic</i>&lt;/i&gt;.</p>
<BR>
<table border=0>

<?
$submit=$_POST['submit'];




$pid=$_POST['pid'];
 ?>



<form method='post' action='update_handler.php'>

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

$title=$row->title;

$description = strtr($row->description,$trans); 
$trans4["\n"]= "";
$trans4["<BR><BR>"] = "\r\r\n";
$trans4["<BR>"] = "\r\n";
$description = strtr($description,$trans4);
$picture1=$row->picture1;
$picture2=$row->picture2;
$picture3=$row->picture3;
$picture4=$row->picture4;
$picture5=$row->picture5;
$picture6=$row->picture6;
$picture7=$row->picture7;
$picture8=$row->picture8;
$showorder=$row->showorder;
 
echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$title' size=50></td></tr>";
    echo "<tr><th width=50>Text</th><td>";
?>
<span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=7 cols=60>
    <?echo "$description";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


<?


echo "</td></tr>";

echo "<tr><th valign=top>Pictures, if any:</th><td>";

if ($picture1 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture1 width=150 border=1>";
}

echo "<input type=text name=picture1 value='$picture1'>";
/////////////////////

if ($picture2 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture2 width=150 border=1>";
}

echo "<input type=text name=picture2 value='$picture2'>";
/////////////////////

if ($picture3 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture3 width=150 border=1>";
}


echo "<input type=text name=picture3 value='$picture3'>";
/////////////////////

if ($picture4 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture4 width=150 border=1>";
}


echo "<input type=text name=picture4 value='$picture4'>";
/////////////////////

if ($picture5 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture5 width=150 border=1>";
}


echo "<input type=text name=picture5 value='$picture5'>";
/////////////////////

if ($picture6 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture6 width=150 border=1>";
}


echo "<input type=text name=picture6 value='$picture6'>";
/////////////////////

if ($picture7 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture7 width=150 border=1>";
}


echo "<input type=text name=picture7 value='$picture7'>";
/////////////////////

if ($picture8 == "")
{
echo "";
}

else {

echo "<img src=/photogallery/$picture8 width=150 border=1>";
}


echo "<input type=text name=picture8 value='$picture8'>";



echo "</td></tr>";

echo "<tr><th width=50>Photographer: </th><td><textarea name=author rows=3 cols=60>$row->author</textarea></td></tr>";
$pid = $row->pid;





}


echo "<tr><th width=50>Order (list a number from 1 - 100, 1 will show higher than 100): </th><td><input type=text name='showorder' value='$showorder' size=50></td></tr>";

echo "<tr><td colspan=2><br><input type=hidden name='pid' value='$pid'>";

echo "</td></tr></table><p>";
?>

<input type=submit name="update" value="UPDATE record">
</form>

<? include ("../adminfooter.php"); ?>

<? }
?>