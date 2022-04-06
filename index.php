<?php
	header("Content-Security-Policy: img-src https://*; frame-ancestors 'self'; base-uri 'self';  form-action 'self';  font-src 'self'; upgrade-insecure-requests; object-src https://School-Website.codeeatspennies.repl.co;");



 // Policies that break search : default-src 'self'; script-src 'anything'; 
?>

<html>
<head>
  <link rel="manifest" href="/manifest.json" crossorigin="use-credentials">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link href="/style.css" rel="stylesheet" type="text/css" />
  <script src="/script.js"></script>
  <meta name="mobile-web-app-capable" content="yes">
  <title>Map of OHS</title>

  <script src=/serviceworkerfromindex.js></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button w3-theme-d4 ">X</a>
  <a href="/search" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">Search</a>
  <a href="/map" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">Map</a>
  <a href="/clusters/Clusters" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">Class Clusters</a>
  <a href="/lowinternet" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">Low internet page</a>
  <a href="https://oasd.org" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">oasd.org</a>
  <a href="/about" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d1">About</a>
  <a href="https://forms.gle/MdS2EnYSyWjEdCBL9" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d1">Report a Problem</a>
  <div class="w3-bar-item w3-theme-d1" style="width:40%;min-width:300px;word-wrap: break-word;">
  <button id="default" style="word-wrap: break-word;" type="button" class="w3-button default" onclick="themeDefault()">Default Style</button><br>
  <button id="dyslexia" type="button" class="w3-button dyslexia" onclick="themeDyslexia()">Dyslexia-Friendly Style</button><br>
  <button id="protanomaly" type="button" class="w3-button protanomaly" onclick="themeProtanomaly()">Protanomaly (red-green) Friendly Style</button><br>
  <button id="tritanomaly" type="button" class="w3-button tritanomaly" onclick="themeTritanomaly()">Tritanomaly (blue-yellow) Friendly Style</button><br>
  <!--<button id="autism" type="button" class="w3-button" onclick="themeAutism()">Autism Friendly Style</button><br>-->

    <!--FIIP: put autism buton with dyslexia to make the buttons cascading down in width-->
    
    <!--FIIP: Make buttons wrap to the next line for smaller screnens, laptops stay the same-->
    

  </div>
    

</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-xlarge navBar" style="max-width:100%;margin:auto">
    <div class="w3-button w3-padding-16 w3-left openButton" onclick="w3_open()" style="color: #D7D4DD">☰</div>
    <div class="w3-center w3-padding-16 title lat"><a href="/">OHS Map and Search    </a></div>
  </div>
</div>
  
<body>
<?php
$myfile = fopen("counter.txt", "r") or die("Unable to open file!");
$count = fread($myfile,filesize("counter.txt"));
fclose($myfile);
echo $count;

$myfile = fopen("counter.txt", "w") or die("Unable to open file!");
$txt = $count + 1;
fwrite($myfile, $txt);

fclose($myfile);


?> 

<div class='se'>
<form class="bigSearch">
<input class="bar" spellcheck="false" id="search" type="text" size="30" onkeyup="showResult(this.value)" autofocus placeholder="Search for a room number or a teacher..."><br>
</form>
</div>

<div id="livesearch"></div>

<noscript>
<h1>The search and map functions will not work without javascript<h1>
</noscript>

<!--<div id='map'></div>
<script src="map.js"></script>
Uncomment this to load the map
-->


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




<div class="w3-container">

  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-theme-d1">
      <h1>Where to?</h1>
    </header>

    <div class="w3-container" style="text-align:center">
      <p>Where is your room number destination?</p>
      
      <form class="w3-container" name="destinationForm">
        <input class="w3-input w3-animate-input" type="number" style="width:50%; margin:auto; text-align:center" id="destinationBar" name="destinationBar">

      </form>

    </div>


  </div>
</div>

<div class="submitButton">
  <button onclick="set();" class="w3-button w3-black button submitbutton">Submit</button>
</div


<div class="w3-container">

  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-theme-d1">
      <h1>Where are you?</h1>
    </header>

    <div class="w3-container" style="text-align:center">
      <p>What is the room number closest to you?</p>
    
      <form class="w3-container" name="fromForm">
        <input class="w3-input w3-animate-input" type="number" style="width:50%; margin:auto; text-align:center" id="fromBar" name="fromBar">
      </form>
    </div>


  </div>
</div>

<br><br><br><br><br>
<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

function set() {
  // set this with the destination and from numbers
  
  cookievalue= escape(document.fromForm.fromBar.value) + ";";
  document.cookie="from=" + cookievalue;

  cookievaluee= escape(document.destinationForm.destinationBar.value) + ";";
  document.cookie="destination=" + cookievaluee;

  //add pop up saying that the destination and from was succesfully set


}
</script>



<div class="w3-container w3-black w3-center footer">
  <br><br>
  
  <div class="bottomLinks">
  <a href="https://github.com/Thisisntarelname/phpajaxxml" class="bottomLinks">Source </a>
  |
  <a class="bottomLinks" href="forms.google.com"> Report an error </a>
  |
  <a class="bottomLinks" href="/about.html"> Made by Fake Name and Name Fake</a>
  </div>
  


  <br><br>
</div>
</body>

</html>