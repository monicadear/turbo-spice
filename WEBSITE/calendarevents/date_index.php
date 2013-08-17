<?php //link_index.php
$db="datesearcher";
@mysql_select_db("$database") or die( "Unable to open database"); 

$query = "SELECT datesearch from $db order by datesearch";

$result = mysql_query($query);

/*Dynamically generate drop-down list*/
while(list($datesearch) = mysql_fetch_row($result)) {
    print "<option>$datesearch</option>\n";
}
mysql_close();
?>