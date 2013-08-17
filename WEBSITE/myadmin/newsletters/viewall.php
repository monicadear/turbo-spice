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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("newsletters_nav.php"); ?><h1>Admin: Upload NEWSLETTERS</h1><p><B>You may review these newsletters within the site. Items display from highest "display order" to lowest "display order"</B></p>

<table border=1 width=100%><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM newsletters order by showorder desc"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $date=$myrow["date"];                   $title=$myrow["title"];                   $text=$myrow["text"];                   $filename=$myrow["filename"];                   $thumbnail=$myrow["thumbnail"];                   $author=$myrow["author"];                   $showorder=$myrow["showorder"];

$filenametoshow = substr("$filename", -3, 3);

$transurl["http://"] = "";
$url = strtr($url, $transurl);

echo "<tr>";
echo "<td width=20%><b>$id $title:</b></td>";
echo "<td>";

echo "<a href=/newsletters/$filename>$filename</a><BR>";

echo "<a href=upload.php?id=$id>upload the newsletter file</a><BR>";



echo "</td>\n";
echo "<td><span class=smalladmintext>$text</span></td>\n";echo "<td><span class=smalladminauthortext>uploaded by: $author</span>\n<BR><span class=smalladminauthortext>";print theDate ("d F Y","$date"); echo "</span></td>";

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



}$e++; ?></table><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>