<?php
    $con=mysqli_connect("localhost","root","549Jackie!");
    mysqli_select_db($con,"infosecure");
    $query="select * from groups";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    while($row)
    {
        $gname=$row["group_name"];
        $query1=mysqli_query($con,"select * from $gname");
        $num=NULL;
        $num= mysqli_num_rows($result);
        for($i=1;$i<=$num;$i++)
        {
            $pass=rand(1111111111,99999999999);
            $result1 = mysqli_query($con,"UPDATE $gname SET password='$pass' where group_id='$i'");
            if (!$result1)
            {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }
            
        }
    }
    mysqli_close($con);
?>