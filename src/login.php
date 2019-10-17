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
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
	<head>
	<title> Login Screen</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>


	<body>
		<div class = "header">
		<h1><image src = "assets/logo.png">Name<h1>
		</div
				<div class = "container">
				<form action= "" method = "post" align = "center">
          <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
          <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
          <input type = "submit" value = " Submit "/><br />
        </form>
			</div>

	</body>
	 <div class = "footer">
	<p>test<br></p>
	</div>
 </html>
