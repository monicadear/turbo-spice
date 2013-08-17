<BR>
<?

include ("../codes/adminconfig.php");$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM pressreleases order by showorder asc"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $datedown=$myrowdown["dateofrelease"];                   $titledown=$myrowdown["title"];                   $textdown=$myrowdown["text"];                   $urldown=$myrowdown["webslink"];                   $filenamedown=$myrowdown["newname"];                   $authordown=$myrowdown["author"];$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&quot;"] = "'";$textdown = strtr($textdown,$trans); $transurl["http://"] = "";$urldown = strtr($urldown, $transurl);

$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);



$filenametoshow = substr("$filenamedown", -3, 3);if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow=="GIF"){echo "<a href=http://$urldown><img src=/pressreleases/$filenamedown alt='$titledown' border=0 width=150 align=left></a>";}else if ($filenametoshow == "pdf" || $filenametoshow == "PDF")
{echo "<a href=/pressreleases/$filenamedown alt='$titledown'><img src=/images/pdficon.gif border=0 alt=PDF hspace=5>View download...</a><BR>";}

else 
{echo "";}

echo "<a href=/pages/main.php?pageid=101#$iddown>$titledown</a><BR>";echo "<BR>";
}
echo "<BR>";$t++; echo "<BR>";