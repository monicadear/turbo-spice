<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->isAdmin()){
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
<? include ("faqs_nav.php"); ?>

$category = $row->category;

$filename = $row->filename;
$weblink = $row->weblink;

$filenametoshow = substr("$filename", -3, 3);


echo "<tr><td colspan=2>";


if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG") {


echo "<a href=/faqs/$filename><img src=/faqs/$filename width=150 border=0></a>";

}


echo "</td></tr>";

if (isset($weblink) && $weblink !=="")
echo "<input type=text name='weblink' value='$weblink' size=50> <a href=http://$weblink target=new>(check link)</a>";

else {
echo "<input type=text name='weblink' value='$weblink' size=50>";
}

echo "</td></tr>";




echo "<tr><th width=50>Category:<BR></th>";
echo "<td>";

if (isset($category) && $category !=="") {

echo "<select name=category>";

}

else {
echo "<input type=text name='category' value='$category' size=50>";
}
echo " <a href=../faqcategories/viewall.php target=new>(show categories)</a>";
echo "</td></tr>";





















echo "<tr><td>Display Order</td><td><input type=text name='showorder' value='$showorder'></td></tr>";



<?


<? }
?>