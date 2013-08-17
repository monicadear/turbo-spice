<pre>
<?
include_once("functions.php");
	$_thispage = "multi_page.php";
	$_windowsize = 30;
	$_startat = (isset($_GET['pagestart'])==true ? $_GET['pagestart'] : '0');
	
	function display_navbar($w,$i,$max,$getvars,$ref){
		if (!$getvars) $getvars="?";	
		if ($i>=$w) echo " <a href='$ref$getvars&pagestart=".($i-$w)."'>&lt&lt</a>";
		for($c=0;$c<$max;$c+=$w){
			$disp =1+ ($c)/$w;
			if ($c!=$i) echo " <a href='$ref$getvars&pagestart=$c'>$disp</a> ";	
			else echo "<b>$disp</b>";
		}
		if ($i<$max-$w) echo " <a href='$ref$getvars&pagestart=".($i+$w)."'>&gt&gt</a>";
	}
	$handle = sql_fetch_assoc_res("SELECT * FROM VT LIMIT $_startat,$_windowsize");
	$max = sql_fetch_firstcell("SELECT COUNT(*) from VT");
	echo "max is $max\n";
	display_navbar($_windowsize,$_startat,$max,"?searchstring=nothing&userid=33",$_thispage);
	echo "\n\n";
	while($r = mysql_fetch_row($handle)) echo "$r[0] --- $r[1]\n";

?>
</pre>