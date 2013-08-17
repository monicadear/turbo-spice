<?php require ("escalConfig.php");

$tz=date("Z")/3600;
if ($tz<0) $offset=1;
if ($dateFormat==1) { $eDate=$mth[date("n",($ev*86400)+($offset*86400))]." ".date("d,Y",($ev*86400)+($offset*86400));
} if ($dateFormat==2) { $eDate=date("d ",($ev*86400)+($offset*86400)).$mth[date("n",($ev*86400)+($offset*86400))].date(" Y",($ev*86400)+($offset*86400));
} if ($readSQL==1) { $SQLdate=date("Y-m-d",($ev*86400)+($offset*86400));

require ("escalConfig.php");
$db=mysql_connect($dbHost,$dbUserLogin,$dbPassword);
mysql_select_db($dbName,$db);
$result=mysql_query("SELECT * FROM calendar WHERE startdate <='$SQLdate' AND enddate >='$SQLdate' ORDER BY startdate",$db);
$myrow=mysql_fetch_array($result);
if ($myrow) { do { $es.=$myrow[startdate]."x";
$ee.=$myrow[enddate]."x";
$eTitle.=$myrow[title]."||";
$eDescription.=$myrow[description]."||";
} while ($myrow=mysql_fetch_array($result));
} } if ($readFile==1) { if (file_exists("esdates.txt")) { $fp=fopen ("esdates.txt","r");
Do { $datas=fgetcsv ($fp,1000,",");
if (!$datas) break;
$es.="$datas[0]x";
if ($datas[1]!="") $ee.="$datas[1]x";
else $ee.="$datas[0]x";
$eTitle.="$datas[2]||";
$eDescription.="$datas[3]||";
} WHILE ($datas);
fclose ($fp);
} } if ($es) { $es=explode ("x",$es);
$smc=count ($es);
$ee=explode ("x",$ee);
$eTitle=explode ("||",$eTitle);
$eDescription=explode ("||",$eDescription);

if ($smc==1) { $es[1]="3000-01-01";
$ee[1]="3000-01-01";
} } ?>

<table width='100%' border='0' cellpadding='2' cellspacing='0'><tr><td align='left' bgcolor='#336699' class=oLib><font color='#FFFFFF'><?php echo $eDate ?>

</font></td></tr></table><br><?php $i=0;
while ($i < $smc) { if (!$es[$i]) break;
$es[$i]=ereg_replace('-','/',$es[$i]);
$ee[$i]=ereg_replace('-','/',$ee[$i]);
$start=intval((strtotime($es[$i])+(date("O",strtotime($es[$i]))*36))/86400);
$end=intval((strtotime($ee[$i])+(date("O",strtotime($ee[$i]))*36))/86400);
if ($ev>=$start && $ev<=$end) { if ($dateFormat==1) { $eStart=date("m/d/y",($start*86400)+($offset*86400));
$eEnd=date("m/d/y",($end*86400)+($offset*86400));
} if ($dateFormat==2) { $eStart=date("d/m/y",($start*86400)+($offset*86400));
$eEnd=date("d/m/y",($end*86400)+($offset*86400));
} if ($eStart==$eEnd) $eDates="$eStart";
else $eDates="$eStart::$eEnd";
if ($eStart !=$eEnd) { $eDate=$eStart." to ".$eEnd;
} else { $eDate=" ";
} ?>

<?php echo "<h2>";
echo nl2br($eTitle[$i]);
echo "</h2>"; ?>
<BR>
<?php 
$trans5["&lt;"] = "<";
$trans5["&gt;"] = ">";
$eDescription[$i]= strtr($eDescription[$i],$trans5);
echo nl2br($eDescription[$i]); 
echo "<BR>\n";?>
<?php ?>

<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr align='center' bgcolor='#EDEEEA'><td bgcolor='#E9EFF5' class=oLib><font color='#446B93'><?php echo $eDate ?>

</font></td></tr></table><br><?php } $i++;
} ?>


