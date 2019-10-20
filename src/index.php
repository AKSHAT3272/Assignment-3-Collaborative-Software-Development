<?php
include ('session.php');
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>This is a test</title>


</head>
<body>
<h1> Welcome! <?php echo $user_check; ?> </h1>
<p> <?php if(!$roles_sql){echo $roles_query;}else{echo "wow";echo implode(",",$roles_values);} ?></p>
</body>
</html>
