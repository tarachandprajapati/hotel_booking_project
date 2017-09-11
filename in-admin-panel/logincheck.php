<?php
//session start
session_start();
include 'conn.php';
          $qry="select * from admin_credentials where username='" . ($_REQUEST['username']) ."' and password='" . ($_REQUEST['password']) ."'";
          
          $result = mysqli_query($conn,$qry);
		  
		  if (mysqli_num_rows($result) > 0)
		  {
                if($row=mysqli_fetch_array($result))
                {
						$_SESSION['user_admin']=($_REQUEST['username']);
						$_SESSION['user_admin_type']=$row['user_type'];
			          	
						echo header("Location: dashboard.php");
			   
				}
		  }
		  else
		  {
			 echo header("Location: login.php?error=login");
		  } 
?>

