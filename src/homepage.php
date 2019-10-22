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
                                echo '<li class="nav-item right-side-padding"><a href="challenge.php">Log Off></a>Organizer</li>';
                        }
			if($roles_values['isadmin'] != 0){
                                echo '<li class="nav-item right-side-padding">Administrator</li>';
                        }
		     ?>
                    <li class="nav-item right-side-padding"><a href="logout.php">Log Off></a></li>
                </ul>
            </nav>
        </div>

	<!--Put main content in pages here-->
	<div class="main-content">
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
