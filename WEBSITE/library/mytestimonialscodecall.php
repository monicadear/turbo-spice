<?

include ("../codes/adminconfig.php");$dbtestimonialdisp = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


$querytestimonialdisp= "SELECT * FROM testimonialcontent order by showorder asc"; 


$sql_resulttestimonialdisp = mysql_query($querytestimonialdisp, $connection) or die ("Couldn't execute query. Please try again later"); $x=0;while ($myrowtestimonialdisp = mysql_fetch_array($sql_resulttestimonialdisp)){                    $idtestimonialdisp=$myrowtestimonialdisp["id"];					   $texttestimonialdisp=$myrowtestimonialdisp["text"];		   $authortestimonialdisp=$myrowtestimonialdisp["author"];		   $locationtestimonialdisp=$myrowtestimonialdisp["location"];                  

$transtest["&amp;"] = "&"; $transtest["&#039;"] = "'";$transtest["&quot;"] = "'";$transtest["&lt;"] = "<";$transtest["&gt;"] = ">";$transtest["\r"] = "<BR>"; $texttestimonialdisp = strtr($texttestimonialdisp,$transtest); 



echo "<a name=$idtestimonialdisp></a><a href=/pages/main.php?pageid=96#$idtestimonialdisp>$authortestimonialdisp</a>,<BR>\n";
echo "$locationtestimonialdisp<BR><BR>\n";
}$x++; 
?>
