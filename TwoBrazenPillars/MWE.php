<!DOCTYPE html>
<html>
<head>
<script>
window.onload = function() {
    // Look for input box and insert key handler
    var prevTxt = null;
    var txt = document.getElementsByName('filterTxt');
    if ( txt != null ) {
        txt[0].onkeyup=function(event) {
            var e = event || window.event;
            var curTxt = txt[0].value;
            handleKeyPress(prevTxt,curTxt);
            prevTxt = curTxt;
            return true;
        }
    }
}
</script>
</head>
<body>

<p>A function is triggered when the user releases a key in the input field. The function transforms the character to upper case.</p>
Enter your name: <input type="text" id="fname" onkeyup="myFunction()">

</body>
</html>
