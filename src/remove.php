<?php
   include("config.php");
   if($db->connect_errno)
        {
                echo "Connect Failed: ". $db->connect_error;
                exit();
        }


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
		print_r($_POST);
		if(isset($_POST['challengeID'])) {
			$rowID = intval($_POST['challengeID']);
			$organizer_challenge_remove = mysqli_query($db,"delete from organizerchallenge where challengeID=$rowID LIMIT 1;");
			$query = "DELETE FROM Challenge WHERE challengeID=$rowID LIMIT 1;";
			$result= mysqli_query($db,$query);
				if($result == TRUE)
				{
				header('Location: challenges.php');
				}
				else
				{
				echo "Error: " . $query . "<br>" . $db->error;
				}
			}

	  	if(isset($_POST['username'])) {
				
			$user = $_POST['username'];
			$delete_q ="DELETE FROM `User` WHERE username='$user' LIMIT 1;";
			$delete_q .="DELETE FROM `Login` WHERE username='$user' LIMIT 1;";
			$del_result = $db->multi_query($delete_q);
				if($del_result == TRUE){
                        		header('Location: admin.php');
			
				}
				else{
					echo "Error: " . $delete_q . "<br>" . $db->error;
				}
		}	
	}
?>
