<h1 class=special>Mission Statement</h1>


$transmissioninfo["&lt;BR&gt;"] = "";
$transmissioninfo["&lt;"] = "<";
$transmissioninfo["&gt;"] = ">";
$transmissioninfo["\n"] = "<BR>";
$transmissioninfo["&lt;p&gt;"] = "";
$transmissioninfo["&lt;/p&gt;"] = "";


$textmissioninfo = strtr($row->text,$transmissioninfo); 

