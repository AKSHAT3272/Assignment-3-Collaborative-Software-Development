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

       ?>
