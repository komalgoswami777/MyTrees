<?php

    $servername="localhost";
    $database="mytrees";
    $username="root";
    $password="";

    $conn=mysqli_connect($servername,$username,$password,$database);

    if($conn->connect_error){
      die("connection failed: ".$conn->connect_error);
    }


    if(isset($_POST['uname'])&&isset($_POST['pass'])){


      function validate($data){

        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
      }

      $uname=validate($_POST['uname']);
      $pass=validate($_POST['pass']);

  $sql="select * from registration_master where email_id='$uname'and password='$pass'";

  $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

      $row=mysqli_fetch_assoc($result);
        if($row['email_id']===$uname && $row['password']===$pass){

          echo "Logged in !";
          $_SESSION['username']=$row['username'];
          $_SESSION['password']=$row['password'];
          header("location:course.html");
          exit();
        }
        else{

        header("location:index.html");
        exit();
        }
      }
    }
    mysqli_close($conn);
?>
