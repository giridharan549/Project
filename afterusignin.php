
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Welcome Page</title>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/infosecure.css" />
        <link rel="icon" href="infosecure logo8.png"/>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>INFOSECURE</h1>
        <h2 align="center"> File sharing made easier </h2>
        <div>
            <p>
                <a href="index.html">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="grouprequest.php">Group</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="groupuser.html">Group User</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--<a href="groupadmin.html">Group Admin</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <a href="logout.php">logout</a>
            </p>
            <?php
             session_start();
             if(isset($_SESSION['Username'])){
                 echo "<script language='javascript' type='text/javascript'>
				alert('successfully logged in');
				</script>";
             }
             else        
             {
                 echo "<script language='javascript' type='text/javascript'>
				alert('you are currently logged out');
				</script>";
                header("location: groupadminsignin.html");
             }
            ?>
        </div>
        <footer class="atEnd">&copy; 2017 All Rights Reserved.<br/> Developed by Giridharan, Keerthana, Mitali and Suchith</footer>
    </body>
</html>
