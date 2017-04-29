<html>
    <body>
        <?php
			session_start();
			$name=$pass=$hash=NULL;
			if(isset($_POST['submit']))
			{
				$name=$_POST['uname'];
				$pass=$_POST['pass'];
                                $gname=$_SESSION['Groupname'];
			}
			else
			{
				echo "You haven't entered username or password";
			}
			$con=mysqli_connect("localhost","root","549Jackie!","infosecure");
// Check connection
                        if (mysqli_connect_errno())
                        {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $result = mysqli_query($con,"SELECT * FROM $gname WHERE name='$name' and password='$pass'");
                        if (!$result)
                        {
                            printf("Error: %s\n", mysqli_error($con));
                             exit();
                        }   
                        $count= mysqli_num_rows($result);
                        if($count==1)
                        {
                                $_SESSION['Username'] = $name;
				header("Location:aftergsignin.php");
                        }
                        else
                        {
				echo "<script language='javascript' type='text/javascript'>
				alert('invalid username or password');
                                window.location.replace(\"groupsignin.html\");
				</script>";
                        }
                        mysqli_close($con);
?>
    </body>
</html>
			

        
