
<BR><BR><BR>

<?

echo "<table border=0 cellspacing=0 cellpadding=5 bordercolor=#CCCCCC>";

$query= "SELECT * FROM productsmall order by showorder"; 

 include ("../codes/adminconfig.php"); 

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql_result = mysql_query($query, $connection) or die ("Go to the <a href=/>homepage</a>.<BR>"); 

$c=1;

while ($myrow = mysql_fetch_array($sql_result)){ 
                   $id=$myrow["id"];	
                   $titlepg=$myrow["title"];
                   $textpg=$myrow["text"];
                   $moreinfopg=$myrow["moreinfo"];
                   $price=$myrow["price"];
                   $filename=$myrow["filename"];
                   $filename2=$myrow["filename2"];
                   $webslink=$myrow["webslink"];


$discount=.10*$price;
$pricemembers = $price - $discount;

$transpg["&amp;"] = "&"; 
$transpg["&#039;"] = "'";
$transpg["&lt;"] = "<";
$transpg["&gt;"] = ">";

$textpg = strtr($textpg,$transpg); 
$textpg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $textpg);
$textpg = ereg_replace("\r\n", "\n<BR>", $textpg);


$moreinfopg = strtr($moreinfopg,$transpg); 
$moreinfopg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $moreinfopg);
$moreinfopg = ereg_replace("\r\n", "\n<BR>", $moreinfopg);




$titlepg=html_entity_decode("$titlepg", ENT_NOQUOTES);

$trans5[" "] = "_"; 
$trans5["'"] = "_";
$trans5["&quote;"] = "_";
$nametopass = strtr($titlepg,$trans5); 
$productnametopass = $id."-".$nametopass; 


echo "<tr>";


echo "<td valign=top><div align=center>";


if (isset($webslink) && $webslink !=="")

{
echo "<a href=$webslink>";

	if (isset($filename) && $filename !=="")
	{echo "<img src=/productsmall/$filename border=0 width=150 alt='product'>";}

	else {echo "<img src=/downloads/comingsoon.jpg border=0 alt='coming soon' width=75>";}

echo "</a>";

}



else 

{

	if (isset($filename) && $filename !=="")
	{echo "<img src=/productsmall/$filename border=0 width=125 alt='product'>";}

	else {echo "<img src=/downloads/comingsoon.jpg border=0 alt='coming soon' width=75>";}



	if (isset($filename2) && $filename2 !=="")
	{echo "<img src=/productsmall/$filename2 border=0 width=125 alt='product'>";}

	else {echo "";}



}



echo "</div></td>";



echo "<td valign=top>";
echo "<h4>$titlepg</h4>\n";

echo "$textpg<BR><BR>\n";
echo "<i>$moreinfopg</i><BR><BR>\n";


echo "<div id=priceindent>\n";

echo "<table border=0 cellspacing=0 cellpadding=0><tr><td valign=middle width=75>";

if (isset($price) && $price !=="")
{

if($session->logged_in){
echo "<strike><b>$$price</b></strike>.<BR><span class=green><b>Members: $$pricemembers</b></span>\n";
}
else {
echo "<b>$$price</b>.<BR><a href=/pages/signin.php class=smallergreen>Sign up for special rates!</a>\n";
}

}



echo "</td><td valign=top>";


if (isset($webslink) && $webslink !=="")
{
echo "<a href=$webslink>";
echo "<img src=/downloads/AddtoCartButton.jpg width=100 border=0 alt='add to cart'>";
echo "</a>";
}


// if using PayPal shopping cart
else {
 include ("paypalform.php");

}


echo "</td></tr></table><!-- end price -->\n";

echo "</div>\n";

echo "<BR>";
echo "</td>\n";


echo "</tr>\n";



 echo "<tr>\n";
echo "<td colspan=2>\n";
echo "<hr color=#C9DAFF width=350 align=right>\n";
echo "</td>\n";
 echo "</tr>\n";


$c++;
}
?>

</table>


