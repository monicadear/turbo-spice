
$transcontactinfo["&lt;BR&gt;"] = "";
$transcontactinfo["&lt;"] = "<";
$transcontactinfo["&gt;"] = ">";
$transcontactinfo["\n"] = "<BR>";


$textcontactinfo = strtr($row->text,$transcontactinfo); 