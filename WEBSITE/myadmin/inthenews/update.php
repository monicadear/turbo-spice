<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("inthenews_nav.php"); ?>

$category = $row->category;

$title = $row->title;
$webslink = $row->webslink;

$filenametoshow = substr("$filename", -3, 3);

echo "<tr><td colspan=2><input type=hidden name=category value=2>IN THE NEWS</td></tr>";

echo "<tr><th width=50>Release Date: </th><td><input type=text name='dateofrelease' value='$row->dateofrelease' size=50></td></tr>";


echo "<tr><th width=50>Source: </th><td><input type=text name='source' value='$source' size=50></td></tr>";


echo "<tr><td colspan=2>";


if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG") {


echo "<a href=/inthenews/$filename><img src=/inthenews/$filename width=150 border=0></a>";

}


echo "</td></tr>";

if (isset($webslink) && $webslink !=="")
echo "<input type=text name='webslink' value='$webslink' size=50> <a href=http://$webslink target=new>(check link)</a>";

else {
echo "<input type=text name='webslink' value='$webslink' size=50>";
}

echo "</td></tr>";




























<?

<? include ("../adminfooter.php"); ?>

<? }
?>