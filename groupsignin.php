
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/infosecure.css" />
        <link rel="icon" href="images/infosecure logo8.png"/>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
         <?php
          $gname=$_REQUEST["data"];
          session_start();
         $gname= $_SESSION['Groupname'];
        ?>
        <div>
            <h1><img class="logo" src="images/infosecure logo8.png" alt="Infosecure logo">&nbsp;INFOSECURE</h1>
        </div>
        <h2 align="center">File sharing made easier</h2>
        <div class="container-fluid">
            <p>
                <ul class="topnav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="groupuser.html">Group User</a></li>
                    <li><a href="logout.php">Logout</a>
                </ul>
            
            <div class="center">
                <h3 align="center">Enter Username and Password</h3>
                <form action="validategroup.php" method="POST" >
                    <p>
                        Username <input type="text" name="uname" size="20" placeholder="Enter your username" required/><br/>
                        Password <input type="password" name="pass" size="10" placeholder="Enter password" required/><br/>
                        <button type="submit" name="submit" class="btn-lg btn-primary"><i class="fa fa-chevron-circle-right" aria-hidden="true">&nbsp;Submit</i></button>
                    </p>
                </form>
            </div>
        </div>
        <footer>&copy; 2017 All Rights Reserved.<br/> Developed by Giridharan, Keerthana, Mitali and Suchith</footer>
    </body>
</html>
