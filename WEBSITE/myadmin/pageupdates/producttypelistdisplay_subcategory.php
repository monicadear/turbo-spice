<?$dbselectionsecsub= mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$queryselectionsecsub= "SELECT * FROM subcategory where subcategoryid=$subcategory"; $resultselectionsecsub = mysql_query($queryselectionsecsub, $connection) or die ("Couldn't execute query. Please try again later"); 
$m=0;	while ($myrowselectionsecsub = mysql_fetch_array($resultselectionsecsub)){ 				                      $subcategoryiddisplay=$myrowselectionsecsub["subcategoryid"];
                   $subcategorynamedisplay=$myrowselectionsecsub["subcategoryname"];


if (isset($subcategory) & $subcategoryiddisplay==$subcategory) {
echo "<b>$subcategorynamedisplay</b>\n";
}
 else {
echo "";
}

   	} $m++;

?>
