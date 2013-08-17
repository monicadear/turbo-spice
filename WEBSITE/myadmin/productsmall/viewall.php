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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("productsmall_nav.php"); ?><h1>Admin: Product Inventory Edit</h1><p><B>You may review these main products within the site.</B></p>

<table border=1 width=100%><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM productsmall order by showorder"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $date=$myrow["date"];                   $title=$myrow["title"];                   $title2=$myrow["title2"];                   $creator=$myrow["creator"];                   $text=$myrow["text"];                   $moreinfo=$myrow["moreinfo"];                   $price=$myrow["price"];                   $filename=$myrow["filename"];                   $filename2=$myrow["filename2"];                   $webslink=$myrow["webslink"];                   $author=$myrow["author"];                   $showorder=$myrow["showorder"];
$transpg["&amp;"] = "&"; 
$transpg["&#039;"] = "'";
$transpg["&lt;"] = "<";
$transpg["&gt;"] = ">";


$text = strtr($text,$transpg); 
$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);
$text = ereg_replace("\r\n", "\n<BR>", $text);


$moreinfo = strtr($moreinfo,$transpg); 
$moreinfo = ereg_replace("\r\n\r\n", "\n<BR><BR>", $moreinfo);
$moreinfo = ereg_replace("\r\n", "\n<BR>", $moreinfo);




$filenametoshow = substr("$filename", -3, 3);

$filenametoshow2 = substr("$filename2", -3, 3);

$transwebslink["http://"] = "";
$webslink = strtr($webslink, $transwebslink);

echo "<tr>";
echo "<td><b>$id</b></td>";
echo "<td>$title</td>";
echo "<td>$title2</td>";
echo "<td>$creator</td>";
echo "<td><b>$$price:</b></td>";
echo "<td>";

if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG" )
{
echo "<a href=/productsmall/$filename><img src=/productsmall/$filename width=150 border=0 alt=image></a>";
}

else {
echo "$filename";
}

echo "<BR><a href=editfile.php?id=$id>edit file</a><BR>";
echo "<BR><a href=delete_picture.php?id=$id>delete file</a><BR>";



if ($filenametoshow2 == "jpg" || $filenametoshow2 == "JPG" || $filenametoshow2 == "gif" || $filenametoshow2 == "GIF" || $filenametoshow2 == "png" || $filenametoshow2 == "PNG" )
{
echo "<a href=/productsmall/$filename2><img src=/productsmall/$filename2 width=150 border=0 alt=image></a>";
}

else {
echo "$filename2";
}

echo "<BR><a href=editfile2.php?id=$id>edit 2nd file</a>";
echo "<BR><a href=delete_picture2.php?id=$id>delete 2nd file</a><BR>";




echo "</td>\n";
echo "<td><span class=smalladmintext>$text</span><BR><BR>
<b>Additional information:</b> <span class=smalladmintext>$moreinfo</span></td>\n";echo "<td><span class=smalladminauthortext>$author</span>\n<BR><span class=smalladminauthortext>";print theDate ("d F Y","$date"); echo "</span></td>";
echo "<td>";

	if (isset($webslink) && $webslink !== "") {

	echo "<a href=http://$webslink target=new>http://$webslink</a><BR><BR>";


	echo "<span class=linkbrown>COPY AND PASTE:</span><BR>\n";
	echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=http://$webslink>$title</a></textarea>";


}  /// if there is no webslink item

else {
echo "<a href=$websitestorelink target=new>(check link)</a><BR><BR>";

	echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=$websitestorelink><img src=$websitefullurl/productsmall/$filename border=0 width=150 alt=image></a></textarea>";

}


echo "</td>\n\n";


echo "<td>order: $showorder</td>";

echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td><form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value=delete></form></td>";
echo "</tr>";



}$e++; ?></table><?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>