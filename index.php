<?php
?>
<html>
<head>
  <link rel="manifest" href="/app.webmanifest" crossorigin="use-credentials">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>
  <title>Search</title>
</head>

<h1>Map</h1>
<body>

<form>

<div class='se'>
<input id="search" type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search for a room number or a teacher..."/autofocus><br>
<div id="livesearch"></div>
</form>
</div>

</body>
</html>