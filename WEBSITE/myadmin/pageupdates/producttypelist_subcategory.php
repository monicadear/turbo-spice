<? include ("../../codes/adminconfig.php");?>
<?$dbtrisub="subcategory";	@mysql_select_db("$database") or die( "Unable to open database"); 	$queryselectiontrisub = "SELECT subcategoryid,subcategoryname from $dbtrisub order by subcategoryid";	$resultselectiontrisub = mysql_query($queryselectiontrisub);

echo "SQL: $queryselectiontrisub<BR>";

?><?phpif (isset($subcategory)) {	while(list($subcategoryid,$subcategoryname) = mysql_fetch_row($resultselectiontrisub)) {$code4 = htmlentities("$subcategoryid", ENT_QUOTES);	print "<option value=$code4";	if ($subcategoryid == $subcategory) echo " selected";    	print ">$subcategoryname</option>\n";}} // end if issetelse 	while(list($subcategoryid,$subcategoryname) = mysql_fetch_row($resultselectiontrisub)) {$code4 = htmlentities("$subcategoryid", ENT_QUOTES);	print "<option value=$code4>$subcategoryname</option>\n";}?><?mysql_close();?>