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
<? include ("announcements_nav.php"); ?>
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
</tr>
$trans5["&lt;"]= "<";


$description = strtr($description,$trans5); 


$url="http://".$url;


echo "<tr";
if ($publish==Y) {
echo " bgcolor=#CCFFCC";
}
echo ">";

echo "<td valign=top>";
echo "$id</td>";

echo "<td valign=top>";

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

echo "<td valign=top><span class=smalladminauthortext>$author</span>\n<BR><span class=smalladminauthortext>\n";


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

echo "<td valign=top><form method=post action=updateannouncement.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>\n";
echo "\n";


<? }
?>