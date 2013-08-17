<BR clear=all>


</div><!-- end maincontent -->




</div><!-- end big -->




<div id=footer>


<div id=footertext>

<table border=0><tr><td width=80% valign=top>

<?

include ("../codes/adminconfig.php"); $dbbottomnav = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querybottomnav= "SELECT * FROM pagecontent where subcategory='4' and publish='Y' order by showorder"; 
$sql_resultbottomnav = mysql_query($querybottomnav, $connection) or die ("Couldn't execute query. Please try again later");                 $x = 8;while ($myrowbottomnav = mysql_fetch_array($sql_resultbottomnav)){ $idbottomnav=$myrowbottomnav["id"];                   		$navtitlebottomnav=$myrowbottomnav["titleshow"];
	echo "<a href=/pages/main.php?pageid=$idbottomnav  class=headernav>";echo "$navtitlebottomnav";echo "</a> &nbsp; &nbsp; \n";

$x++;
}
?>

<BR><a href=/pages/sitemap.php class=headernav>Sitemap</a> &nbsp; &nbsp;
&nbsp; &nbsp;
<span class=footertext> &copy; <? $year=date(Y); echo "$year"; ?></span>

</td>
<td valign=top>
<span class=footertext>
<?  include ("../library/contact_information.php"); ?>
</span>
</td>
</tr></table>


</div>


</div>

<div id=yellowbottombar>
</div>

</div><!-- end wrap -->
</div><!-- end wrapcolor -->





<div id=creativecommons><span class=footertext><a rel=license href=http://creativecommons.org/licenses/by-nc/3.0/><img alt='Creative Commons License' border=0 src='/images/somerights20.png' align='left' hspace='5' /></a><br />This work is licensed under a <a rel='license' href='http://creativecommons.org/licenses/by-nc/3.0/'>Creative Commons Attribution-Noncommercial 3.0 Unported License</a>.</span></div>
</body></html>












