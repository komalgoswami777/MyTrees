<?php
  $conn=mysqli_connect("localhost","root","","mytrees");
  if($conn->connect_error){
  	die("connection failed:".$conn->connect_error);
  }
  $uname=$_REQUEST['uname'];
  $email_id=$_REQUEST['email_id'];
  $password=$_REQUEST['pass'];

  $sql_u="SELECT * from registration_master WHERE email_id='$email_id'";
  $res_u=mysqli_query($conn,$sql_u);

  if(mysqli_num_rows($res_u)>0){
   
     echo '<script>
         alert("sorry...username already exist.");
         location.href="http://localhost/SE/eduversity/web/index.html";
      </script>';
  }
  else{

  $sql="INSERT INTO registration_master VALUES ('$uname','$email_id','$password')";

  if(mysqli_query($conn,$sql)){
  	
     echo '<script>
         alert("Your data stored successfully.");
         location.href="http://localhost/hackthon/tree.html";
      </script>';
  }
  else{
  	echo "ERROR: Hush !sorry $sql.".mysqli_error($conn);
  }
}
  mysqli_close($conn);

?>

