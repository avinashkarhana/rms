<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$pubtype=$_POST['pubtype'];
	@$booktype=$_POST['booktype'];
	@$bookname=$_POST['bookname'];
	@$byear=$_POST['byear'];
	@$isbn=$_POST['isbn'];
	@$pubname=$_POST['pubname'];
	@$docno=$_POST['docno'];
	@$authortype=$_POST['authortype'];
	if($bookname && isset($booktype) && $isbn && $pubname && isset($pubtype) && $byear && isset($authortype))
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into bookpub (uidai,bookname,booktype,isbn,pubname,pubtype,byear,authortype,docno) values('".$user."','".$bookname."','".$booktype."','".$isbn."' ,'".$pubname."','".$pubtype."','".$byear."','".$authortype."','".$docno."')";
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
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Publication Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Publication Type</th><th>Book Name</th><th>ISBN No</th><th>Publisher</th><th>Publisher Type</th><th>Year of Publication</th><th>Author Type</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from bookpub where uidai='".$user."' order by byear";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>';
	if($row1["booktype"]=='0'){echo"Book Chapter";}
	if($row1["booktype"]=='1'){echo"Book";}
	echo'</td><td>'.$row1["bookname"].'</td><td>'.$row1["isbn"].'</td><td>'.$row1["pubname"].'</td><td>';
	if($row1["pubtype"]=='0'){echo"International";}
	if($row1["pubtype"]=='1'){echo"National";}
	echo'</td><td>'.$row1["byear"].'</td><td>';
	if($row1["authortype"]=='0'){echo"Co-Author";}
	if($row1["authortype"]=='1'){echo"Author";}
	echo'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="pubdetails" /><input type="hidden" name="isbn" value="'.$row1["isbn"].'" /><input type="hidden" name="bookname" value="'.$row1["bookname"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="pubdetails" /><input type="hidden" name="isbn" value="'.$row1["isbn"].'" /><input type="hidden" name="bookname" value="'.$row1["bookname"].'" /><input type="submit" name="pubdetails" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Publication Type:</p></td><td>
<select name="booktype">
<option value="0">Book Chapter</option>
<option value="1">Book</option>
</select>
<br></td></tr>
<tr><td><p align="right">Book Title</p></td><td><input type="text" name="bookname"><br></td></tr>
<tr><td><p align="right">ISBN No</p></td><td><input type="text" name="isbn"><br></td></tr>
<tr><td><p align="right">Publisher</p></td><td><input type="text" name="pubname"><br></td></tr>
<tr><td><p align="right">Publisher Type</p></td><td><select name="pubtype">
<option value="0">International</option>
<option value="1">National</option>
</select><br></td></tr>
<tr><td><p align="right">Publishing Year</p></td><td><select name="byear">
<?php
$today=date("Y");
for($i=1988;$i<=$today;$i++){
echo'<option value="'.$i.'">'.$i.'</option>';
}
?>
</select><br></td></tr>
<tr><td><p align="right">Author Type</p></td><td><select name="authortype">
<option value="1">Author</option>
<option value="0">Co-Author</option>
</select>
<br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="pubdetails" value="pubdetails" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>