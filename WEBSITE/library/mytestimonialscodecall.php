<?

include ("../codes/adminconfig.php");


$querytestimonialdisp= "SELECT * FROM testimonialcontent order by showorder asc"; 


$sql_resulttestimonialdisp = mysql_query($querytestimonialdisp, $connection) or die ("Couldn't execute query. Please try again later"); 

$transtest["&amp;"] = "&"; 



echo "<a name=$idtestimonialdisp></a><a href=/pages/main.php?pageid=96#$idtestimonialdisp>$authortestimonialdisp</a>,<BR>\n";
echo "$locationtestimonialdisp<BR><BR>\n";
}
?>
