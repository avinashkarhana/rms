<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$expinst=$_POST['expinst'];
	@$expname=$_POST['expname'];
	@$exptype=$_POST['exptype'];
	@$expfrom=$_POST['expfrom'];
	@$expto=$_POST['expto'];
	@$exptotal=$_POST['exptotal'];
	@$docno=$_POST['docno'];
	@$expsal=$_POST['expsal'];
	if($expinst && isset($exptype) && $expname && $expto && isset($expfrom) && $exptotal && isset($expsal))
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into experience (expinst,expname,exptype,expfrom,expto,exptotal,expsal,uidai,docno) values('".$expinst."','".$expname."','".$exptype."','".$expfrom."' ,'".$expto."','".$exptotal."','".$expsal."','".$user."','".$docno."')";
		$query=$db->query($q);
		$e=$db->error;
		if(!$query)
		echo $e."error";
		if($e)
		{ echo $e;	}
		else
		{
			echo"<script>alert('Saved Successfuly !');</script>";
		}
	}
	else
	echo"Some Details Left Blank.";	
}
//Show
include"conn.php";
if(!$db->query("use rms"))
	echo'Can not connect to Database.<br><br>';
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Experience Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Experience Institute</th><th>Experience Name</th><th>Experience Type</th><th>Experience From</th><th>Experience To</th><th>Total Months of Experience</th><th>Sallary</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from experience where uidai='".$user."' order by expfrom";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1['expinst'].'</td><td>'.$row1['expname'].'</td><td>';
	if($row1["exptype"]=='1'){echo"Regular";}
	if($row1["exptype"]=='2'){echo"Temporary";}
	if($row1["exptype"]=='3'){echo"Adhoc";}
	if($row1["exptype"]=='4'){echo"Contract";}
	echo'</td><td>'.$row1['expfrom'].'</td><td>'.$row1['expto'].'</td><td>'.$row1['exptotal'].'</td><td>'.$row1['expsal'].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="experiencedetails" /><input type="hidden" name="expname" value="'.$row1["expname"].'" /><input type="hidden" name="expfrom" value="'.$row1["expfrom"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="experiencedetails" /><input type="hidden" name="expname" value="'.$row1["expname"].'" /><input type="hidden" name="expfrom" value="'.$row1["expfrom"].'" /><input type="submit" name="experiencedetails" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Experience Institute:</p></td><td>
<input type="text" name="expinst" />
<br></td></tr>
<tr><td><p align="right">Experience Name</p></td><td><input type="text" name="expname"><br></td></tr>
<tr><td><p align="right">Experience Type</p></td><td><select name="exptype">
<option value="1">Regular</option>
<option value="2">Temporary</option>
<option value="3">Adhoc</option>
<option value="4">Contract</option>
</select><br></td></tr>
<tr><td><p align="right">Experience From</p></td><td><input type="date" id="fromdate" name="expfrom"><br></td></tr>
<tr><td><p align="right">Experience To</p></td><td><input type="date" id ="todate" name="expto">
<br></td></tr>

<tr><td><p align="right">Total Months Of Experience (after rounding off)</p></td><td><input type="number" id="months" name="exptotal" editable="no">
<br></td></tr>
<tr><td><p align="right">Sallary</p></td><td><input type="number" name="expsal">
<br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="experiencedetails" value="experiencedetails" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>