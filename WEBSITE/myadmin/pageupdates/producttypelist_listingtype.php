<? include ("../../codes/adminconfig.php");?>
<?$dbquatsub="listingtype";	@mysql_select_db("$database") or die( "Unable to open database"); 	$queryselectionquatsub = "SELECT listingtypeid,listingtypename from $dbquatsub order by listingtypeid";	$resultselectionquatsub = mysql_query($queryselectionquatsub);


?><?phpif (isset($listingtype)) {	while(list($listingtypeid,$listingtypename) = mysql_fetch_row($resultselectionquatsub)) {$code5 = htmlentities("$listingtypeid", ENT_QUOTES);	print "<option value=$code5";	if ($listingtypeid == $listingtype) echo " selected";    	print ">$listingtypename</option>\n";}} // end if issetelse 	while(list($listingtypeid,$listingtypename) = mysql_fetch_row($resultselectionquatsub)) {$code5 = htmlentities("$listingtypeid", ENT_QUOTES);	print "<option value=$code5>$listingtypename</option>\n";}?><?mysql_close();?>