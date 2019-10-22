<?php
include ('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
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
        <!-- Add color to the main menu, change dimensions of it to whatever, etc-->
        <div class="main-menu">
            <div class = "menu-header"><center>
                <!-- Header ICON? BIg letter here(first letter of username)-->
		<div class="profile-icon">
			<?php echo $user_check[0];?>
		</div>

		<div class="username"><?php echo $user_check;?></div>
            </div></center>

            <!-- Navbar - later should dynamically load options, but for now are hard coded-->
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav navbar-center">
		    <?php
			if($roles_values['isparticipant'] != 0){
				echo '<li class="nav-item right-side-padding">Participant</li>';
			}
			if($roles_values['isorganizer'] != 0){
                                echo '<li class="nav-item right-side-padding">Organizer</li>';
                        }
			if($roles_values['isadmin'] != 0){
                                echo '<li class="nav-item right-side-padding">Administrator</li>';
                        }
		     ?>
                    <li class="nav-item right-side-padding"><a href="logout.php">Log Off</a></li>
                </ul>
            </nav>
        </div>

	<!--Put main content in pages here-->
	<div class="main-content">
<h1> Challenges </h1>
<?php
$con=mysqli_connect("localhost","michaelpascale","","michaelpascale");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT challengeID,problem FROM Challenge;");

?>
    <form action="" method="post">
<div class="container">
  <table id = "myTable">
    <tr>
      <th>ChallengeID &nbsp;</th>
      <th>Problem &nbsp;</th>
     </tr>

     <?php
               while ($row = mysqli_fetch_assoc($result)) {
                     echo "<tr>";
                     echo "<td>".$row['challengeID']."</td>";
                     echo "<td>".$row['problem']."</td>";

                     echo "</tr>";
}
   ?>
   </table>
   </form>
	</div>

<br>
<br>
<br>
<div>
  <form action="insert.php" method="get" id="form" class = "container">
<h2> Create new challenge </h2>
<input name="challengeID" type="text" placeholder="Challenge ID">

		  <input name="problem" type="text" placeholder="Problem">
      <input name="solution" type="text" placeholder="Solution">
      <input id="submit" type="submit" value="SAVE">

</form>
</div>
        <!-- Footer - change css when possible-->
        <footer class="page-footer font-small footer-main">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
                Adelphi University
            </div>
        </footer>
    </body>
</html>
