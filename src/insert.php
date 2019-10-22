<?php
   include("config.php");
   if($db->connect_errno)
        {
                echo "Connect Failed: ". $db->connect_error;
                exit();
        }

         var_dump($_REQUEST);
         //Challenge table
         if (isset($_REQUEST['challengeID'])){ $challengeID=$_REQUEST['challengeID']; }
         if (isset($_REQUEST['problem'])){ $problem=$_REQUEST['problem']; }
         if (isset($_REQUEST['solution'])){ $solution=$_REQUEST['solution']; }
	 if (isset($_POST['username'])){$username=$_POST['username'];}
	 if (isset($_POST['password'])){$password=$_POST['password'];}
	 if (isset($_POST['isparticipant'])){$isparticipant=$_POST['isparticipant'];}
	 if (isset($_POST['isadmin'])){$isadmin=$_POST['isadmin'];}
	 if (isset($_POST['isorganizer'])){$isorganizer=$_POST['isorganizer'];}

         if(isset($_REQUEST['challengeID']))
         {
            $sql="INSERT INTO `Challenge`(challengeID, problem, solution)
                  VALUES ('$challengeID','$problem','$solution');";
                  if($db->query($sql) == TRUE)
                {


		//get the username from session, and get challenge id from what we just added
                $challenge_id_query = "Select challengeid from challenge where problem = '$problem' and
                                        solution ='$solution'";

                $challenge_id_sql = mysqli_query($db, $challenge_id_query);
                $challenge_id = mysqli_fetch_assoc($challenge_id_sql);

                //add a new organizer challenge
                $insert_query = "INSERT INTO `organizerchallenge` (username, challengeid)
                        VALUES ('$user_check', ".$challenge_id['challengeid'].");";
		mysqli_query($db,$insert_query);
		echo $insert_query;
                        echo "New challenge successfully created";
                    header('Location: challenges.php');
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }

         }
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['username']))
	{
		      $insert_q =" INSERT INTO `Login` (username,password) VALUES('$username','$password');";
	        $insert_q .= "INSERT INTO `User`(username,isparticipant,isadmin,isorganizer) VALUES ('$username','$isparticipant','$isadmin','$isorganizer');";
	        $insert_result = $db->multi_query($insert_q);
			if($insert_result == TRUE)
                {
                        echo "New challenge successfully created";
                    header('Location: admin.php');
                }
                else
                {
                        echo "Error: " . $insert_result . "<br>" . $db->error;
                }
	}
}

       ?>
