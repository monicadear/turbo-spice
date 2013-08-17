<? include ("../codes/adminconfig.php"); ?><?$dbc = "testimonialcontent";$query1c = "select * from $dbc order by rand() limit 1";

$result1c = mysql_db_query($database, $query1c);while($row = mysql_fetch_object($result1c)) {$transc["&amp;"] = "&"; $transc["&#039;"] = "'";

$pos = strpos($row->text,"&lt;BR&gt;&lt;BR&gt;"); $preview = substr($row->text,0,$pos-1); 


$transc["&lt;"] = "<";$transc["&gt;"] = ">";$transc["&lt;input"] = "input_";$texttest = strtr($preview,$transc); 

$idtest = $row->id;

$titletest = $row->author;
$locationtest = $row->location;

// $texttest = substr($texttest,0,195); 




echo "&quot;$preview,&quot;";

echo " said $titletest, $locationtest. <a href=/pages/main.php?pageid=96&pagecategory=3 class=white>(Read more)</a>";}?>
