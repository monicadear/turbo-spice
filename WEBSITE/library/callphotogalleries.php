

<?

 include ("../codes/adminconfig.php"); $db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$query= "SELECT * FROM allphotosextended order by showorder asc"; 

$sql_result = mysql_query($query, $connection) or die ("Go to the <a href=/>homepage</a>.<BR>"); 

$d=1;
while ($myrow = mysql_fetch_array($sql_result)){                    $pid=$myrow["pid"];	                   $titlepg=$myrow["title"];                   $textpg=$myrow["description"];                   $picture1pg=$myrow["picture1"];                   $thumbnailpg=$myrow["thumbnail"];$transpg["&amp;"] = "&"; $transpg["&#039;"] = "'";$transpg["&lt;"] = "<";$transpg["&gt;"] = ">";$transpg["\n"] = "<BR>";$textpg = strtr($textpg,$transpg); $textpg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $textpg);$textpg = ereg_replace("\r\n", "\n<BR>", $textpg);$titlepg=html_entity_decode("$titlepg", ENT_NOQUOTES);$trans5[" "] = "_"; $trans5["'"] = "_";$trans5["&quote;"] = "_";$nametopass = strtr($titlepg,$trans5); $photogallerynametopass="Website".$pid;

echo "<div id=photogalleryitem>";
echo "<h3>$titlepg</h3>\n";


if ($thumbnailpg=="" || $thumbnailpg==null) {echo "<a href=photogallery.php?pid=$pid><img src=/photogallery/imgcomingsoon.jpg width=100 border=1 align=left hspace=5></a>";} else {echo "\n<a href=photogallery.php?pid=$pid><img src=/thumbs/$thumbnailpg width=95 border=1 name='gallery_main' align=left hspace=5></a>";}


echo "$textpg<BR></div><BR>\n";


echo "<hr width=80%>";
echo "<BR>";

$d++;

}


?>




