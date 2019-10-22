<?php
   include("session.php");
   if($db->connect_errno)
        {
                echo "Connect Failed: ". $db->connect_error;
                exit();
        }

         var_dump($_REQUEST);
         //Challenge table
         if (isset($_REQUEST['problem'])){ $problem=$_REQUEST['problem']; }
         if (isset($_REQUEST['solution'])){ $solution=$_REQUEST['solution']; }

         if(isset($_REQUEST['problem']))
         {
            $sql="INSERT INTO `Challenge`(problem, solution)
                  VALUES ('$problem','$solution');";
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

       ?>
