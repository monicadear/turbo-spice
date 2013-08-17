<SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[1].title,"Please enter the title for this event."); // Check to make sure required information exists.           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].description,"Please enter the description.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].starttime,"Please enter the start time.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].endtime,"Please enter the end time.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].location,"Please enter the location.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].price,"Please enter the price for members, or put 0.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].pricenonmembers,"Please enter the price for nonmembers, or put 0.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].contact,"Please enter the contact.");            return CanSubmit;                     }--> </SCRIPT><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><?


?>

<?
if ($session->userlevel>="2"){?>

<table><FORM method=post action=/members/memberphp_handlercalendar.php ONSUBMIT='return ValidateData()';>
<?$todayyear=date(Y);
$todayyearplusone=$todayyear+1;
$todayyearplustwo=$todayyear+2;

?>

<tr> <td width="100" align="right">Start Date:</td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option> </select> <select name="startday"> <option selected>Day</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option> </select> <select name="startyear"> <option selected>Year</option><option SELECTED><?echo"$todayyear";?></option><option><?echo"$todayyearplusone";?></option><option><?echo"$todayyearplustwo";?></option> </select><BR>mm-dd-yyyy</td> </tr> <tr> <td width="100" align="right">End Date:</td> <td width="278" align="left">  <select name="endmonth"> <option selected>Month</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option> </select> <select name="endday"> <option selected>Day</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option> </select>  <select name="endyear"> <option selected>Year</option> <option SELECTED><?echo"$todayyear";?></option><option><?echo"$todayyearplusone";?></option><option><?echo"$todayyearplustwo";?></option> </select><BR>mm-dd-yyyy</td> </tr> 

<tr><th>Title<span class=red>*</span>:</th><td><input type ="text" name="title" rows="1" value="<?php echo $title ?>" size="25"></td></tr>

<tr><th valign=top>Description<span class=red>*</span>:</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=25>    <?echo "$description";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>

<tr><th>Time<span class=red>*</span>:</th><td><input name="starttime" id="starttime" size="10"> to <input name="endtime" id="endtime" size="10"><BR>e.g. 8:30am to 10:00am </td></tr><tr><th>Location<span class=red>*</span>:</th><td><input name="location" id="location" size="30"> </td></tr><? 
$price="0";
$pricenonmembers="0";
 ?>

<tr><th>Price (members)<span class=red>*</span>:</th><td>$<input name="price" id="price" value='<?echo"$price";?>' size="10"> 0 if no charge</td></tr><tr><th>Price (nonmembers/visitors)<span class=red>*</span>:</th><td>$<input name="pricenonmembers" id="pricenonmembers"  value='<?echo"$pricenonmembers";?>' size="10"> 0 if no charge</td></tr><tr><th>NAME OF CONTACT FOR THIS EVENT<span class=red>*</span>:</th><td><input name="contact" id="contact" size="25"><BR>(e.g. John)</td></tr><tr><th>Website for this event</th><td><input name="website" id="website" size="25"><BR>(e.g. http://www.google.com)</td></tr>



<tr><td></td><td><input type="checkbox" value="1" name="evt_type" checked onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> Only members may view this.</td></tr>

<tr><th>Tags:</th><td>
<input type ="text" name="tags" size="25" value="<?php echo $tags ?>"><BR>(add some descriptive tags, using commas to separate)
</td></tr>



<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)</FORM> </td></tr></table>

<?
}
else {
echo "You must be logged in to add a listing.<BR>\n";
}
?>
