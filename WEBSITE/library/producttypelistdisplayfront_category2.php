<?$dbselectioncat2show= mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$queryselectioncat2show= "SELECT * FROM category2 where categoryid=$category2"; 

$resultselectioncat2show = mysql_query($queryselectioncat2show, $connection) or die ("Couldn't execute query. Please try again later"); 
$k=0;	while ($myrowselectioncat2show = mysql_fetch_array($resultselectioncat2show)){ 				                      $category2iddisplay=$myrowselectioncat2show["categoryid"];
                   $category2namedisplay=$myrowselectioncat2show["categoryname"];


$phrasetoshow2=urlencode($category2namedisplay);

if (isset($category2) & $category2iddisplay==$category2) {
echo "<a href=/pages/showall.php?category2=$category2iddisplay&showbysample=2&phrasetoshow=$phrasetoshow2>$category2namedisplay</a> &#124; \n";
}
 else {
echo "";
}

   	} $k++;

?>
