
<BR><BR><BR clear=all>

<table class=shopshowborder cellspacing=5 cellpadding=5>
<tr>

<?


$query= "SELECT id, title, title2, filename, price FROM productsmall order by showorder"; 

 include ("../codes/adminconfig.php"); 

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql_result = mysql_query($query, $connection) or die ("Go to the <a href=/>homepage</a>.<BR>"); 

$c=0;

while ($myrow = mysql_fetch_array($sql_result)){ 
                   $productid=$myrow["id"];	
                   $titlepg=$myrow["title"];
                   $title2pg=$myrow["title2"];
                   $price=$myrow["price"];
                   $filename=$myrow["filename"];

$pricemembers = $price - $discount;

$transpg["&amp;"] = "&"; 
$transpg["&#039;"] = "'";
$transpg["&lt;"] = "<";
$transpg["&gt;"] = ">";


$titlepg=html_entity_decode("$titlepg", ENT_NOQUOTES);

$trans5[" "] = "_"; 
$trans5["'"] = "_";
$trans5["&quote;"] = "_";
$nametopass = strtr($titlepg,$trans5); 
$productnametopass = $id."-".$nametopass; 





echo "<td valign=middle width=175>\n";
echo "<div align=center>\n";
echo "<div id=showshoptitleitem>\n";
echo "<table border=0 class=noshow><tr><td valign=middle height=170 class=noshow>\n";


echo "<a href=product_details.php?productid=$productid>";

	if (isset($filename) && $filename !=="")

	{echo "<img src=/productsmall/$filename border=0 width=125 alt='product'>";}

	else {echo "<img src=/downloads/comingsoon.jpg border=0 alt='coming soon' width=75>";}

echo "</a>\n";

echo "</td></tr></table>\n";
echo "</div>\n";
echo "<BR>\n";


echo "<div id=showshoptitlebox>\n";
echo "<span class=showshoptitle>$titlepg, $title2pg</span>\n";
echo "</div>\n";


echo "</div>\n";
echo "</td>\n";


$c++;

if ($c==3) {
echo "</tr><tr>\n";
$c=0;
}

}
?>

</table>


