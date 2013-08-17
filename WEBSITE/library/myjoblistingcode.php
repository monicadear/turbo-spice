<ul><?

include ("../codes/adminconfig.php");$dbjobdisp = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


if($session->logged_in){
$queryjobdisp= "SELECT id, title, evt_type FROM jobs where publish='Y' order by id desc"; 
}
else {
$queryjobdisp= "SELECT id, title FROM jobs where publish='Y' and evt_type='0' order by id desc"; 
}


$sql_resultjobdisp = mysql_query($queryjobdisp, $connection) or die ("Couldn't execute query. Please try again later"); $x=0;while ($myrowjobdisp = mysql_fetch_array($sql_resultjobdisp)){                    $idjobdisp=$myrowjobdisp["id"];					   $titlejobdisp=$myrowjobdisp["title"];		$evt_type_disp=$myrowjobdisp["evt_type"];                  

echo "<li>";


if ($evt_type_disp=="1") {
echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 
}


echo "$titlejobdisp <a href=#$idjobdisp>link</a>";
echo "<BR></li>\n\n";
}$x++; 
?></ul><BR>


<?

$dbjob = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

if($session->logged_in){
$queryjob= "SELECT * FROM jobs where publish='Y' order by id desc"; 
}

else {
$queryjob= "SELECT * FROM jobs where evt_type='0' and publish='Y' order by id desc"; 
}



$sql_resultjob = mysql_query($queryjob, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowjob = mysql_fetch_array($sql_resultjob)){                    $idjob=$myrowjob["id"];					                      $datejob=$myrowjob["date"];                   $titlejob=$myrowjob["title"];                   $textjob=$myrowjob["description"];

                   $department=$myrowjob["department"];
                   $reportsto=$myrowjob["reportsto"];
                   $status=$myrowjob["status"];
                   $hours=$myrowjob["hours"];
                   $wagejob=$myrowjob["wage"];
                   $locationjob=$myrowjob["location"];
                   $phonejob=$myrowjob["phone"];
                   $emailjob=$myrowjob["email"];
                   $authorjob=$myrowjob["author"];
                   $evt_typejob=$myrowjob["evt_type"];


$trans["&lt;/li&gt;&lt;BR&gt;"] = "</li>";
$trans["&lt;"] = "<";$trans["&gt;"] = ">";


$textjob = strtr($textjob,$trans); 


echo "<a name=$idjob></a>\n";

echo "<div id=jobsdiv>";

if ($evt_type_job=="1") {
echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 
}


echo "<h2>$titlejob</h2>\n";

echo "$textjob<BR>\n";

echo "<BR><b>DEPARTMENT:</b> $department<BR>\n";
echo "<BR><b>REPORTS TO:</b> $reportsto<BR>\n";
echo "<BR><b>STATUS:</b> $status<BR>\n";
echo "<BR><b>HOURS:</b> $hours<BR>\n";


echo "<div align=right>";
echo "<span class=lastupdated>Last updated: ";
print theDate ("d F Y","$datejob");
echo "</span><BR>";
echo "</div>\n\n";
echo "</div><!-- end of jobs div -->";
echo "<!-- --------------- -->\n\n";
echo "<BR clear=all><hr><BR>";
}$t++; 
?>