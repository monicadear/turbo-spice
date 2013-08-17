<?php
$pv=explode(".",phpversion());
$pv=$pv[0].".".$pv[1];
$pv=$pv-4.1;

require ("escalConfig.php");

if ($resetEvents==1) { unset($es,$ee,$eTitle,$eDescription);
} if ($pv>=0) { if (!isset($mo)) $mo=$_REQUEST["mo"];
if (!isset($yr)) $yr=$_REQUEST["yr"];
if (!isset($ee)) $ee=$_REQUEST["ee"];
if (!isset($es)) $es=$_REQUEST["es"];
} if ($pv<0) { if (!isset($mo)) $mo=$HTTP_GET_VARS["mo"];
if (!isset($yr)) $yr=$HTTP_GET_VARS["yr"];
if (!isset($ee)) $ee=$HTTP_GET_VARS["ee"];
if (!isset($es)) $es=$HTTP_GET_VARS["es"];
} if (!function_exists('overLib')) { function overLib ($ev) { global $readSQL,$readFile;
ob_start();
require ("escalEVO.php");
$a=ob_get_contents();
ob_end_clean();
return addslashes(htmlentities(str_replace("\n","",str_replace("\r","",$a))));
} } $tz=date("Z")/3600;
if ($tz<0) {$timeZone=1;
} if ($tz>=0) {$timeZone=0;
} $dst=date("I");
$gmt=$gmt+$dst;
$tnum=intval(gmdate("U",time()+($gmt*3600))/86400);
if (!$mo) $mo=date("m",($tnum*86400)+(86400*$timeZone));
if (!$yr) $yr=date("Y",($tnum*86400)+(86400*$timeZone));
$daycount=intval(date ("U",gmmktime(3,0,0,$mo,1,$yr))/86400)-$weekDayStart;
$daycount=$daycount+$weekDayStart;
$mo=intval($mo);
$mn=$mth[$mo];
if ($displayYear==1) {$mn=$mn." ".$yr;
} $sd=date ("w",mktime(0,0,0,$mo,1-$weekDayStart,$yr));
$cd=1-$sd;
$nd=mktime (0,0,0,$mo+1,0,$yr);
$nd=(strftime ("%d",$nd))+1;
if ($readSQL==1 || $readFile==1) { $es="";
$ee="";
} if ($readFile==1) { if (file_exists("esdates.txt")) { $fp=fopen ("esdates.txt","r");
Do { $datas=fgetcsv ($fp,1000,",");
if (!$datas) break;
$es.="$datas[0]x";
$ee.=($datas[1]!="") ? "$datas[1]x":"$datas[0]x";
if ($datas[2]) { $datas[2]=eregi_replace("\"","''",$datas[2]);
$eTitle.="$datas[2]||";}
if ($datas[3]) { $datas[3]=eregi_replace("\"","''",$datas[3]);
$eDescription.="$datas[3]||";
} } WHILE ($datas);
fclose ($fp);
} } if ($readSQL==1) { $daysSQL=$nd-1;
$db=@mysql_connect($dbHost,$dbUserLogin,$dbPassword) or $error=(mysql_error()."<br>");
@mysql_select_db($dbName,$db) or $error.=(mysql_error());
if ($error) { echo "<font color=red>> There was an error connecting to the mySQL database.</font><br><br>";
echo "Please check the database settings in the 'escalConfig.php' file and try again.<br><br>";
echo "The error was reported as:<br>$error";
exit;
} $result=@mysql_query("SELECT * FROM calendar WHERE startdate<='$yr-$mo-$daysSQL' AND enddate>='$yr-$mo-01'",$db) or $error=(mysql_error()."<br>");
$myrow=@mysql_fetch_array($result);
if ($error) { echo "<font color=red> There was an error reading data from the mySQL database.</font><br><br>";
echo "Please check the database settings in the 'escalConfig.php' file and try again.<br><br>";
echo "You may need to run the installation script, escalInstall.php to initialize the database.<br><br>";
echo "The error was reported as:<br>$error";
exit;
} do { $es.=$myrow[startdate]."x";
$ee.=$myrow[enddate]."x";
$eTitle.=$myrow[title]."||";
$eDescription.=$myrow[description]."||";
} while ($myrow=mysql_fetch_array($result));
} $cellWidth=$tableWidth/7;
if ($es) { $es=explode ("x",$es);
$smc=count ($es);
$ee=explode ("x",$ee);
$eTitle=explode ("||",$eTitle);
$eDescription=explode ("||",$eDescription);
if ($smc==1) { $es[1]="3000-01-01";
$ee[1]="3000-01-01";
} } $i=0;
while ($i < $smc) { if (!$es[$i]) break;
$es[$i]=ereg_replace('-','/',$es[$i]);
$ee[$i]=ereg_replace('-','/',$ee[$i]);
$start=intval((strtotime($es[$i])+(date("O",strtotime($es[$i]))*36))/86400);
$end=intval((strtotime($ee[$i])+(date("O",strtotime($ee[$i]))*36))/86400);
if ($end>($daycount-1) && $start<($daycount+$nd+1)) { if (!$ee[$i] || ($es[$i]==$ee[$i])) { $bgc[$start]=2;
$et[$start]=(isset($et[$start]) && $et[$start]) ? ">> Multiple Events <<":$eTitle[$i];
} else { $bgc[$start]=(isset($bgc[$start]) && $bgc[$start]) ? 4:1;
$bgc[$end]=3;
$et[$start]=(isset($et[$start]) && $et[$start]) ? ">> Multiple Events <<":$eTitle[$i];
$et[$end]=(isset($et[$end]) && $et[$end]) ? ">> Multiple Events <<":$eTitle[$i];
for ($n=($start+1);
$n < $end;
$n++) { $bgc[$n]=2;
$et[$n]=(isset($et[$n]) && $et[$n]) ? ">> Multiple Events <<":$eTitle[$i];
} } } $i++;
} if ($standardPop==1) { echo "<script language=\"JavaScript\" type=\"text/JavaScript\">\n";
echo "<!--\n";
echo "function popupEvent(ev,w,h) {\n";
echo " var winl=(screen.width-w) / 2;
\n";
echo " var wint=(screen.height-h) / 2;
\n";
echo " win=window.open(\"/calendarevents/escalEV.php?ev=\"+ev+\"&readFile=$readFile&readSQL=$readSQL\",\"ESCalendar\",\"scrollbars=yes,status=no,location=no,toolbar=no,menubar=no,directories=no,resizable=yes,width=\"+w+\",height=\"+h+\",top=\"+wint+\",left=\"+winl+\"\");
\n";
echo " if (parseInt(navigator.appVersion) >=4) { win.window.focus();
}\n";
echo " }\n";
echo "//-->\n";
echo "</script>\n";
} echo "<table class=mainTable WIDTH=$tableWidth CELLSPACING=$cellSpacing CELLPADDING=$cellPadding BORDER=0 align=center>\n";
echo " <tr>\n";
echo " <td CLASS=\"monthYearText monthYearRow\" colspan=\"7\" title=\"Easily Simple Calendar 4.5\">\n $mn\n </td>\n";
echo " </tr>\n";
echo " <tr CLASS=dayNamesText>\n";
for ($I=0;
$I<7;
$I++) { $dayprint=$weekDayStart+$I;if ($dayprint>6) $dayprint=$dayprint-7;
echo" <td class=dayNamesRow WIDTH=$cellWidth>$day[$dayprint]</td>\n";
} echo " </tr>\n";
for ($i=1;
$i<7;
$i++) { if ($cd>=$nd && $displayEmptyRows!=1) { break;
} echo " <tr class=rows>\n";
for ($prow=1;
$prow<8;
$prow++) { if ($daycount==$tnum && $highlightToday==1 && $cd>0 && $cd<$nd) { echo " <td class=\"s2$bgc[$daycount] today\"";
if ($et[$daycount]!="") { if ($overLIB==1) {echo " onmouseover=\"return overlib('".overLib($daycount)."',WIDTH,$olWidth,DELAY,100,FGCOLOR,'#FFFFFF',BGCOLOR,'#AAAAAA');
\" onmouseout=\"return nd();
\"";
$et[$daycount]="";
} if ($standardPop==1) {echo " title=\"$et[$daycount]\" onClick=\"popupEvent($daycount,$popupWidth,$popupHeight)\" style=\"cursor:hand;
\"";
} } echo ">$cd</td>\n";
$daycount++;
$cd++;
} else { if ($cd>0 && $cd<$nd) { echo " <td class=s2$bgc[$daycount]";
if ($et[$daycount]!="") { if ($overLIB==1) {echo " onmouseover=\"return overlib('".overLib($daycount)."',WIDTH,$olWidth,DELAY,100,FGCOLOR,'#FFFFFF',BGCOLOR,'#AAAAAA');
\" onmouseout=\"return nd();
\"";
$et[$daycount]="";
} if ($standardPop==1) {echo " title=\"$et[$daycount]\" onClick=\"popupEvent($daycount,$popupWidth,$popupHeight)\" style=\"cursor:pointer;
cursor:hand;
\"";
} } echo ">$cd</td>\n";$daycount++;
} else { echo " <td class=s20>&nbsp;
</td>\n";
} $cd++;
} } echo "</tr>\n";
} echo "</table>\n";
?>

