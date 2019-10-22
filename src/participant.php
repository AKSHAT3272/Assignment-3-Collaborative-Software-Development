<!DOCTYPE html>
<html>
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
					<div class = "menu-header"><center>
		<header>
		<h1><image src = "assets/download.png">RankerHack<h1> </header>
		</div>
	</div>
	<!--Put main content in pages here-->
	<div class="main-content">
	<h1> Challenges </h1>
	<?php
	$result = mysqli_query($db,"SELECT * FROM Challenge;");
	$arr2 = array(array(1,2,3,4), array(5,6,7,8));
	?>
	
	<div class="container">
  <table id = "myTable">
    <tr>
      <th>ChallengeID &nbsp;</th>
      <th>Problem &nbsp;</th>
        </tr>

		
		<?php
		
		while($row = mysql_fetch_array($result))
		{
		
			echo "<tr>";
			echo "<td>".$row['challengeID']."</td>";
			echo "<td>".$row['problem']."</td>";
			echo '<form action ="remove.php" method ="post">
				<td> <input type = "hidden" value = "'.row['challengeID'].'" name= "challengeID">';
		}
		
		?>
	</tr>
		</table>
		 </div>
		 
		 <div>
		  <form>
		   <input  name="Solution" type= "textfield">
		   <input id= "submit" type="submit">
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