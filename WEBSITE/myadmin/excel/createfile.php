<?$submit_enterexcel=$_POST['submit_enterexcel'];if ($submit_enterexcel) {/*Insert into database */$tabletoexport=$_POST['tabletoexport'];$date = date("Y")."-".date("m")."-".date("d")."_".date("h").".".date("i").".".date("s");include ("../../codes/adminconfig.php");$dbx = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $excelsql = "select * from $tabletoexport";$excelresult= mysql_query($excelsql,$connection) or die ("Couldn't count the records in the table");$excelcount = mysql_num_fields($excelresult);for ($k = 0; $k < $excelcount; $k++){    $header .= mysql_field_name($excelresult, $k)."\t";}while($rowx = mysql_fetch_row($excelresult)){  $line = '';  foreach($rowx as $value){    if(!isset($value) || $value == ""){      $value = "\t";    }else{# important to escape any quotes to preserve them in the data.      $value = str_replace('"', '""', $value);# needed to encapsulate data in quotes because some data might be multi line.# the good news is that numbers remain numbers in Excel even though quoted.      $value = '"' . $value . '"' . "\t";    }    $line .= $value;  }  $data .= trim($line)."\n";}# this line is needed because returns embedded in the data have "\r"# and this looks like a "box character" in Excel  $data = str_replace("\r", "", $data);# Nice to let someone know that the search came up empty.# Otherwise only the column name headers will be output to Excel.if ($data == "") {  $data = "\nno matching records found\n";}# This line will stream the file to the user rather than spray it across the screenheader("Content-type: application/octet-stream");# replace filename with whatever you want the filename to default to$titleoffile=$tabletoexport."_".$date."_"."WEBSITEFILES.xls";# replace excelfile.xls with whatever you want the filename to default toheader("Content-Disposition: attachment; filename=$titleoffile");header("Pragma: no-cache");header("Expires: 0");echo $header."\n".$data;} ?><?unset ($k);unset ($rowx);unset ($line);unset ($value);unset ($dbx);unset ($excelsql);unset ($excelresult);unset ($excelcount);unset ($tabletoexport);unset ($date);unset ($header);unset ($data);?>