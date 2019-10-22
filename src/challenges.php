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
		<div class="row">
			<div class = "col-md-6" align="center">
				<h1> Challenges </h1>
				<?php
					$result = mysqli_query($db,"SELECT * FROM Challenge where challengeid in (select organizerchallenge.challengeid from organizerchallenge
									where username='$user_check');");
				?>

				<div class="container">
			 		<table id = "myTable">
	    					<tr>
	      						<th>ChallengeID &nbsp;</th>
	      						<th>Problem &nbsp;</th>
	      						<th>Solution &nbsp; </th>
	     					</tr>

     						<?php
		
							while($row = mysqli_fetch_array($result)) 
							{
								echo "<tr>";
								echo "<td>".$row['challengeID']."</td>";
								echo "<td>".$row['problem']."</td>";
								echo "<td>".$row['solution']."</td>";
								echo '<form action="remove.php" method="post">
									<td> <input type="hidden" value = "'.$row['challengeID'].'" name="challengeID">';
								echo ' <input type="submit" value="Delete"> </td> </form>';
							} 
              						/*  while ($row = mysqli_fetch_array($result)) {
		    	
                   	 				 echo "<tr>";
                    					 echo "<td>".$row['challengeID']."</td>";
                    					 echo "<td>".$row['problem']."</td>";
		    					 echo "<td>".$row['solution']."</td>";
		     					 echo '<form action="remove.php" method="post">
							 <td> <input type="hidden" value="'.$row['challengeID'].'" name="challengeID">
							<input type="submit" value="Delete"> </td> </form> '; } */

   							?>
						</tr>
  					 </table>
				</div>

				<br>
				<br>
				<br>
				<div>
 					 <form action="insert.php" method="get" id="form" class = "container">
						<h2> Create new challenge </h2>
						<!--<input name="challengeID" type="text" placeholder="Challenge ID"> -->
			
						 <input name="problem" type="text" placeholder="Problem">
      						 <input name="solution" type="text" placeholder="Solution">
     						 <input id="submit" type="submit" value="SAVE">

					</form>
				</div>
			</div>
				<div class = "col-md-6" align="center">
					<h1> Active participants and problems</h1>
					<div class="scrollable">
						<?php
							//get the challenges that match the id of the organizer
							$challenges_query = "select challengeid from organizerchallenge where username='".$user_check."';";
							$challenges_sql = mysqli_query($db,$challenges_query);
							while($row = mysqli_fetch_array($challenges_sql)){
								//get the problem description from challenge table and display
								$challenge_problem_query = "select problem from challenge where challengeid=".$row['challengeid']." limit 1;";
								$challenge_problem_sql = mysqli_query($db,$challenge_problem_query);
								$challenge_problem = mysqli_fetch_assoc($challenge_problem_sql);
								echo "<h2>".$row['challengeid'].":  ".$challenge_problem['problem']."</h2>";
								//get the solutions posted by participants
								$challenge_solutions_query = "select username, attempt from participantchallenge where challengeid=".$row['challengeid'].";";
								$challenge_solutions_sql = mysqli_query($db, $challenge_solutions_query);
								echo "<table align='left' class='table-left-side-padding'> <tr> <th>User Name &nbsp;</th><th>Attempt &nbsp;</th></tr>";
								while($ind_solution = mysqli_fetch_array($challenge_solutions_sql)){
								}
								echo "</table>";
							}
							//get the solutions from the participants that match the id of each challenge
						?>
					</div>
				</div>
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
