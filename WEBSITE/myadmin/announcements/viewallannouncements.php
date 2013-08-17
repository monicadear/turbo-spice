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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("announcements_nav.php"); ?><h1>Admin: Edit Service Announcements</h1><p><B>You may edit these service announcement listings within the site.</B></p><table border=1>
<tr>
<th>ID</th>
<td></td>
<th>Title</th>
<th>Text</th>
<th>URL</th>
<th>Author</th>
<td>Live</td>
<td>Members-Only</td>
<td></td>
<td></td>
</tr><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM announcements order by id desc"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $date=$myrow["date"];                   $title=$myrow["title"];                   $description=$myrow["description"];                   $url=$myrow["url"];                   $aut_id=$myrow["aut_id"];                   $author=$myrow["author"];                   $picture1=$myrow["picture1"];                   $publish=$myrow["publish"];                   $evt_type=$myrow["evt_type"];$trans5["&lt;BR&gt;"]= "<BR>";
$trans5["&lt;"]= "<";$trans5["&gt;"]= ">";


$description = strtr($description,$trans5); 


$url="http://".$url;


echo "<tr";
if ($publish==Y) {
echo " bgcolor=#CCFFCC";
}
echo ">";

echo "<td valign=top>";
echo "$id</td>";

echo "<td valign=top>";if ($picture1 == ""){echo "<form method=post action=addphoto.php><input type=hidden name=id value=$id><input type=submit name=submit value='add photo'></form>\n";}else {echo "<img src=/announcementimages/$picture1 width=100 hspace=5><BR>$picture1<BR><form method=post action=addphoto.php><input type=hidden name=id value=$id><input type=submit name=submit value='change photo'></form><BR><form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit value='delete photo'></form><BR>\n";}echo "</td>\n";

echo "<td valign=top width=7%><i>$title</i></td>\n";
echo "<td valign=top width=150><span class=smalladmintext>$description...</span>\n";
echo "</td>\n\n";

echo "<td>";

if (isset($url) && $url !== "http://") {
echo "<a href=$url target=new>$url</a>";
}
else {
echo "";
}

echo "</td>";

echo "<td valign=top><span class=smalladminauthortext>$author</span>\n<BR><span class=smalladminauthortext>\n";print theDate ("d F Y","$date"); echo "</span></td>\n";


echo "<td valign=top>";
if ($publish =="Y") {
echo "<span class=green><b>$publish</b></span>"; 
} else if ($publish =="N" || $publish == null || $publish =="") {
echo "<span class=rednotlive>NOT LIVE</span>";
}

echo "</td>\n";


if ($evt_type == "1") {
echo "<td bgcolor=#FF0000 valign=top>";
echo "<span class=redbackground>MEMBERS ONLY</span><BR><img src=/images/icons/personal.gif width=20 border=0>";
}

else {
echo "<td valign=top>";
echo "<span class=blue>PUBLIC</span>";
}

echo "</td>\n";

echo "<td valign=top><form method=post action=updateannouncement.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>\n";echo "<td valign=top><form method=post action=delete_announcement.php><input type=hidden name=id value=$id><input type=submit name=submit value=delete></form></td>\n";echo "</tr>\n";
echo "\n";}$e++; ?></table>
<? include ("../adminfooter.php"); ?>

<? }
?>