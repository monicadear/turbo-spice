<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("productsmall_nav.php"); ?>



$moreinfo = strtr($moreinfo,$trans4);

$price = $row->price;
$filename = $row->filename;
$filename2 = $row->filename2;
$webslink = $row->webslink;
$showorder = $row->showorder;

$filenametoshow = substr("$filename", -3, 3);
$filenametoshow2 = substr("$filename2", -3, 3);


echo "<tr><td colspan=2>";


if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG") {


echo "<a href=/productsmall/$filename><img src=/productsmall/$filename width=150 border=0></a>";

}


echo "</td></tr>";

echo "<tr><th width=50>Filename: </th><td>$filename2 <input type=hidden name=filename2 value='$filename2'></td></tr>";
echo "<tr><td colspan=2>";


if ($filenametoshow2 == "jpg" || $filenametoshow2 == "gif" || $filenametoshow2 == "JPG" || $filenametoshow2 == "GIF" || $filenametoshow2 == "png" || $filenametoshow2 == "PNG") {


echo "<a href=/productsmall/$filename2><img src=/productsmall/$filename2 width=150 border=0></a>";

}


echo "</td></tr>";



    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=10 cols=50>";

    echo "<tr><th width=50>More info</th><td><textarea name='moreinfo' rows=10 cols=50>";


echo "<tr><th width=50>Price: </th><td>$<input type=text name='price' value='$price' size=50></a></td></tr>";

echo "<tr><th width=50>URL: </th><td><input type=text name='webslink' value='$webslink' size=50> <a href=http://$webslink target=new>(check link)</a></td></tr>";

<? }
?>