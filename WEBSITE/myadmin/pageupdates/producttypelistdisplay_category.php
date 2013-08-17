<?$dbselectionsec= mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$queryselectionsec= "SELECT * FROM category where categoryid=$category"; $resultselectionsec = mysql_query($queryselectionsec, $connection) or die ("Couldn't execute query. Please try again later"); 
$j=0;	while ($myrowselectionsec = mysql_fetch_array($resultselectionsec)){ 				                      $categoryiddisplay=$myrowselectionsec["categoryid"];
                   $categorynamedisplay=$myrowselectionsec["categoryname"];


if (isset($category) & $categoryiddisplay==$category) {
echo "<b>$categorynamedisplay</b>\n";
}
 else {
echo "";
}

   	} $j++;

?>
