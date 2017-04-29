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
                <a href="group.php">Group</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="logout.php">logout</a>
            </p>
<?php
             session_start();
             if(isset($_SESSION['Username']))
            {
                $con=mysqli_connect("localhost","root","549Jackie!","infosecure");
                if (mysqli_connect_errno())
                {
                 echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $result = mysqli_query($con,"SELECT * FROM groups");
                if (!$result) 
                {
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                }
                $num=NULL;
                $num= mysqli_num_rows($result);
                if($num>0)
                {
                    echo "<table border='1'>
                    <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Action</th>
                    </tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        $i=$row['group_id'];
                        echo "<td>" . $i. "</td>";
                        echo "<td>" . $row['group_name'] . "</td>";
                        $gname=$row['group_name'];
                        echo "<td><a href='groupsignin.php?data=$gname'>Signin</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                mysqli_close($con);
            }
                else        
                {
                 echo "<script language='javascript' type='text/javascript'>
				alert('you are currently logged out');
                                window.location.replace(\"grouprequest.php\");
				</script>";
            }
?>
            <p>Create group <a href="creategroup.php">Click here!</a>
            </p>
        </div>
        <footer class="atEnd">&copy; 2017 All Rights Reserved.<br/> Developed by Giridharan, Keerthana, Mitali and Suchith</footer>
    </body>
</html>
