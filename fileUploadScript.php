<?php

session_start();

if($_SESSION['password']=="a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3")
{
 ?>
<!--this is what displays if the passord is set-->
<!--Enter protected contents here-->
 <h1>Change the database</h1>
 <h2>Upload the Excel file<h2>
 <form method="post" action="" id="logout_form">
  <input type="submit" name="page_logout" value="LOGOUT">
 </form>

  <?php


    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['xlsx']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a Excel spreadsheet";
      }

      if ($fileSize > 1000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }
    
    $command = escapeshellcmd('python3 MakeDatabase.py . $fileName');
    $output = shell_exec($command);
    
      
    }

  if(isset($_POST['page_logout']))
  {
   unset($_SESSION['password']);
  }
} else{
  ?>
  <h1>Login Incorrect</h1>
  <h2>Page restricted to managment</h2>
  <body onload="goBack()">

  <script>//add scripts for when user is logged out
    function goBack() {
      location.replace("https://PHPLogin.duckit.repl.co")
    }  
  </script>

    <?php
  
}


  ?>
  
<html>
  <head>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
</html>