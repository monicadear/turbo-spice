<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->userlevel >=9){

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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("newsletters_nav.php"); ?>



$filenametoshow = substr("$filename", -3, 3);

$transurl["http://"] = "";
$url = strtr($url, $transurl);


echo "<td width=20%><b>$id $title:</b></td>";
echo "<td>";

echo "<a href=/newsletters/$filename>$filename</a><BR>";

echo "<a href=upload.php?id=$id>upload the newsletter file</a><BR>";



echo "</td>\n";
echo "<td><span class=smalladmintext>$text</span></td>\n";

echo "<td>display order: $showorder</td>";


echo "<td>";

if (isset($thumbnail) && $thumbnail !== "") {
echo "$thumbnail<BR>\n";
echo "<a href=/newsletters/thumbnails/$thumbnail><img src=/newsletters/thumbnails/$thumbnail border=0 alt=thumbnail height=100></a><BR>";
echo "<form method=post action=delete_thumb.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value=delete></form><BR>";
}

echo "<a href=uploadthumb.php?id=$id>edit thumbnail</a><BR>";

echo "</td>\n\n";



echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td><form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value=delete></form></td>";
echo "</tr>";



}

<? }
?>