<?php
   include("config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT username FROM Login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
$_SESSION['login'] = true;
   //      session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: homepage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<head>
<title> Login Screen</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- link rel="stylesheet" href="stylesheets/main.css" -->
<link rel="stylesheet" href="../config/main.css">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>


<body>
  <div class="main-menu">
        <div class = "menu-header">
  <header>
  <h1><image src = "assets/download.png">RankerHack<h1> </header>
  </div>
</div>

<div class = "container" id="div1">
    <caption><h2 align=center>Log In to RankerHack </h2> </caption>

      <form action= "" method = "post" align = "center">

    <label>UserName  &nbsp;</label><input type = "text" name = "username" class = "box"/><br /><br/>
  <label>Password  &nbsp;&nbsp;&nbsp;</label><input type = "password" name = "password" class = "box" /><br/><br/>
  <input type = "submit" value = " Log In "/><br/> </td> </tr>

      </form>

    </div>

</body>
<footer class="page-footer font-small footer-main">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        Adelphi University
    </div>
</footer>
</html>
