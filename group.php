<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/infosecure.css" />
        <link rel="icon" href="images/infosecure logo8.png"/>
        <title>First page</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1><img class="logo" src="images/infosecure logo8.png" alt="Infosecure logo">&nbsp;INFOSECURE</h1>
        </div>
        <?php
          $gname=$_REQUEST["data"];
          session_start();
          $_SESSION['Gname']=$gname;
        ?>
        <h2> File sharing made easier </h2>
        <div class="container-fluid">
           
                <ul class="topnav">
                    <li><a href="index.html">Home</a></li>
                    <li><a class="active" href="group.php">Group</a></li>
                    <li><a href="groupuser.html">Group User</a></li>
                    <li><a href="groupadmin.html">Group Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
        <div class="center">
                <form action="request.php" method="POST">
                    <p>
                        Email-ID:<input type="text" name="email" required/><br />
                       <button type="submit" name="submit" class="btn-lg btn-primary">&nbsp;request&nbsp;</button>
                    </p>
                </form>
        </div>
            <p>Create group <a href="creategroup.html">click here!</a>
            Existing user <a href="groupsignin.html">Sign in</a></p>
        
            <footer class="atEnd">&copy; 2017 All Rights Reserved.<br/> Developed by Giridharan, Keerthana, Mitali and Suchith</footer>
        </div>
        
    </body>
</html>