<?
echo "<br><BR>";




$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	

?>

<?






$showdateyearc = substr("$datedown", 0, 4);
$showdatemonthc = substr("$datedown", 4, 2);
$showdatedayc = substr("$datedown", 6, 2);




if (isset($webslinkdown) && $webslinkdown !== "") {
?>


<?
}
$g++;
?>