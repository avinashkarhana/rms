<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$projectname=$_POST['projectname'];
	@$projtype=$_POST['projtype'];
	@$projamount=$_POST['projamount'];
	@$projfundingajency=$_POST['projfundingajency'];
	@$projdur=$_POST['projdur'];
	@$pyear=$_POST['pyear'];
	@$docno=$_POST['docno'];
	if($projectname && isset($projtype) && $projamount && $projfundingajency && $projdur && $pyear)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into rprojects (uidai,projectname,projtype,projamount,projfundingajency,projdur,pyear,docno) values('".$user."','".$projectname."','".$projtype."','".$projamount."','".$projfundingajency."','".$projdur."','".$pyear."','".$docno."')";
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
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Research Project Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Project Name</th><th>Project Type</th><th>Project Amount</th><th>Project Funding Ajency</th><th>Project Duration (Months)</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from rprojects where uidai='".$user."' order by pyear";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1['projectname'].'</td><td>';
	if($row1["projtype"]=='1'){echo"Major";}
	if($row1["projtype"]=='0'){echo"Minor";}
	echo'</td><td>'.$row1['projamount'].'</td><td>'.$row1['projfundingajency'].'</td><td>'.$row1['projdur'].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="rprojectdetails" /><input type="hidden" name="projectname" value="'.$row1["projectname"].'" /><input type="hidden" name="projamount" value="'.$row1["projamount"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="rprojectdetails" /><input type="hidden" name="projectname" value="'.$row1["projectname"].'" /><input type="hidden" name="projamount" value="'.$row1["projamount"].'" /><input type="submit" name="rprojectdetails" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Project Title:</p></td><td>
<input type="text" name="projectname" />
<br></td></tr>
<tr><td><p align="right">Project Type</p></td><td><select name="projtype">
<option value="1">Major</option>
<option value="0">Minor</option>
</select><br></td></tr>
<tr><td><p align="right">Project Amount</p></td><td><input type="number" name="projamount"><br></td></tr>
<tr><td><p align="right">Project Funding Ajency</p></td><td><input type="text" name="projfundingajency"><br></td></tr>
<tr><td><p align="right">Project Duration (In Months)</p></td><td><input type="number" name="projdur"><br></td></tr>
<tr><td><p align="right">Project Year(Started in)</p></td><td><input type="number" name="pyear"><br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="rprojectdetails" value="rprojectdetails" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>