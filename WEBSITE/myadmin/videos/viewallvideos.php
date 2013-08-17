<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("videocontent_nav.php"); ?><h1>Admin: Video Link Content Edit</h1><p><B>You may edit these main videos within the site.</B></p>
<table border=1 bordercolor=#CCCCCC cellspacing=0 cellpadding=0><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM videocategory order by categoryid"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	
echo "<tr><td colspan=7><h1>$cattitle</h1></td></tr>";
?>

<?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM videos where category=$categoryid order by showorder"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $date=$myrow["date"];                   $category=$myrow["category"];                   $subcategory=$myrow["subcategory"];                   $title=$myrow["title"];                   $text=$myrow["text"];                   $author=$myrow["author"];                   $picture1=$myrow["picture1"];                   $weblink=$myrow["weblink"];$pos = strpos($text,"&lt;BR&gt;&lt;BR&gt;"); $preview = substr($text,0,$pos-1); $trans5["&lt;b&gt;"]= "<b>";$trans5["&lt;/b&gt;"]= "</b>";$trans5["&lt;i&gt;"]= "<i>";$trans5["&lt;/i&gt;"]= "</i>";$trans5["&lt;BR&gt;"]= "<BR>";$preview = strtr($preview,$trans5);

$webdisplaylinkh="http://".$weblink;


$translinkliteration["watch?v="] = "v/";
$weblinkvideos = strtr($weblink, $translinkliteration);
$weblinkvideosshow = "http://"."".$weblinkvideos;

echo "<tr>";
echo "<td>$id</td>";

echo "<td></td>";

echo "<td width=20%><span class=smalladmintext><b>$title</b></span></td>\n";if ($picture1 == ""){echo "<td><form method=post action=addphotor.php><input type=hidden name=id value=$id><input type=submit name=submit value='add photo'></form></td>";}else {echo "<td><img src=/videoimages/$picture1 width=100 hspace=5><BR><form method=post action=addphotor.php><input type=hidden name=id value=$id><input type=submit name=submit value='change photo'></form><BR><form method=post action=delete_picturer.php><input type=hidden name=id value=$id><input type=submit name=submit value='delete photo'></form><BR></td>";}echo "<td><span class=smalladmintext><a href=$webdisplaylinkh target=new>$webdisplaylinkh</a><BR>$preview</span>";echo "</td>\n";echo "<td><span class=smalladminauthortext>$author</span>\n<BR><span class=smalladminauthortext>";print theDate ("d F Y","$date"); echo "</span></td>";

echo "<td>";

echo "<object width=322 height=266><param name=movie value='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0'></param><param name=allowFullScreen value=true></param><param name=allowScriptAccess value=always></param><embed src='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0' type=application/x-shockwave-flash allowfullscreen=true allowScriptAccess=always width=322 height=266></embed></object>";


echo "</td>";
echo "<td><form method=post action=updater.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form><form method=post action=deleter.php><input type=hidden name=id value=$id><input type=submit name=submit value=delete></form></td>";echo "</tr>";}$e++; ?>


<?
}
$g++;
?>


</table>


<hr>
<span class=red>NOT CATEGORIZED!</span><BR>

<? include ("../../codes/adminconfig.php"); ?><?$dbnot = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querynot= "SELECT * FROM videos where category=''  order by title"; $sql_resultnot = mysql_query($querynot, $connection) or die ("Couldn't execute query. Please try again later"); $z=0;while ($myrownot = mysql_fetch_array($sql_resultnot)){                    $idnot=$myrownot["id"];		                   $titlenot=$myrownot["title"];                   $weblinknot=$myrownot["weblink"];
echo "$titlenot: ";
echo "<a href=$weblinknot target=new>$weblinknot</a> ";
echo "<form method=post action=updater.php><input type=hidden name=id value=$idnot><input type=submit name=submit value=update></form><form method=post action=deleter.php><input type=hidden name=id value=$id><input type=submit name=submit value=delete></form><BR>";

}
$z++;
?>

<?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>