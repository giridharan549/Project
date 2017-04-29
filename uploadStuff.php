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
       <div>
            <h1><img class="logo" src="images/infosecure logo8.png" alt="Infosecure logo">&nbsp;INFOSECURE</h1>
            <h2>File sharing made easier</h2>
        </div>
        <div class="container-fluid">
            <p>
                <ul class="topnav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="groupuser.html">Group User</a></li>
                    <li><a class="active" href="uploadStuff.html">Upload File</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
        </div>    
<?php
    $name=$_FILES['file']['name'];
    $extension=strtolower(substr($name, strpos($name,'.')+1));
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $max_size=26214400;
    $tmp_name=$_FILES['file']['tmp_name'];
       session_start();
         $gname= $_SESSION['Groupname'];
    //$error = $_FILES['file']['error'];
    $con=mysqli_connect("localhost","root","549Jackie!","infosecure");
// Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
if(isset($_SESSION['Username']))
{
    if(isset($name))
    {
        if (!empty($name))
        {
            if(($extension=='docx'||$extension=='pdf'||$extension=='jpg'||$extension=='jpeg')&& $size<=$max_size)
            {   
                $sql=mysqli_query($con,"SELECT signature FROM groups where group_name='$gname'");
                $row = mysqli_fetch_array($sql);
                $sig=$row['signature'];
                $result = mysqli_query($con,"INSERT INTO filerequest(file_name,uploaddnt,file_size,signature,group_name) VALUES ('$name',NOW(),'$size','$sig','$gname')");
                $location='uploads/';
                if(move_uploaded_file($tmp_name, $location.$name))
                {
                    echo "<script language='javascript' type='text/javascript'>
				alert('Sent to the admin for verification');
				</script>";
                }
                else
                {
                    echo "<script language='javascript' type='text/javascript'>
				alert('Uploading failed');
				</script>";
                }
            }
            else 
            {
                echo 'Please choose a file';  
            }
        }
    }
}
 else {    
 echo "<script language='javascript' type='text/javascript'>
				alert('Login to Upload');
				</script>";   
 }
?>
    </body>
</html>