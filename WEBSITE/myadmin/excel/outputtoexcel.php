<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>

<?php//Written by Dan Zarrella. Some additional tweaks provided by JP Honeywell//pear excel package has support for fonts and formulas etc.. more complicated//this is good for quick table dumps (deliverables)echo "<h3>Use this form to create an Excel File</h3>";echo "<FORM method=post action=createfile.php>";
?>
<?phpecho "Select a table from this drop-down list.<BR>\nPress &quot;submit&quot; to create an Excel file to download.<BR>\n";include('../../codes/adminconfig.php');$dbshowtablesforexport = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sqlshowtablesforexport = "SHOW TABLES";$resultshowtablesforexport = mysql_query($sqlshowtablesforexport) or die ("Couldn't open tables");// Count number of tables that exist in this database$num_resultstfe = mysql_num_rows($resultshowtablesforexport);print "<!-- Note: There are <b>$num_resultstfe</b> tables for this website.<BR>\n -->";if (isset($tabletoexport)) {// Start up dropdown listecho "<select name=tabletoexport>\n";// Cycle through every tablefor ($j = 0; $j < $num_resultstfe; $j++){$rowtfe = mysql_fetch_array($resultshowtablesforexport);print "<option value=$rowtfe[0]";  if ($tabletoexport==$rowtfe[0]) echo " selected";print ">".$rowtfe[0]."</option>\n";}echo "</select>";} else if ($tabletoexport == "" || $tabletoexport == null) {echo "<!-- No table currently selected.<BR> -->";echo "<select name=tabletoexport>\n";// Cycle through every tablefor ($j = 0; $j < $num_resultstfe; $j++){$rowtfe = mysql_fetch_array($resultshowtablesforexport);print "<option value=$rowtfe[0]>".$rowtfe[0]."</option>\n";}echo "</select>";} elseecho "Nothing happened. Re-load and try again.";?><?unset($dbshowtablesforexport);unset($database);unset($connection);unset($sqlshowtablesforexport);unset($resultshowtablesforexport);unset($num_resultstfe);unset($j);unset ($rowtfe);?>

<?echo "<input type=submit name=submit_enterexcel value=submit> (press only once)";echo "</FORM>"; ?><? include ("../adminfooter.php"); ?>

<? }
 ?>