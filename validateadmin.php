<html>
    <body>
        <?php	
                        session_start();
                        $name=$pass=$hash=$count=NULL;
			if(isset($_POST['submit']))
			{
				$name=$_POST['uname'];
				$pass=$_POST['pass'];
                                $hash=sha1($pass);      
			}
			else
			{	
                            echo "no connection established";
			}
			$con=mysqli_connect("localhost","root","549Jackie!","infosecure");
                        if (mysqli_connect_errno())
                        {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $result = mysqli_query($con,"SELECT * FROM groupadmin WHERE uname='$name' and password='$hash'");
                        if (!$result)
                        {
                            printf("Error: %s\n", mysqli_error($con));
                             exit();
                        }   
                        $count= mysqli_num_rows($result);
                        if($count==1)
                        {
                                $_SESSION['Username'] = $name;
				header("Location:afterasignin.php");
                        }
                        else
                        {
                                echo "<script language='javascript' type='text/javascript'>
				alert('invalid username or password');
                                window.location.replace(\"groupadmin.html\");
                                </script>";
                        }
                        mysqli_close($con);
                        
?>
    </body>
</html>
			

        
