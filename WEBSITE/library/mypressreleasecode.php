<BR>
<?

include ("../codes/adminconfig.php");$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM pressreleases order by showorder asc"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $datedown=$myrowdown["dateofrelease"];                   $titledown=$myrowdown["title"];                   $textdown=$myrowdown["text"];                   $urldown=$myrowdown["webslink"];                   $filenamedown=$myrowdown["newname"];                   $authordown=$myrowdown["author"];$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&quot;"] = "'";$textdown = strtr($textdown,$trans); $transurl["http://"] = "";$urldown = strtr($urldown, $transurl);

$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);



$filenametoshow = substr("$filenamedown", -3, 3);if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow=="GIF" || $filenametoshow == "png" || $filenametoshow == "PNG"){echo "<a href=http://$urldown><img src=/pressreleases/$filenamedown alt='$titledown' border=0 width=150 align=left></a>";}else if ($filenametoshow == "pdf" || $filenametoshow == "PDF")
{echo "<a href=/pressreleases/$filenamedown alt='$titledown'><img src=/images/pdficon.gif border=0 alt=PDF hspace=5>View download...</a><BR>";}

else 
{echo "";}
echo "<a name=$iddown></a><i>posted $showdatemonthc.$showdatedayc.$showdateyearc</i><BR>\n";

echo "<BR>";

echo "Contact: $authordown<BR>";
echo "<BR>";

echo "<b>$titledown</b><BR>";echo "$textdown\n";if (isset($urldown) && $urldown !== "") {echo "<a href=http://$urldown class=heavy>$urldown</a><BR>";}else {echo "<BR>";}echo "<BR clear=all>";

echo "<div align=center>";echo "###";
echo "<hr>";
echo "</div>";}$t++; echo "<BR>";