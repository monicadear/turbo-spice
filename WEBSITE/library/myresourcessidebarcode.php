
<div align=center><img src=/images/aagreenline.jpg border=0 alt=linemarker></div>

<div id=sidebarboxbig>


<span class=bigblack>Resources</span><BR>
<?include("../codes/adminconfig.php");?>
<?
$dbresources = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


$queryresources= "SELECT * FROM downloads where publish='Y' order by id desc limit 4";
 
$sql_resultresources = mysql_query($queryresources, $connection) or die ("Couldn't execute query. Please try again later"); 

$d=0;

while ($myrowresources = mysql_fetch_array($sql_resultresources)){ 
           
	$idres=$myrowresources["id"];					   
	$file=$myrowresources["filename"];					   
	$titleres =$myrowresources["title"];
	$evt_type=$myrowresources["evt_type"];					   
echo "<BR>\n\n";		

if ($evt_type=="1") {	
	echo "<img src=/images/icons/personal.gif width=10 hspace=5 border=0>\n\n";

if ($session->userlevel>="2"){

	echo "<a href='/downloads/$file'><img src=/images/icons/download.gif hspace=5 border=0 width=15 align=left></a>\n\n";
}

else {

}


}

else {
	echo "<a href='/downloads/$file'><img src=/images/icons/download.gif hspace=5 border=0 width=15 align=left></a>\n\n";
}


echo "<a href=/pages/main.php?pageid=26#$idres class=resourceshomepage>$titleres</a><BR>\n\n";

}
$d++; 
?>



</div>

