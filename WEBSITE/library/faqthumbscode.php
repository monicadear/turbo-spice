<BR><hr><BR>
<?

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	

?>



<?

$titledown = strtr($titledown, $trans);
$textdown = strtr($textdown, $trans);


$transwebslink["http://"] = "";



$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);



echo "<a name=$iddownshow></a><b>$titledown</b><BR>";



	if (isset($filenamedown) && $filenamedown !=="") {

$filenametoshow = substr("$filenamedown", -3, 3);

		else if ($filenametoshow == "pdf" || $filenametoshow == "PDF")
		{
		echo "<BR><a href=/faqs/$filenamedown><img src=/images/pdficon.gif border=0 alt=PDF valign=middle></a> <a href=/faqs/$filenamedown>$filenamedown</a><BR><BR>\n";
	
		else {
		}
	} else {
	}






echo "$textdown<BR>";

if (isset($webslinkdown) && $webslinkdown !== "") {

echo "<BR>";
echo "<HR>";
?>



<?
}
$g++;
?>