<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$scholarname=$_POST['scholarname'];
	@$rgtype=$_POST['rgtype'];
	@$rgthesisname=$_POST['rgthesisname'];
	@$rgstatus=$_POST['rgstatus'];
	@$pyear=$_POST['pyear'];
	@$docno=$_POST['docno'];
	if($scholarname && isset($rgtype) && $rgthesisname && $rgstatus && $pyear)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into rguidance (uidai,scholarname,rgtype,rgthesisname,rgstatus,pyear,docno) values('".$user."','".$scholarname."','".$rgtype."','".$rgthesisname."','".$rgstatus."','".$pyear."','".$docno."')";
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
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Research Guidance Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Scholar Name</th><th>Guidance Type</th><th>Thesis Title</th><th>Guidance Status</th><th>Guidance Year (Started in)</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from rguidance where uidai='".$user."' order by pyear";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1['scholarname'].'</td><td>';
	if($row1["rgtype"]=='1'){echo"PhD";}
	if($row1["rgtype"]=='0'){echo"PG";}
	echo'</td><td>'.$row1['rgthesisname'].'</td><td>';
	if($row1["rgstatus"]=='1'){echo"Awarded";}
	if($row1["rgstatus"]=='0'){echo"Submitted";}
	echo'</td><td>'.$row1['pyear'].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="rguidancedetails" /><input type="hidden" name="scholarname" value="'.$row1["scholarname"].'" /><input type="hidden" name="rgthesisname" value="'.$row1["rgthesisname"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="rguidancedetails" /><input type="hidden" name="scholarname" value="'.$row1["scholarname"].'" /><input type="hidden" name="rgthesisname" value="'.$row1["rgthesisname"].'" /><input type="submit" name="rguidancedetails" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Guidance Type</p></td><td><select name="rgtype">
<option value="1">PhD</option>
<option value="0">PG</option>
</select><br></td></tr>
<tr><td><p align="right">Scholar Name:</p></td><td>
<input type="text" name="scholarname" />
<br></td></tr>
<tr><td><p align="right">Thesis Title</p></td><td><input type="text" name="rgthesisname"><br></td></tr>
<tr><td><p align="right">Guidance Status</p></td><td><select name="rgstatus">
<option value="1">Awardwed</option>
<option value="0">Submitted</option>
</select<br></td></tr>
<tr><td><p align="right">Guidance Year(Started in)</p></td><td><input type="number" name="pyear"><br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="rguidancedetails" value="rguidancedetails" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>