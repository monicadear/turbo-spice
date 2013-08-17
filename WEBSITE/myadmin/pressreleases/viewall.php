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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?><h1>Admin: View Press Releases</h1><p><B>You may review these main Press Releases within the site.</B></p>


<table border=1 bordercolor=#CCCCCC cellspacing=0 cellpadding=0>
<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM pressreleases order by id desc"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];
                   $datecreated=$myrow["datecreated"];                   $dateofrelease=$myrow["dateofrelease"];                   $category=$myrow["category"];                   $title=$myrow["title"];                   $text=$myrow["text"];                   $filename=$myrow["filename"];                   $webslink=$myrow["webslink"];                   $author=$myrow["author"];                   $showorder=$myrow["showorder"];$pos = strpos($text,"&lt;BR&gt;"); $preview = substr($text,0,$pos-1); 

$filenametoshow = substr("$filename", -3, 3);

$transwebslink["http://"] = "";
$webslink = strtr($webslink, $transwebslink);

echo "<tr>";
echo "<td width=20%><b>$id $title:</b></td>";
echo "<td>";

if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG" )
{
echo "<a href=/pressreleases/$filename><img src=/pressreleases/$filename width=150 border=0 alt=image></a><BR>";
echo "<a href=editfile.php?id=$id>edit file</a><BR>";
echo "<form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value='delete file'></form><BR>";
}

else if (isset ($filenametoshow) && $filenametoshow !=="") {
echo " <a href=/pressreleases/$filename>$filename</a><BR>";
echo "<a href=editfile.php?id=$id>edit file</a><BR>";
echo "<form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value='delete file'></form><BR>";
}

else {
echo "<a href=editfile.php?id=$id>add file</a>";
}

echo "</td>\n";
echo "<td><span class=smalladmintext>$preview</span></td>\n";echo "<td>";
echo "<span class=smalladminauthortext>$author</span>\n<BR><BR>";
echo "<span class=smalladminauthortext>Date of Release: ";print theDate ("d F Y","$dateofrelease"); echo "</span><BR>";
echo "";
echo "</td>";
echo "<td>";

if (isset($webslink) && $webslink !== "") {
echo "<a href=http://$webslink target=new>(check link)</a><BR><BR>";


	if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG" )
		{
	echo "<span class=linkbrown>COPY AND PASTE:</span><BR>\n";
	echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><img src=$websitefullurl/pressreleases/$filename border=0 width=150 align=left alt=image></textarea>";
		}

	else {
	echo "<span class=linkbrown>COPY AND PASTE:</span><BR>\n";
	echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=http://$webslink>$title</a></textarea>";
		}

}

else {
echo "<a href=$websitefullurl/pressreleases/$filename target=new>(check link)</a><BR><BR>";


if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow == "GIF" )
{
echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=$websitefullurl/pressreleases/$filename><img src=$websitefullurl/pressreleases/$filename border=0 width=150 align=left alt=image></a></textarea>";
}

else {
echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=$websitefullurl/pages/main.php?pageid=74&pagecategory=2#$id target=new>$title</a></textarea>";
}


}


echo "</td>\n\n";

echo "<td>category: $category</td>";

echo "<td>$showorder</td>";


echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td><form method=post action=delete_pressrelease.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value=delete></form></td>";
echo "</tr>";}$e++; ?>

</table>

<?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>