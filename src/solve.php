<?php
   include("session.php");
   if($db->connect_errno)
        {
                echo "Connect Failed: ". $db->connect_error;
                exit();
        }

	$solved = "";
	 if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//print_r($_POST);
		if(isset($_POST['challengeID'])) {
			$rowID = intval($_POST['challengeID']);
			$sol = ($_POST['solution']);
			$query = "SELECT solution from challenge WHERE challengeID = $rowID AND solution = '$sol';";
			$result = mysqli_query($db,$query);
 			//Get entry in participant challenge if doesn't exists add one otherwise increment attempts and update attempt
			$entry = mysqli_query($db,"SELECT challengeid,numAttempts from ParticipantChallenge WHERE challengeID= $rowID;");
			
			$entry_info = mysqli_fetch_array($entry);
			if(count($entry_info) == 0)
			{
				$sql2 = mysqli_query($db,"INSERT INTO ParticipantChallenge (username,challengeID,Attempt, numAttempts) 
								VALUES ('$user_check' , $rowID, '$sol',1);"); 
				
			}
			else
			{
				$num_attempts = intval($entry_info['numAttempts']);

				$num_attempts++;
				 $sql2 = mysqli_query($db,"INSERT INTO ParticipantChallenge (username,challengeID,Attempt, numAttempts) 
                                                                                VALUES ('$user_check' , $rowID, '$sol',$num_attempts);");
			}
					
			if(count(mysqli_fetch_array($result)) != 0)
				{	
				$solved = "Correct";
				
				//echo "Solved";
				//header('Location: participant.php');
				}
				else
				{
				$solved = "Incorrect";
				
				//echo "Error: " . $query . "<br>" . $db->error;
				}
			}
		else { $solved = ""; }
		
	}
