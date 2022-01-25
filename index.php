<?php
	header("Content-Security-Policy: img-src https://*; frame-ancestors 'self'; base-uri 'self';  form-action 'self';  font-src 'self';upgrade-insecure-requests; object-src https://School-Website.codeeatspennies.repl.co;");

 // Policies that break search : default-src 'self'; script-src 'anything'; 
?>

<html>
<head>
  <link rel="manifest" href="/manifest.json" crossorigin="use-credentials">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>
  <meta name="mobile-web-app-capable" content="yes">


  <title>Search</title>

  <script src=/serviceworkerfromindex.js></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />


</head>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px w3-theme-l4" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button w3-theme-d4 ">X</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">Search</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">Map</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d2 w3-text-vivid-white">oasd.org</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d1">About</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-theme-d1">Report a Problem</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-xlarge w3-theme-d3" style="max-width:100%;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-center w3-padding-16">OHS Map and Search</div>
  </div>
</div>
  
<body>


<div class='se'>
<form>
<input spellcheck="false" id="search" type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search for a room number or a teacher..."/autofocus><br>
</form>
</div>

<div id="livesearch"></div>

<noscript>
<h1>The search and map functions will not work without javascript<h1>
</noscript>

<!--<div id='map'></div>
<script src="map.js"></script>
UnComment this to load the map
-->


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>



<div class="w3-container w3-black">
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