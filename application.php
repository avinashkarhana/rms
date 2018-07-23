<?php 
@include "logincheck.php";
@$advertno=$_POST['advertno'];
@$dcode=$_POST['dcode'];
@$pcode=$_POST['pcode'];
@$appstatus=$_POST['appstatus'];
@$appno=$_POST['appno'];
	include"conn.php";
	$db->query("use rms");
	$today=date("Y-m-d");
	$i=1; 
	$ajjkidate=date('c');
	if($appstatus){
	$save1=$db->query("update applications set status=1 where appno='".$appno."'");
	if($save1)
		echo"<script>alert('Successfully Applied !\n Do not forget to SUBMIT after conformation option available in Status Column')</script>";
}
if($pcode){
	$save=$db->query("INSERT INTO `applications` (`appno`, `uidai`, `advertno`, `pcode`, `dcode`, `appdate`, `status`, `score`) VALUES ('', '".$user."', '".$advertno."', '".$pcode."', '".$dcode."', '".$ajjkidate."', '0', '')");
	if($save)
		echo"<script>alert('Successfully Applied')</script>";
	$advertno='';
	$dcode='';
	$pcode='';
}

echo'<h2 style="margin-bottom:0;padding-bottom=0;">Applied for Posts</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Application No.</th><th>Department</th><th>Post</th><th>Post Type</th><th>Advert Number</th><th>Application Date</th><th>Status</th><th>Score on basis of Details Submitted</th><th></th></tr>';
$qe="select * from applications where uidai='".$user."' order by appdate";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	
	$rq=mysqli_fetch_assoc($db->query("select * from department where dcode='".$row1['dcode']."'"));
	$rqq=mysqli_fetch_assoc($db->query("select * from post where pcode='".$row1['pcode']."'"));
	echo'<tr><td>'.$row1['appno'].'</td><td>'.$rq["dname"].'</td><td>'.$rqq['pname'].'</td><td>'.$rqq['ptype'].'</td><td>'.$row1['advertno'].'</td><td>'.$row1['appdate'].'</td><td>'.$row1['status'];
	if($row1['status']==0)
	echo'<form style="display:inline;" action=""  method="POST"><input type="hidden" name="appstatus" value="appstatus" /><input type="hidden" name="appno" value="'.$row1["appno"].'" /><input type="submit" name="application" value="Submit" /></form>';
	echo'</td><td>';
	if($row1['score']==0){echo"Under Evaluation";}
	else{echo$row['score'];}
	echo'</td><td>
	<form style="display:inline;" action="printpre.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="application" /><input type="hidden" name="appno" value="'.$row1["appno"].'" /><input type="submit" name="application" value="Print Preview" /></form>
	<form action="rmdetails.php"  style="display:inline;" method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="application" /><input type="hidden" name="appno" value="'.$row1["appno"].'" /><input type="hidden" name="advertno" value="'.$row1["advertno"].'" /><input type="submit" name="application" value="Delete" /></form></td></tr>';
}
echo'</table>';


	$qer="select * from advert where adcdate>'".$today."'";
	$a=$db->query($qer);
	echo"<form action='home.php' method='POST'>Select an Advert<select style='padding:0.5px;width:auto;' name='advertno'>";
	while($row=mysqli_fetch_assoc($a))
	{
		if($advertno==$row['advertno'])
			echo"<option value='".$row['advertno']."' selected>".$row['adname']."</option>";
		else
			echo"<option value='".$row['advertno']."'>".$row['adname']."</option>";
	}
	echo"</select><input type='hidden' name='application' value='application' /><input type='submit' style='display:inline;' /></form>";
if($advertno)
{
	$qer="select * from advert_details where advertno='".$advertno."'";
	$a=$db->query($qer);
	echo"<form action='home.php' method='POST'>Select Department<select style='padding:0.5px;width:auto;' name='dcode'>";
	while($row=mysqli_fetch_assoc($a))
	{
		$as="select * from department where dcode='".$row['dcode']."'";
		$zx=$db->query($as);
		while($row1=mysqli_fetch_assoc($zx)){
			$az="select * from school where scode='".$row1['scode']."'";
			echo$az;
		$row11=mysqli_fetch_assoc($db->query($az));
		if($dcode==$row['dcode'])
			echo"<option value='".$row['dcode']."' selected>".$row1['dname']."-".$row11['sname']."</option>";
		else
			echo"<option value='".$row['dcode']."'>".$row1['dname']."-".$row11['sname']."</option>";
		}
	}
	echo"</select><input type='hidden' name='application' value='application' /><input type='hidden' name='advertno' value='".$advertno."' /><input type='submit' /></form>";
}
if($dcode)
{
	$qer="select * from advert_details where advertno='".$advertno."' AND dcode='".$dcode."'";
	$a=$db->query($qer);
	echo"<form action='home.php' method='POST'>Select Post<select style='padding:0.5px;width:auto;' name='pcode'>";
	$ru=mysqli_fetch_assoc($db->query("select * from candidates where uidai='".$user."'"));
	while($row=mysqli_fetch_assoc($a))
	{
		if($row['catcode']==$ru['catcode']){
			$az="select * from post where pcode='".$row['pcode']."'";
			echo$az;
		$row11=mysqli_fetch_assoc($db->query($az));
		if($pcode==$row['pcode'])
			echo"<option value='".$row['pcode']."' selected>".$row11['pname']."-".$row11['ptype']."</option>";
		else
			echo"<option value='".$row['pcode']."'>".$row11['pname']."-".$row11['ptype']."</option>";
		}
		
	}
	echo"</select><input type='hidden' name='application' value='application' /><input type='hidden' name='advertno' value='".$advertno."' /><input type='hidden' name='dcode' value='".$dcode."' /><input type='Submit' Value='Apply' /></form>";
	
}

	
?>