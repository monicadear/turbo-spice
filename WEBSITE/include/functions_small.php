<?php 
$random = 1; //don't remove ..and don't ask!
require_once(realpath(dirname(__FILE__))."/../admin/config/db.php");
function theDate($format, $str) { 
	
        $year = substr($str,0,4); 
        $month = substr($str,4,2); 
        $day = substr($str,6,2); 
        $hour = substr($str,8,2); 
        $min = substr($str,10,2); 
        $sec = substr($str,12,2); 
        
        return date($format,mktime($hour,$min,$sec,$month,$day,$year)); 
    } 
//the function merely replaces certain parts of $ostr and returns the mod. string.
function htmltostr($ostr){
	
	$trans["&amp;"] = "&"; 
	$trans["&#039;"] = "'";
	$trans["&lt;"] = "<";
	$trans["&gt;"] = ">";
	$trans["&lt;input"] = "input_";
	$trans["javascript"] = "j_script";

	return strtr($ostr,$trans);
}
function nltextout($ostr){
	$trans["<BR>"] = "\r\n"; 
	$trans["<BR><BR>"] = "\r\n\r\n"; 
	
	
	return strtr(htmltostr($ostr),$trans);
}
//this function will parse the $dbdate string which is in format YYYYMMDD
//and return a custom date object
function makedate($dbdate){
	
	$ret->y = substr("$dbdate", 0, 4);
	$ret->m = substr("$dbdate", 5, 2);
	$ret->d = substr("$dbdate", 8, 2); 
	$ret->monthname = date("F",mktime(0,0,0,$ret->m,$ret->d,$ret->y));
	
	return $ret;
}
//returns $_GET[$varname] if it is set
function getVar($varname){
	if (isset($_GET[$varname])) return $_GET[$varname];
	return "";	
}
function getVarPost($varname){
	if (isset($_POST[$varname])) return $_POST[$varname];
	return "";	
}
//try post, if emty grab get
function getVarPG($varname){
	if (isset($_POST[$varname])) return $_POST[$varname];
	return getVar($varname);
}
function redirect($destination){
	
	header("Location: $destination"); /* Redirect browser */
	/* Make sure that code below does not get executed when we redirect. */
	exit;	
}


function sql_nores($stmt){
	global $connection;
	return mysql_query($stmt, $connection) or dbg_diesql("Couldn't execute queryX\n$stmt\n".mysql_error());
	
}
function sql_fetch_assoc($stmt){
	global $connection;
	$sql_result = sql_query($stmt);
	return  mysql_fetch_assoc($sql_result);
}
function sql_fetch_row($stmt){
	global $connection;
	$sql_result = sql_query($stmt);
	return  mysql_fetch_row($sql_result);
}

function sql_fetch_assoc_res($stmt){
	global $connection;
	return sql_query($stmt);
	
}

function sql_fetch_firstcell($stmt) {
	$result = sql_fetch_row($stmt);
	return is_array($result)? $result[0] : false;
}


function sql_query(&$stmt){
	global $connection;
	$res = mysql_query($stmt, $connection) or dbg_diesql("Couldn't execute query2\n$stmt\n");
	return $res;
}



function dbg_pre($v){
	dbg_prea($v,'');
}
function dbg_att($v){ //attention buffy!
	dbg_prea($v,'a');	
}
function dbg_prea($v,$c=''){
	echo "<pre class=dbg$c>";
	print($v);
	echo "</pre>";	
}


function dbg_prer(&$a,$h='',$act = ''){
	
	echo "<pre class=dbg>";
	if ($h!='') echo "$h\n\n";
	print_r($a);
	echo "</pre>";
	if ($act=='die') die('');
}
function dbg_die($v){
	dbg_pre($v . "\nExiting\n");
	exit;
}
function dbg_diesql($v){
	dbg_pre($v."\nLast Error:\n\n".mysql_error());
	exit;
}

//DO NOT ADD NEWLINES AFTER last PHP line ( ?  > )!!!
?>