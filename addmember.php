 <?php
		require 'PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->Username = "giridharan596@gmail.com";
		$mail->Password = "@549Jackie@!";
                $nam=$email=$no=$pass=$gname=NULL;
                session_start();
                $uname=$_SESSION['Username'];
                $con=mysqli_connect("localhost","root","549Jackie!","infosecure");
                $no=mysqli_real_escape_string($con,$_GET["data"]);
                if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $result = mysqli_query($con,"SELECT * FROM request WHERE ID='$no'");
                if (!$result)
                {
                    printf("Error:%s\n", mysqli_error($con));
                    exit();
                }
                $row = mysqli_fetch_array($result);
                $nam=$row["Name"];
                $email=$row["Email"];
                $gname=$row["group_name"];
                $pass=rand(1111111111,9999999999);
                $mail->addAddress("$email");
                $mail->Body="Your password for the group is '$pass'";
		if (!$mail->send()) 
                {
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
                else 
                {
			echo "<script language='javascript' type='text/javascript'>
				alert('Message sent');
				</script>";
                }
                $result1= mysqli_query($con,"INSERT INTO $gname (name,email,password) VALUES ('$nam','$email','$pass')");
                if (!$result1)
                {
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                }
                else
                {
                        $result2=mysqli_query($con,"DELETE FROM request WHERE ID='$no'");
                        if(!result2)
                        {
                            printf("Error: %s\n", mysqli_error($con));
                            exit();
                        }
                        else
                        {
                            header("Location: afterasignin.php");
                        }
                }
                mysqli_close($con);
?>