<?

include ("../codes/adminconfig.php");


$querytestimonialdisp= "SELECT * FROM testimonialcontent order by showorder asc"; 


$sql_resulttestimonialdisp = mysql_query($querytestimonialdisp, $connection) or die ("Couldn't execute query. Please try again later"); 

$transtest["&amp;"] = "&"; 



echo "<a name=$idtestimonialdisp></a><h2>Testimonial of $authortestimonialdisp</h2>\n";
echo "<i>$locationtestimonialdisp</i><BR><BR>\n";
echo "$texttestimonialdisp<BR>\n";
echo "<BR>\n\n";
echo "<HR>";
echo "<BR>";
}
?>
