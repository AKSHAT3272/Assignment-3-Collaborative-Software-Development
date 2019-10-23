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
				echo '<li class="nav-item right-side-padding"><a href ="participant.php">Participant</a></li>';
			}
			if($roles_values['isorganizer'] != 0){
                                echo '<li class="nav-item right-side-padding"><a href="challenges.php">Organizer</a></li>';
                        }
			if($roles_values['isadmin'] != 0){
                                echo '<li class="nav-item right-side-padding"><a href = "admin.php">Administrator</a></li>';
                        }
		     ?>
                    <li class="nav-item right-side-padding"><a href="logout.php">Log Off </a></li>
                </ul>
            </nav>
        </div>

	<!--Put main content in pages here-->
	<div class="main-content">
	<div class="row">
            	 <div class = "col-md-6" align="center"><br>

	<h1> Users </h1>
	<?php
	$result = mysqli_query($db,"SELECT * FROM User;"); 
	?>
	
	<div class="container">
	<table id="myTable">
	<tr>
	<th> Username &nbsp; </th>
	<th> Type of user &nbsp; </th>
	</tr>

	<?php
		while($row = mysqli_fetch_assoc($result))
		{	//var_dump($row);
			echo "<tr>";
			echo "<td>" .$row['username']."</td>";
		 	//$isparticipant = $row['isParticipant'];

				echo "<td>"; 
				if($row['isParticipant'] != 0){ echo '&nbsp; Participant';}
				if($row['isOrganizer'] != 0) { echo '&nbsp; Organizer';}
				if($row['isAdmin'] != 0) { echo '&nbsp; Administrator'; }
				echo "</td>";
				echo '<form action="remove.php" method="post">
				<td> <input type="hidden" value = "'.$row['username'].'" name="username">';
				echo ' <input type="submit" value="Delete"> </td> </form>';

		}
		
	?>
	</tr>
	</table>
	</div>
	</div>
		<div class="col-md-6" align="center">
		<form action="insert.php" method="post" id="form" class="container">
		<div align="left"><br>
		<h2> Add a User </h2>
		<input  name="username" type="text" placeholder="Username">
		<input name="password" type="password" placeholder="Password"> <br><br>
		<h3> Roles: </h3> <br>
		 <input type='hidden' value='0' name='isparticipant'>
		<input type="checkbox"  name="isparticipant" value="1">&nbsp; Is a Participant <br><br>
		 <input type='hidden' value='0' name='isadmin'>
		<input type="checkbox"  name="isadmin" value="1">&nbsp; Is a Admin <br><br>
		 <input type='hidden' value='0' name='isorganizer'>
		<input type="checkbox"  name="isorganizer" value="1">&nbsp; Is a Organizer <br><br>
		<p> *You can check multiple roles </p>
		 <input id="submit" type="submit" value="ADD">
		</div>
		</form>
		</div>	
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

