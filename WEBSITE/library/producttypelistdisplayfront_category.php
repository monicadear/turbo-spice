<?php include ("../codes/adminconfig.php"); ?>


                   $categorynamedisplay=$myrowselectionsec["categoryname"];


$phrasetoshow=urlencode($categorynamedisplay);

if (isset($category) & $categoryiddisplay==$category) {
echo "<a href=/pages/showall.php?pagecategory=$categoryiddisplay&showbysample=1&phrasetoshow=$phrasetoshow>$categorynamedisplay</a> &#124; \n";
}
 else {
echo "";
}

   	

?>
