<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("inthenews_nav.php"); ?><h1>Admin: Input "In the News" link</h1><p><B>You may input a new "in the news" link within the site.</B></p><form enctype='multipart/form-data' method='post'  action='php_handler.php'>


<input type=hidden name="category" value=1>


Submitter's name: <? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"><BR><BR>

 <table border=0><tr> <td width="100" align="right"><span class=red>Release Date:</span></td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option> </select> <select name="startday"> <option selected>Day</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option> </select> <select name="startyear"> 

<? $todayyear=date(Y);
$todayyearplusone=$todayyear+1;
?>
<option selected>Year</option><option SELECTED><?echo"$todayyear";?></option><option><?echo"$todayyearplusone";?></option> </select> mm-dd-yyyy</td> </tr> </table>
Title of Link<BR>(e.g. Organization Receives Award): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>

Source (e.g. New York Times): <input type='text' name='source' value='<?echo"$source";?>' size='35'><BR><BR>


Text of news item (keep a copy of the article text in case the original link goes down)<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>

Enter the weblink, if any, that this news link will go to:<BR>(e.g. http://www.nytimes.com): <input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR><BR>

<input type='hidden' name='showorder' value='1'>


<input type='submit' name='enter' value='submit'></form><BR><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>