<? include ("../codes/adminconfig.php"); ?>



$pos = strpos($row->text,"&lt;BR&gt;&lt;BR&gt;"); 


$transc["&lt;"] = "<";

$idtest = $row->id;

$titletest = $row->author;
$locationtest = $row->location;

// $texttest = substr($texttest,0,195); 




echo "&quot;$preview,&quot;";

echo " said $titletest, $locationtest. <a href=/pages/main.php?pageid=96&pagecategory=3 class=white>(Read more)</a>";
