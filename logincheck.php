<?php
session_start();
@$user=$_SESSION['useradnllnlled'];
$qwerty=$_SERVER['PHP_SELF'];
$xnor=1;
$yesiam=1;
$ASDF="/rms/register.php";
$QWERTY='/rms/index.php';
$QWERTY1='/rms/';
if(!$user){
	if($qwerty!==$ASDF && $qwerty!=="/rms/forgot_pass.php" && $qwerty!=="/rms/adverts.php"){
		if($qwerty!==$QWERTY || $qwerty!==$QWERTY)
			header("Location: /rms/");
		}
	}
else{
 include"conn.php";
	$db->query("use rms");
	$bb=$db->query("select uidai from candidates");
	while($row=mysqli_fetch_assoc($bb))
	{
		if($user==$row['uidai'])
		{
			if($qwerty!=='/rms/home.php')
				header("Location: /rms/home.php");	
			$xnor=1;
			break;
		}
		else
		{
			$xnor=0;
		}
	}
	$bbb=$db->query("select user from users");
	while($row1=mysqli_fetch_assoc($bbb))
	{
		if($user==$row1['user']){
			if($qwerty!=='/rms/adlogin.php');
				header("Location: /rms/adlogin.php");
			$yesiam=1;
			break;				
			}
		else
		{
			$yesiam=0;
		}
	}
}
if($xnor==0 && $yesiam==0)
		{
			if($qwerty!==$QWERTY || $qwerty!==$QWERTY)
			{echo"<<>>".$xnor."<<>>".$yesiam."<<>>";
			header("Location: /rms/index.php");}
		}	
?>
