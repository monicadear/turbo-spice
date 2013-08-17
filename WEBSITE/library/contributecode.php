<table border=0 align=center><tr><td><img src="/images/cc/logo_ccMC.gif" border="0"></td><td><img src="/images/cc/logo_ccVisa.gif" border="0"></td><td><img src="/images/cc/logo_ccDiscover.gif" border="0"></td><td><img src="/images/cc/logo_ccAmex.gif" border="0"></td><td><img src="/images/cc/logo_PayPal.gif" border="0"></td></tr></table>


<SCRIPT LANGUAGE="JavaScript">
<!--
function noEntry() {
	if (document.donation_form.amount.value.length<1) {
alert("Please fill in the amount of your donation.");
return false; }

else { return true; }
}
// -->
</SCRIPT>





<?


$todayyear=date(Y);
$todaymonth=date(M);

$validuntil=$todayyear+1;

echo "<br><div id=indent>";
echo "Thank you for your support.<BR>\n";
?>

<?
echo "<form name='donation_form' method='get' action='https://www.paypal.com/cgi-bin/webscr' onsubmit='return noEntry()'><input type='hidden' name='cmd' value='_ext-enter'>";
echo "<input type='hidden' name='redirect_cmd' value='_xclick'>
<input type='hidden' name='business' value='$paypalemail'>
<input type='hidden' name='no_note' value='1'>
<input type='hidden' name='no_shipping' value='0'>
<input type='hidden' name='return' value='$basewebsite/pages/thankyou.php'>
<input type='hidden' name='image_url' value='/images/donate.jpg'>
<table cellpadding='4'>
<tr><td>Specify amount:</td><td>$<input type=text name=amount value='$amount' size=10><input type=hidden name=item_name value='Donation to $baseorg'>
</td></tr>
<tr>
<td align='right'>Notes:</td>
<td><input type='hidden' name='on0' value=notes><input type=text name=os0><BR>(questions, comments, or feedback)</td>
</tr>

<td colspan='2' align='center'><input type='submit' name='button' value=' Contribute '></td>
</tr></table> ";



echo "<a href=/pages/privacy.php>Privacy Policy</a><BR></div>";

?>
