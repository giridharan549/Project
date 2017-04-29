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
        <link rel="stylesheet" type="text/css" href="infosecure.css" />
        <link rel="icon" href="infosecure logo8.png"/>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
                $name=$pass=$dob=$email=$hash=NULL;
           if(isset($_POST['submit']))
           {
            $name=$_POST['uname'];
            $pass=$_POST['pass'];
            $hash=sha1($pass);
            $gname=$_POST['gname'];
            $email=$_POST['email'];
           }
        $con=mysqli_connect("localhost","root","549Jackie!");
        mysqli_select_db($con,"infosecure");
        $sql="CREATE TABLE $gname (group_id int NOT NULL AUTO_INCREMENT,name varchar(255) NOT NULL,email varchar(255),password varchar(255), PRIMARY KEY (group_id,name))";
        if(!mysqli_query($con,$sql))
        {
             printf("Error: %s\n", mysqli_error($con));
                exit();
        }
        $sig=rand(1111111111,9999999999);
        $query1="INSERT INTO groups (group_name,signature) VALUES ('$gname','$sig')";
        if(!mysqli_query($con,$query1))
        {
             printf("Error: %s\n", mysqli_error($con));
                exit();
        }
        $query="INSERT INTO groupadmin (uname,password,group_name,email) VALUES ('$name','$hash','$gname','$email')";
        if(!mysqli_query($con,$query))
        {
             printf("Error: %s\n", mysqli_error($con));
                exit();
        }
        else
        {
            echo "<script  type='text/javascript'>
            alert('user account created successsfully');
            window.location.replace(\"group.php\");
            </script>";
        }      
        mysqli_close($con);
    ?>
       
    </body>
</html>
