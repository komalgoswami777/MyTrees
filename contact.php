<?php
  $conn=mysqli_connect("localhost","root","","mytree");
  if($conn->connect_error){
  	die("connection failed:".$conn->connect_error);
  }
  $name=$_REQUEST['name'];
  $email_id=$_REQUEST['email'];
  $mobile_no=$_REQUEST['mob'];
  $message=$_REQUEST['msg'];

  $sql="INSERT INTO contact_master VALUES ('$name','$email_id',
  	'$mobile_no','$message')";

  if(mysqli_query($conn,$sql)){
  	 echo '<script>
         alert("Your message sent successfully.");
         location.href="http://localhost/hackthon/index.html";
      </script>';
  }
  else{
  	echo "ERROR: Hush !sorry $sql.".mysqli_error($conn);
  }
  mysqli_close($conn);

?>
