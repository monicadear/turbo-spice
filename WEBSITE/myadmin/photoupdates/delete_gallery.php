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

<table border=0>

<?
$submit=$_POST['submit'];




$pid=$_POST['pid'];


 ?>



<? echo "<form method='post' action='delete_gallery_handler.php'>"; ?> 

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
 
echo "<tr><th width=50>Title: </th><td>$row->title";
    echo "<tr><th width=50>Text</th><td>";
    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";

echo "<tr><th>Pictures, if any:</th>";
echo "<td>";

echo "<img src=/photogallery/$picture1 width=150 border=1>";


if (isset($picture2) && $picture2 !=="") {
echo "<img src=/photogallery/$picture2 width=150 border=1>";
} else { echo ""; }


if (isset($picture3) && $picture3 !=="") {
echo "<img src=/photogallery/$picture3 width=150 border=1>";
} else { echo ""; }

if (isset($picture4) && $picture4 !=="") {
echo "<img src=/photogallery/$picture4 width=150 border=1>";
} else { echo ""; }

if (isset($picture5) && $picture5 !=="") {
echo "<img src=/photogallery/$picture5 width=150 border=1>";
} else { echo ""; }

if (isset($picture6) && $picture6 !=="") {
echo "<img src=/photogallery/$picture6 width=150 border=1>";
} else { echo ""; }

if (isset($picture7) && $picture7 !=="") {
echo "<img src=/photogallery/$picture7 width=150 border=1>";
} else { echo ""; }

if (isset($picture8) && $picture8 !=="") {
echo "<img src=/photogallery/$picture8 width=150 border=1>";
} else { echo ""; }






echo "</td></tr>";

$pid = $row->pid;





}

echo "<tr><td colspan=2><br><input type=hidden name='pid' value='$pid'>";
echo "<input type=hidden name='picture1' value='$picture1'>";

echo "</td></tr></table><p>";
?>

Delete this GALLERY??? <input type=submit name="delete" value="DELETE gallery"> <span class=red>CAREFUL!</span>
</form>



<? include ("../adminfooter.php"); ?>

<? }
?>