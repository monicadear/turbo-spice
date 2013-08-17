<script type="text/javascript">
	// <![CDATA[
		if ( typeof tinyMCE != "undefined" && tinyMCE.configs.length > 0 )
			document.getElementById("quicktags").style.display="none";

		function edInsertContent(myField, myValue) {
			//IE support
			if (document.selection) {
				myField.focus();
				sel = document.selection.createRange();
				sel.text = myValue;
				myField.focus();
			}
			//MOZILLA/NETSCAPE support
			else if (myField.selectionStart || myField.selectionStart == "0") {
				var startPos = myField.selectionStart;
				var endPos = myField.selectionEnd;
				myField.value = myField.value.substring(0, startPos)
				              + myValue 
		                      + myField.value.substring(endPos, myField.value.length);
				myField.focus();
				myField.selectionStart = startPos + myValue.length;
				myField.selectionEnd = startPos + myValue.length;
			} else {
				myField.value += myValue;
				myField.focus();
			}
		}
	// ]]>
	</script>
