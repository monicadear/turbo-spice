

<?

 include ("../codes/adminconfig.php"); 
$query= "SELECT * FROM allphotosextended order by showorder asc"; 

$sql_result = mysql_query($query, $connection) or die ("Go to the <a href=/>homepage</a>.<BR>"); 

$d=1;


echo "<div id=photogalleryitem>";
echo "<h3>$titlepg</h3>\n";


if ($thumbnailpg=="" || $thumbnailpg==null) {


echo "$textpg<BR></div><BR>\n";


echo "<hr width=80%>";
echo "<BR>";

$d++;

}


?>



