<BR><hr><BR>
<?

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM faqcategory order by categoryid"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	
echo "<h2>$cattitle</h2>";
?>



<?
$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM faqs where category=$categoryid order by showorder"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddownshow=$myrowdown["id"];					                      $datedown=$myrowdown["date"];                   $titledown=$myrowdown["title"];                   $textdown=$myrowdown["text"];                   $webslinkdown=$myrowdown["weblink"];                   $filenamedown=$myrowdown["filename"];$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&quot;"] = "'";
$titledown = strtr($titledown, $trans);
$textdown = strtr($textdown, $trans);


$transwebslink["http://"] = "";$webslinkdown = strtr($webslinkdown, $transwebslink);



$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);



echo "<a name=$iddownshow></a><b>$titledown</b><BR>";



	if (isset($filenamedown) && $filenamedown !=="") {

$filenametoshow = substr("$filenamedown", -3, 3);
		if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow=="GIF" || $filenametoshow == "png" || $filenametoshow == "PNG")		{		echo "<img src=/faqs/$filenamedown alt='$titledown' border=0 width=150 align=left> ";		}
		else if ($filenametoshow == "pdf" || $filenametoshow == "PDF")
		{
		echo "<BR><a href=/faqs/$filenamedown><img src=/images/pdficon.gif border=0 alt=PDF valign=middle></a> <a href=/faqs/$filenamedown>$filenamedown</a><BR><BR>\n";		}
	
		else {
		}
	} else {
	}






echo "$textdown<BR>";

if (isset($webslinkdown) && $webslinkdown !== "") {echo "<BR><a href=http://$webslinkdown class=heavy target=new>$webslinkdown</a><BR>";}
echo "<div align=right><a href=#top>top</a></div>";
echo "<BR>";
echo "<HR>";}$t++; echo "<BR>";
?>



<?
}
$g++;
?>