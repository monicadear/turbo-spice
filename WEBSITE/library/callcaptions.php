<? include ("../codes/adminconfig.php"); ?>

$transcaption["&lt;"] = "<"; 
$transcaption["&lt;p&gt;"] = "";
$transcaption["&lt;/p&gt;"] = "";
$transcaption["&lt;BR&gt;"] = "";
$transcaption["&lt;br /&gt;"] = "\n ";
$transcaption["<br />"] = "\n ";

$transcaption["<p>"] = ""; 
$transcaption["</p>"] = ""; 



$textcaption = strtr($row->text,$transcaption); 