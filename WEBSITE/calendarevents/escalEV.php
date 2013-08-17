<?php require ("escalConfig.php");?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Calendar</title>
<link rel="stylesheet" href="../style.css">
<meta HTTP-EQUIV="expires" CONTENT="0">
<meta HTTP-EQUIV="Pragma" CONTENT="cache">
</head><body>
<!-- secondary page content goes here -->
<!-- -------- ----------  -----  -->
<div id=secondarypagecontent>

<?php $pv=explode(".",phpversion());$pv=$pv[0].".".$pv[1];$pv=$pv-4.1;if ($pv>=0) { $readSQL=$_GET["readSQL"];$readFile=$_GET["readFile"];$ev=$_GET["ev"];} if ($pv<0) { $readSQL=$HTTP_GET_VARS["readSQL"];$readFile=$HTTP_GET_VARS["readFile"];$ev=$HTTP_GET_VARS["ev"];} $tz=date("Z")/3600;if ($tz<0) $offset=1;if ($dateFormat==1) { $eDate=$mth[date("n",($ev*86400)+($offset*86400))]." ".date("d,Y",($ev*86400)+($offset*86400));} if ($dateFormat==2) { $eDate=date("d ",($ev*86400)+($offset*86400)).$mth[date("n",($ev*86400)+($offset*86400))].date(" Y",($ev*86400)+($offset*86400));} if ($readSQL==1) { $SQLdate=date("Y-m-d",($ev*86400)+($offset*86400));$db=mysql_connect($dbHost,$dbUserLogin,$dbPassword);mysql_select_db($dbName,$db);$result=mysql_query("SELECT * FROM calendar WHERE startdate <='$SQLdate' AND enddate >='$SQLdate' ORDER BY startdate",$db);$myrow=mysql_fetch_array($result);if ($myrow) { do { $es.=$myrow[startdate]."x";$ee.=$myrow[enddate]."x";
$eTitle.=$myrow[title]."||";
$eDescription.=$myrow[description]."||";
} while ($myrow=mysql_fetch_array($result));
} } if ($readFile==1) { if (file_exists("esdates.txt")) { $fp=fopen ("esdates.txt","r");Do { $datas=fgetcsv ($fp,1000,",");if (!$datas) break;$es.="$datas[0]x";if ($datas[1]!="") $ee.="$datas[1]x";else $ee.="$datas[0]x";$eTitle.="$datas[2]||";$eDescription.="$datas[3]||";} WHILE ($datas);fclose ($fp);
} } if ($es) { $es=explode ("x",$es);
$smc=count ($es);
$ee=explode ("x",$ee);
$eTitle=explode ("||",$eTitle);
$eDescription=explode ("||",$eDescription);
if ($smc==1) { $es[1]="3000-01-01";$ee[1]="3000-01-01";} } ?> 
<p align=right>
<span class="style8">[</span><a href="javascript:window.close();">Close</a><span class="style8">]</span></p>
<?php echo "<h3>$eDate</h3>"; ?>

<?php $i=0;while ($i < $smc) { if (!$es[$i]) break;$es[$i]=ereg_replace('-','/',$es[$i]);$ee[$i]=ereg_replace('-','/',$ee[$i]);$start=intval((strtotime($es[$i])+(date("O",strtotime($es[$i]))*36))/86400);
$end=intval((strtotime($ee[$i])+(date("O",strtotime($ee[$i]))*36))/86400);if ($ev>=$start && $ev<=$end) { if ($dateFormat==1) { $eStart=date("m/d/y",($start*86400)+($offset*86400));
$eEnd=date("m/d/y",($end*86400)+($offset*86400));
} if ($dateFormat==2) { $eStart=date("d/m/y",($start*86400)+($offset*86400));
$eEnd=date("d/m/y",($end*86400)+($offset*86400));
} if ($eStart==$eEnd) $eDates="$eStart";else $eDates="$eStart::$eEnd";
?>
<?php echo "<h2>";
echo nl2br($eTitle[$i]);
echo "</h2>"; ?>
<BR>
<?php 
$trans5["&lt;"] = "<";
$trans5["&gt;"] = ">";
$eDescription[$i]= strtr($eDescription[$i],$trans5);
echo nl2br($eDescription[$i]); ?>
<?php if ($eStart !=$eEnd) { $eDate="Starts:".$eStart.".::.Ends:".$eEnd;} else { $eDate=" ";} ?> 
<?php echo $eDate; echo "\n"; ?> <br><br> <?php } $i++;} ?> 
<div align="center"> <p class="style5"><span class="style11">--End of Events--</span><br> <br> <span class="style9"><a href="http://calendar.esscripts.com/" target="_blank"><span class="style12">&copy;2004 Easily Simple Calendar 4.5</span></a></span></p> </div>

</div>
</body>
</html>