<html>
<head>
<title>Javascript Practice</title>
</head>
<body>
<H1>CONTENTS</H1>
<ol>
<li><A HREF="CHECK JAVASCRIPT ENABLED/JavascriptEnabledCheck.html">Check if Javascript is enabled</A></li>
<li><A HREF="JAVASCRIPT LOCATION/JavascriptLocation.html">JavaScipt Location</A></li>
<li><A HREF="JAVASCRIPT OPERATORS/JavascriptOperators.html">Javascript Operators</A></li>
<li><A HREF="JAVASCRIPT VARIABLES/JavascriptVariables.html">Javascript Variables</A></li>
<li><A HREF="JAVASCRIPT FUNCTIONS/JavascriptFunctions.html">Javascript Functions</A></li>
<li><A HREF="JAVASCRIPT EVENTS/JavascriptEvents.html">Javascript Events</A></li>
<li><A HREF="JAVASCRIPT STATEMENTS/JavascriptStatements.html">Javascript Statements</A></li>
<li><A HREF="JAVASCRIPT ARRAYS/JavascriptArrays.html">Javascript Arrays</A></li>
<li><A HREF="JAVASCRIPT OBJECTS/JavascriptObjects.html">Javascript Objects</A></li>
<li><A HREF="JAVASCRIPT BROWSER OBJECT MODEL/JavascriptBrowserObjectModel.html">Javascript Browser Object Model</A></li>
<li><A HREF="JAVASCRIPT DOCUMENT OBJECT MODEL/JavascriptDom.html">Javascript Document Object Model</A></li>

<li><A HREF="JAVASCRIPT FORMS/JavascriptForms.html">Javascript Forms</A></li>


DOM
Javascript Strings and Manipulation
write "function arguments" in "functions"
write "variable scope"  in "variables"
js and html elements
js and images...geolocation and maps
js and html canvas
js libraries



<li><A HREF="JAVASCRIPT/JAVASCRIPT EXAMPLES/JavascriptExamples.html">Javascript Examples</A></li>
</ol>


<br>------------------------------------------------------------------------------------------------<br/>

<h1>My First JavaScript</h1>

<p>Click Date to display current day, date, and time.</p>

<button type="button" onclick="myFunction()">Date</button>

<p id="demo"></p>

<script>
<!--
document.write("This will display only if javascript is active");

function myFunction() {
    document.getElementById("demo").innerHTML = Date();
}
//-->
</script>


<br>------------------------------------------------------------------------------------------------<br/>

<h1>My Second JavaScript</h1>
<script>
function changeImage() {
    var image = document.getElementById('myImage');
    if (image.src.match("bulbon")) {
        image.src = "pic_bulboff.gif";
    } else {
        image.src = "pic_bulbon.gif";
    }
}
</script>

<img id="myImage" onclick="changeImage()" src="pic_bulboff.gif" width="100" height="180">



<br>------------------------------------------------------------------------------------------------<br/>
<h1>My Third JavaScript</h1>

<p id="demo1">JavaScript can change the style of an HTML element.</p>

<script>
function StyleChange() {
    var x = document.getElementById("demo1");
    x.style.fontSize = "25px";           
    x.style.color = "red"; 
}
</script>

<button type="button" onclick="StyleChange()">Click Me!</button>
<br>------------------------------------------------------------------------------------------------<br/>


</body>
</html>
