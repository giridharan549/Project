
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
        <div class="container-fluid">
            <p>
                <ul class="topnav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="group.php">Group</a></li>
                    <li><a class="active" href="#groupadmin.html">Group Admin</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </p>
    </div>
	<?php
             session_start();
             
             if(isset($_SESSION['Username']))
             {
                 echo "<script language='javascript' type='text/javascript'>
				alert('successfully logged in');
				</script>";
             }
             else        
             {
                 echo "<script language='javascript' type='text/javascript'>
				alert('you are currently logged out');
                                window.location.replace(\"groupadmin.html\");
				</script>";
             }
            $con=mysqli_connect("localhost","root","549Jackie!","infosecure");
// Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $name=NULL;
            $name=$_SESSION['Username'];
            $result0 = mysqli_query($con,"SELECT group_name FROM groupadmin where uname='$name'");
            $row0= mysqli_fetch_array($result0);
            $groupname=$row0['group_name'];
            $result = mysqli_query($con,"SELECT * FROM request where group_name='$groupname'");
            if (!$result) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }
            $num=NULL;
            $num= mysqli_num_rows($result);
            if($num>0){
            echo "<table border='1'>
                  <tr>
                  <th>name</th>
                  <th>email</th>
                  <th>action</th>
                  </tr>";
           while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                $i=$row['ID'];
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td><a href='addmember.php?data=$i'>accept</a></td>";
                echo "</tr>";
            }
            echo "</table>";}

            mysqli_close($con);
        ?>
        </div>
        <footer class="atEnd">&copy; 2017 All Rights Reserved.<br/> Developed by Giridharan, Keerthana, Mitali and Suchith</footer>
    </body>
</html>
