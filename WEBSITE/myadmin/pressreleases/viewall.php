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
<? include ("pressreleases_nav.php"); ?>


<table border=1 bordercolor=#CCCCCC cellspacing=0 cellpadding=0>
<?



$filenametoshow = substr("$filename", -3, 3);

$transwebslink["http://"] = "";
$webslink = strtr($webslink, $transwebslink);


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
echo "<td><span class=smalladmintext>$preview</span></td>\n";
echo "<span class=smalladminauthortext>$author</span>\n<BR><BR>";
echo "<span class=smalladminauthortext>Date of Release: ";
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
echo "</tr>";





<? }
?>