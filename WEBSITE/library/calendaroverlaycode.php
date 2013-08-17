
<div id=calendarcentral>
<!-- start calendar -->

<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;" ></div>
<script language="JavaScript" src="../calendarevents/overlib_mini.js"><!-- overLIB (c) Erik Bosrup --></script>
<div align=center>

<?php $OL=1; require ("../calendarevents/escal.php"); ?>

<?php
$yb=$yr;
$yf=$yr;
$mb=$mo-1;
if ($mb<1) {$mb=12; $yb=$yr-1;}
$mf=$mo+1;
if ($mf>12) {$mf=1; $yf=$yr+1;}
$ya = $yr-1;
$yz = $yr+1;


$searchitemyear=date(Y);
$searchitemmonth=date(m);
$searchitem=$searchitemyear."-".$searchitemmonth;

?>
<p align=center>
<a href="<?php echo "$PHP_SELF?pageid=$pageid&mo=$mb&yr=$ya" ?>">&lt;&lt;&lt;&lt;</a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="<?php echo "$PHP_SELF?pageid=$pageid&mo=$mb&yr=$yb" ?>">&lt;&lt;</a>
&nbsp;  &nbsp; 
<a href="<?php echo "$PHP_SELF?pageid=$pageid&mo=$mf&yr=$yf" ?>">&gt;&gt;</a>
&nbsp; &nbsp; &nbsp; &nbsp;
<a href="<?php echo "$PHP_SELF?pageid=$pageid&mo=$mb&yr=$yz" ?>">&gt;&gt;&gt;&gt;</a> 
</p>
<!-- end calendar -->
</div>

</div>

