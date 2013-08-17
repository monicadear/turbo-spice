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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("downloads_nav.php"); ?><h1>Admin: Upload Content Edit</h1><p><B>You may review these main uploaded files within the site.</B></p>

<table border=1 width=100%>
<tr>
<td width=10%><a href="viewall.php?sort=title&lastsort=<?echo"$sort"?>">Title</a></td><td>ID1</td>
<td width=10%><a href="viewall.php?sort=title&lastsort=<?echo"$sort"?>">Title</a></td><td width=10%><a href="viewall.php?sort=category&lastsort=<?echo"$sort"?>">Category</a></td><td><a href="viewall.php?sort=description&lastsort=<?echo"$sort"?>">Description</a></td><td width=10%><a href="viewall.php?sort=dateupdated&lastsort=<?echo"$sort"?>">Last Updated</a></td><td>Info</td>
<td>Live?</td>
<td>Members?</td>
<td></td>
<td></td>
</tr><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 





if (empty($sort)) { $sort='id'; $lastsort='id'; } 
$query= "SELECT * FROM downloads order by $sort"; 

if (empty($lastsort)) {	$query = $query; }	else if ( $lastsort == $sort ) { $query = $query . ' DESC'; }	else { $query = $query . ', ' . $lastsort; }



$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $category=$myrow["category"];                   $subcategory=$myrow["subcategory"];                   $title=$myrow["title"];                   $text=$myrow["text"];
                   $aut_id=$myrow["aut_id"];                   $filename=$myrow["filename"];                   $url=$myrow["url"];                   $dateupdated=$myrow["dateupdated"];                   $publish=$myrow["publish"];                   $evt_type=$myrow["evt_type"];$pos = strpos($text,"&lt;BR&gt;"); $preview = substr($text,0,$pos-1); 

$filenametoshow = substr("$filename", -3, 3);

$transurl["http://"] = "";
$url = strtr($url, $transurl);

$filedownshow = substr("$filename", 0, 55);
echo "<tr";
if ($publish==Y) {
echo " bgcolor=#CCFFCC";
}
echo ">";

echo "<td width=10%><b>$id $title:</b></td>";

echo "<td>$aut_id</td>";
echo "<td>";

if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG" )
{
echo "<a href=/downloads/$filename><img src=/downloads/$filename width=150 border=0 alt=image></a>";
}

else {
echo "<a href=/downloads/$filename class=smaller>$filedownshow</a>";
}


echo "</td>\n";

echo "<td>";


if (isset($category) && $category !=="") {
include("../../codes/adminconfig.php");include("producttypelist_type.php");}

else {
echo "TO BE ASSIGNED.";
}



echo "</td>";
echo "<td><span class=smalladmintext>$preview</span></td>\n";echo "<td><span class=smalladminauthortext>";print theDate ("d F Y","$dateupdated"); echo "</span></td>";
echo "<td>";

if (isset($url) && $url !== "") {
echo "<a href=http://$url target=new>(check link)</a><BR><BR>";


if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG" )

{
echo "<span class=linkbrown>COPY AND PASTE:</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=http://$url target=new><img src=$websitefullurl/downloads/$filename border=0 alt=image hspace=5></a></textarea>";
}


else if ($filenametoshow == "pdf" || $filenametoshow == "PDF") {
echo "<span class=linkbrown>COPY AND PASTE:</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=http://$url target=new>$title, PDF</a></textarea>";
}


else {
echo "<span class=linkbrown>COPY AND PASTE:</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=http://$url target=new>$title</a></textarea>";
}


}
else {
echo "<a href=$websitefullurl/downloads/$filename target=new>(check link)</a><BR><BR>";


if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG" )
{
echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><img src=$websitefullurl/downloads/$filename border=0 alt=image hspace=5></textarea>";
}


else if ($filenametoshow == "pdf" || $filenametoshow == "PDF")
{
echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=$websitefullurl/downloads/$filename target=new>$title, PDF</a></textarea>";
}


else {
echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=$websitefullurl/downloads/$filename target=new>$title</a></textarea>";
}


}


echo "</td>\n\n";


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





echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td><form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value=delete></form></td>";
echo "</tr>";



}$e++; ?></table>
<?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>