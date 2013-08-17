<BR>
<div id=additionalcontent>
<ul><?$dbdowndisp = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

if ($session->userlevel>="2"){$querydowndisp= "SELECT id, title, evt_type FROM downloads where publish='Y' order by id desc";

 }
else {
$querydowndisp= "SELECT id, title, evt_type FROM downloads where publish='Y' and evt_type='0' order by id desc";
 
}


$sql_resultdowndisp = mysql_query($querydowndisp, $connection) or die ("Couldn't execute query. Please try again later"); $x=0;while ($myrowdowndisp = mysql_fetch_array($sql_resultdowndisp)){                    $iddowndisp=$myrowdowndisp["id"];					   $titledowndisp=$myrowdowndisp["title"];		$evt_type_disp=$myrowdowndisp["evt_type"];                  

$keywords=$_REQUEST['keywords'];

if (isset($keywords) && $keywords !=="") {

$string = "<span class=redbackground>".$keywords."</span>";

$titledowndisp = ereg_replace($keywords,$string, $titledowndisp);
}
else {
}



echo "<li>";
if ($evt_type_disp=="1") {
echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 
}

echo "$titledowndisp <a href=#$iddowndisp>link</a>";
echo "<BR></li>\n\n";



}$x++; ?></ul><BR>

<table border=1 cellspacing=2 cellpadding=1>

<tr>
<td>Type</td>
<td><a href="<?echo "$PHP_SELF?pageid=$pageid&orderitem=title&lastorderitem=$orderitem";?>">Title</a></td>
<td><a href="<?echo "$PHP_SELF?pageid=$pageid&orderitem=dateupdated&lastorderitem=$orderitem";?>">Date Updated</a></td>
</tr>

<?$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


if (empty($orderitem)) { $orderitem='id desc'; }

if ($session->userlevel>="2"){$querydown= "SELECT * FROM downloads where publish='Y' order by $orderitem"; 
	if (empty($lastorderitem)) {	$query = $query; }	else if ( $lastorderitem == $orderitem ) { $query = $query.' DESC'; }	else { $query = $query .', '.$lastorderitem; }


}

else {
$querydown= "SELECT * FROM downloads where publish='Y' and evt_type=0 order by $orderitem"; 
	if (empty($lastorderitem)) {	$query = $query; }	else if ( $lastorderitem == $orderitem ) { $query = $query.' DESC'; }	else { $query = $query .', '.$lastorderitem; }

}

$sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $category=$myrow["category"];                   $subcategory=$myrow["subcategory"];
                   $titledown=$myrowdown["title"];                   $textdown=$myrowdown["text"];                   $filedown=$myrowdown["filename"];
                   $url=$myrowdown["url"];                   $dateupdated=$myrowdown["dateupdated"];		$evt_type=$myrowdown["evt_type"];

$trans["&lt;"] = "<";$trans["&gt;"] = ">";
$textdown = strtr($textdown,$trans); 



$filedownshow = substr("$filedown", 0, 75);


$filetoshow = substr("$filedown", -3, 3);

if ($filetoshow == "jpg" || $filetoshow == "gif" || $filetoshow == "JPG" || $filetoshow == "GIF" ) {
$imagetype="imageicon.gif";
}

else if ($filetoshow == "pdf" || $filetoshow == "PDF") {
$imagetype="pdficon.gif";
}

else if ($filetoshow == "ppt" || $filetoshow == "PPT") {
$imagetype="ppticon.gif";
}


else if ($filetoshow == "doc" || $filetoshow == "DOC") {
$imagetype="wordicon.gif";
}

else {
$imagetype = "standardicon.gif";
}




$keywords=$_REQUEST['keywords'];
if (isset($keywords) && $keywords !=="") {
$string = "<span class=redbackground>".$keywords."</span>";

$titledown = ereg_replace($keywords,$string, $titledown);
$textdown = ereg_replace($keywords,$string, $textdown);
}
else {
}



  echo ($t % 2) ? "<tr>" : "<tr bgcolor=\"FFFFCC\">";	

echo "<td valign=top>";
echo "<a name=$iddown></a>\n";

if (isset($filedown) && $filedown !== "") {
echo "<a href=/downloads/$filedown>";
echo "<img src=/images/$imagetype border=0 width=20 alt='$titledown' hspace=3>\n";
echo "</a>\n";
}

else {
echo "\n";
}

echo "</td>";


echo "<td valign=top width=150>";


if ($evt_type == "1") {
echo "<img src=/images/icons/personal.gif border=0 width=15 hspace=3 align=left> ";
}


echo "<h2>$titledown</h2>\n";
echo "$textdown<BR><BR>\n";

echo "<a href=/downloads/$filedown><img src=/images/icons/download.gif align=left valign=middle hspace=3 border=0 width=30></a>";
echo "<a href=/downloads/$filedown class=smallestsmall>$filedownshow</a>\n";

echo "</td>";



echo "<td valign=top width=75>";
echo "<span class=lastupdated>Last updated: ";
print theDate ("d F Y","$dateupdated"); echo "\n\n";

echo "</td></tr>";

echo "<!-- --------------- -->\n\n";
$t++; 

}?>

</table>

 </div>