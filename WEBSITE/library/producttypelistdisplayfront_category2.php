




                   $category2namedisplay=$myrowselectioncat2show["categoryname"];


$phrasetoshow2=urlencode($category2namedisplay);

if (isset($category2) & $category2iddisplay==$category2) {
echo "<a href=/pages/showall.php?category2=$category2iddisplay&showbysample=2&phrasetoshow=$phrasetoshow2>$category2namedisplay</a> &#124; \n";
}
 else {
echo "";
}

   	

?>
