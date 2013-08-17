<BR><BR>
<?

include ("../codes/adminconfig.php");$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM inthenews order by dateofrelease desc"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $datedown=$myrowdown["dateofrelease"];                   $titledown=$myrowdown["title"];                   $textdown=$myrowdown["text"];                   $sourcedown=$myrowdown["source"];                   $urldown=$myrowdown["webslink"];                   $filenamedown=$myrowdown["newname"];                   $authordown=$myrowdown["author"];$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&quot;"] = "'";$textdown = strtr($textdown,$trans); $transurl["http://"] = "";$urldown = strtr($urldown, $transurl);

$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);


$transdatesm["01"] = " January "; $transdatesm["02"] = " February "; $transdatesm["03"] = " March "; $transdatesm["04"] = " April "; $transdatesm["05"] = " May "; $transdatesm["06"] = " June "; $transdatesm["07"] = " July "; $transdatesm["08"] = " August "; $transdatesm["09"] = " September "; $transdatesm["10"] = " October "; $transdatesm["11"] = " November "; $transdatesm["12"] = " December "; $showdatemonthc = strtr($showdatemonthc, $transdatesm);



$filenametoshow = substr("$filenamedown", -3, 3);if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow=="GIF" || $filenametoshow == "png" || $filenametoshow == "PNG"){echo "<a href=http://$urldown><img src=/pressreleases/$filenamedown alt='$titledown' border=0 width=150 align=left></a>";}else if ($filenametoshow == "pdf" || $filenametoshow == "PDF")
{echo "<a href=/pressreleases/$filenamedown alt='$titledown'><img src=/images/pdficon.gif border=0 alt=PDF hspace=5>View download...</a><BR>";}

else 
{echo "";}
echo "<a name=$iddown></a>\n";

echo "<div id=inthenews>";

if (isset($urldown) && $urldown !== "") {

	if (isset($titledown) && $titledown !=="") {	echo "<a href=http://$urldown class=heavy>$titledown</a><BR>";
	}
	else {
	echo "<a href=http://$urldown class=heavy>$urldown</a><BR>";
	}
}else {echo "$titledown<BR>\n";}
echo "<div align=right>$sourcedown <em>$showdatemonthc $showdatedayc, $showdateyearc</em></div>";


echo "</div>";
echo "<HR>";


}$t++; 