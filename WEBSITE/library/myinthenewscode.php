<BR><BR>
<?

include ("../codes/adminconfig.php");

$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);






$filenametoshow = substr("$filenamedown", -3, 3);
{

else 
{


echo "<div id=inthenews>";



	if (isset($titledown) && $titledown !=="") {
	}
	else {
	echo "<a href=http://$urldown class=heavy>$urldown</a><BR>";
	}
}
echo "<div align=right>$sourcedown <em>$showdatemonthc $showdatedayc, $showdateyearc</em></div>";


echo "</div>";
echo "<HR>";


}