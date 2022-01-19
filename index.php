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

  <title>Search</title>

  <script src=/serviceworkerfromindex.js></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<div class="navbar">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/map">Map</a></li>
    <li><a href="/search">Search</a></li>
    <li><a href="/report">Report a mistake</a></li>
    <input class="navSearch" type="text"  placeholder="Search..">

  </ul>
</div>
<body>

<form>
<div class='se'>
<input spellcheck="false" id="search" type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search for a room number or a teacher..."/autofocus><br>
</form>
</div>

<div id="livesearch"></div>

<noscript>
<h1>The search and map functions will not work without javascript<h1>
</noscript>







<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>



<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>





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