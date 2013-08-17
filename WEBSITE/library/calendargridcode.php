<?include("../codes/adminconfig.php");?>

<table border=1 bordercolor=#CCCCCC cellspacing=0 cellpadding=5>
<?php
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$todaydateforsearch=date(Y)."-".date(m)."-".date(d);
$sql = "SELECT startdate,title FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' order by startdate ASC"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

$d=0;
while ($myrow = mysql_fetch_array($sql_result)){ 
           
                   $startdateshowme=$myrow["startdate"];
                   $titleshowme=$myrow["title"];

$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";
$titleshowme = strtr($titleshowme,$trans);


$showdateyear = substr("$startdateshowme", 0, 4);
$showdatemonth = substr("$startdateshowme", 4, 3);
$showdateday = substr("$startdateshowme", 8, 3);


$transdatesm["-01"] = " January "; 
$transdatesm["-02"] = " February "; 
$transdatesm["-03"] = " March "; 
$transdatesm["-04"] = " April "; 
$transdatesm["-05"] = " May "; 
$transdatesm["-06"] = " June "; 
$transdatesm["-07"] = " July "; 
$transdatesm["-08"] = " August "; 
$transdatesm["-09"] = " September "; 
$transdatesm["-10"] = " October "; 
$transdatesm["-11"] = " November "; 
$transdatesm["-12"] = " December "; 

$showdatemonth = strtr($showdatemonth, $transdatesm);

$transdatesd[" "] = " "; 

$showdateday = strtr($showdateday, $transdatesd);







echo "<tr>";
echo "<td><div align=right><b>$showdatemonth $showdateday, $showdateyear</b></div></td>";
echo "<td><a href=#$startdateshowme>$titleshowme</a></td>";
echo "</tr>\n";


$d++;
} 
?>
</table>


<?php
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql = "SELECT * FROM calendar where enddate >='$todaydateforsearch' and publish='Y' order by startdate ASC"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

$c=0;
while ($myrow = mysql_fetch_array($sql_result)){ 
           
                   $startdate=$myrow["startdate"];
                   $enddate=$myrow["enddate"];
                   $title=$myrow["title"];
                   $description=$myrow["description"];
                   $starttime=$myrow["starttime"];
                   $endtime=$myrow["endtime"];
                   $location=$myrow["location"];
                   $contact=$myrow["contact"];
	           $website=$myrow["website"];
	           $price=$myrow["price"];
	           $pricenonmembers=$myrow["pricenonmembers"];
	           $internalevent=$myrow["internalevent"];
			    $id=$myrow["id"];					   

$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";

$title = strtr($title,$trans);


$description = strtr($description,$trans);

$transdate["-01-"] = " January "; 
$transdate["-02-"] = " February "; 
$transdate["-03-"] = " March "; 
$transdate["-04-"] = " April "; 
$transdate["-05-"] = " May "; 
$transdate["-06-"] = " June "; 
$transdate["-07-"] = " July "; 
$transdate["-08-"] = " August "; 
$transdate["-09-"] = " September "; 
$transdate["-10-"] = " October "; 
$transdate["-11-"] = " November "; 
$transdate["-12-"] = " December "; 


$transdatepass["-01-"] = "+January+"; 
$transdatepass["-02-"] = "+February+"; 
$transdatepass["-03-"] = "+March+"; 
$transdatepass["-04-"] = "+April+"; 
$transdatepass["-05-"] = "+May+"; 
$transdatepass["-06-"] = "+June+"; 
$transdatepass["-07-"] = "+July+"; 
$transdatepass["-08-"] = "+August+"; 
$transdatepass["-09-"] = "+September+"; 
$transdatepass["-10-"] = "+October+"; 
$transdatepass["-11-"] = "+November+"; 
$transdatepass["-12-"] = "+December+"; 



$startdatespelloutshow = strtr($startdate, $transdate);
$startdatespellout = strtr($startdate, $transdatepass);
$enddatespellout = strtr($enddate, $transdate);
$starttimepass=urlencode($starttime);
$endtimepass=urlencode($endtime);
$locationpass=urlencode($location);

$transtextpass["-"] = "+";
$transtextpass[","] = "+";
$transtextpass[" "] = "+";
$transtextpass["&#174;"] = "-R-";
$transtextpass["¨"] = "-R-";
$transtextpass["&reg;"] = "-R-";
$titlepass = strtr($title,$transtextpass);


	$titlepass=urlencode($title);



$transtextpass2["%AE"] = "+";
$titlepass = strtr($titlepass,$transtextpass2);





echo "<BR><hr color=#CCCCCC><BR>";



echo "<div id=calendareventbox>";
echo "<a name=$startdate></a>\n";

echo "<span class=blue>$startdatespelloutshow\n";




if (isset($enddate)  && $enddate !==$startdate) {
echo " to $enddatespellout\n";
}
else {
echo "";
}
echo "</span>";
echo "<BR>";
echo "\n\n";


echo "<h2>$title</h2>";




if (isset($description) && $description !== "") {
echo "$description<BR>\n";
}
else {
echo "";
}


if (isset($location) && $location !=="") {
echo "<BR><b>Location:</b> $location\n";
}
else {
echo "";
}

if (isset($starttime) && $starttime !=="") {
echo "<BR><b>Starts:</b> $starttime\n";
}
else {
echo "";
}


if (isset($endtime) && $endtime !=="") {
echo "<BR><b>Ends:</b> $endtime\n";
}
else {
echo "";
}


if (isset($contact) && $contact !=="") {
echo "<BR><b>Contact:</b> $contact\n";
}
else {
echo "";
}


if (isset($website) && $website !=="") {

echo "<BR><b>Website:</b> <a href=http://$website target=new>$website</a><BR>\n";
}
else {
echo "";
}





echo "</div>";

$c++;
} 

?> 

<BR clear=all>
