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
