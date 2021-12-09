<?php
	header("Content-Security-Policy: img-src https://*; child-src 'none'; frame-ancestors 'self'; base-uri 'self';  form-action 'self';  font-src: 'self';");

 // Policies that break search : default-src 'self'; 
?>

<html>
<head>
  <link rel="manifest" href="/manifest.json" crossorigin="use-credentials">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>

  <title>Search</title>

  <script>
    if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./serviceWorker.js')
      .then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }).catch(function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
  }
  </script>
</head>

<h1>Map</h1>
<body>

<form>

<div class='se'>
<input id="search" type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search for a room number or a teacher..."/autofocus><br>
</form>
</div>

<div id="livesearch"></div>
<noscript>Sorry, your browser does not support JavaScript!</noscript>







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



<p class='navbar' style="position: relative;" ><a href="https://github.com/Thisisntarelname/phpajaxxml">Source | </a><a href="forms.google.com">Report an error | </a><a href="/about.html">Made by Fake Name and Name Fake</a></p>

</body>
</html>