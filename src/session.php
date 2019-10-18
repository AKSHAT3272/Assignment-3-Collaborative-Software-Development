<?php
   include('config.php');
   session_start();
  if(!($_SESSION['login'])){
    header("Location:login.php");
    exit();
}
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select username from Login where username = '$user_check' ");
   
   $roles_query = "select isparticipant, isadmin, isorganizer from User where username = '$user_check'";
   $roles_sql = mysqli_query($db, $roles_query);
   $roles_values = mysqli_fetch_array($roles_sql,MYSQLI_ASSOC);

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
