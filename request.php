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
			$name=$email=$i=NULL;
			if(isset($_POST['submit'])) {
                            session_start();
                            $name=$_SESSION['Username'];
                            $gname=$_SESSION['Gname'];
                            $email=$_POST['email'];
                            
                        }else echo "error";
			
$con=mysqli_connect("localhost","root","549Jackie!","infosecure");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"insert into request (Name,Email,group_name) values('$name','$email','$gname')");
unset($_SESSION['Gname']);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
else{
			echo "<script  type='text/javascript'>
			alert('request has been sent');
                        window.location.replace(\"grouprequest.php\");
				</script>";
mysqli_close($con);}
		?>
       
    </body>
</html>

