<?php
session_start();

if(isset($_POST['submit_pass']) && $_POST['pass'])
{
 $pass=$_POST['pass'];
 $pass=hash('sha256', $pass);
 if($pass=="a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3")
 {
  $_SESSION['password']=$pass;
 }
 else
 {
  $error="Incorrect Pssword";
 }
}

if(isset($_POST['page_logout']))
{
 unset($_SESSION['password']);
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div id="wrapper">

<?php
if($_SESSION['password']=="a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3")
{
 ?>
 <!--Enter protected contents here-->

 <h1>Admin Page</h1>
 <h2>Create a new database<h2>
 <form method="post" action="" id="logout_form">
  <input type="submit" name="page_logout" value="LOGOUT">
 </form>


  
  <form action="fileUploadScript.php" method="post" enctype="multipart/form-data" id="fileToUpload">
  Upload a File:
  <input type="file" name="the_file" id="fileToUpload">
  <input type="submit" name="submit" value="Submit" id="submitButton">  </form>











   
 <?php
}
else
{
 ?>
 <form method="post" action="" id="login_form">
  <h1>LOGIN TO PROCEED</h1>
  <input type="password" name="pass" placeholder="*******">
  <input type="submit" name="submit_pass" value="Login">
  <p>"Password : 123"</p>
  <p><font style="color:red;"><?php echo $error;?></font></p>
 </form>
 <?php	
}
?>

</div>
</body>
</html>