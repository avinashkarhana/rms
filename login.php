<?php
$date=date('H:i j F Y');
$user=$_POST["uidai"];
$pass=$_POST["pass"];
include "conn.php";
if(!get_magic_quotes_gpc())
{
 $user=addslashes($user);	
 $pass=addslashes($pass);
}
if(!mysqli_query($db,'use rms'))
echo"Can't connect to database";
$sql1="select pass from users where user='".$user."'";
$sql="select pass from candidates where uidai like '".$user."'";
$result=mysqli_query($db,$sql);
$result1=mysqli_query($db,$sql1);
$dpass=mysqli_fetch_assoc($result);
$ddpass=$dpass['pass'];
$dpass1=mysqli_fetch_assoc($result1);
$ddpass1=$dpass1['pass'];
session_start();
if(mysqli_num_rows($result1)>0)
{
	   if($ddpass1==$pass)
	       {
		   mysqli_query($db,'update users set last_login="'.$date.'" where user like "'.$user.'"');
		   $_SESSION['useradnllnlled'] = $user; 
		   header("Location: /rms/adlogin.php");
		   } 
       else
           echo'Wrong Password<br><br><a href="/rms/">Try Again</a>';
}
else
{
	if(mysqli_num_rows($result)>0)
    {
	   if($ddpass==$pass)
	       {
		   mysqli_query($db,'update candidate set last_login="'.$date.'" where uidai like "'.$user.'"');
		   $_SESSION['useradnllnlled'] = $user; 
		   header("Location: /rms/home.php");
		   } 
       else
           echo'Wrong Password<br><br><a href="/rms/">Try Again</a>';
	   
    }
    else
       echo'No such user exist.<a href="index.php">Try Again</a><br><br><br><a href="register.php">Register</a>';	
}

?>