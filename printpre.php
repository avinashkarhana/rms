<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style><!--
 ax{
      border:2px solid lime;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width: 300px;
      text-align:center;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 

avi{
	font-family:Gloucester MT;
	
	font-size:35;
   } -->
</style>
<style>
 ab{
      text-align:center;
   	  font-family:Arial;
	  font-size:19px;
	  font-weight:"bold"; 
   } 
   avi{
	font-family:almendra,serif;

	font-size:25;
   }
</style>
<title>Recruitment management Sysytem</title>
</head><body><img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><?php
$user=$_POST['user'];
$appno=$_POST['appno'];
include"conn.php";
if(!$db->query("use rms"))
	echo'Can not connect to Database.<br><br>';

$result=$db->query("select * from candidates where uidai like'".$user."'");
@$a=mysqli_fetch_assoc($result);
if($a['status']=0 || $a['status']=1 || $a['status']=2)
	$pic_edit_visible="block";
else
	$pic_edit_visible="none";

$qe="select * from applications where uidai='".$user."' AND appno='".$appno."' order by appdate";$i=1;
$qw=$db->query($qe);
echo'<h1 style="margin-bottom:0;padding-bottom=0;"><p align="center">Recruitment Application</h2><hr width="20%" style="margin-top:0;" color="7CC8E7">';
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Applied for Posts</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>Application No.</th><th>Department</th><th>Post</th><th>Post Type</th><th>Advert Number</th><th>Application Date</th><th>Status</th><th>Score on basis of Details Submitted</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	
	$rq=mysqli_fetch_assoc($db->query("select * from department where dcode='".$row1['dcode']."'"));
	$rqq=mysqli_fetch_assoc($db->query("select * from post where pcode='".$row1['pcode']."'"));
	echo'<tr><td>'.$row1['appno'].'</td><td>'.$rq["dname"].'</td><td>'.$rqq['pname'].'</td><td>'.$rqq['ptype'].'</td><td>'.$row1['advertno'].'</td><td>'.$row1['appdate'].'</td><td>'.$row1['status'].'</td><td>';
	if($row1['score']==0){echo"Under Evaluation";}
	else{echo$row['score'];}
	echo'</td></tr>';
}
echo'</table>';


echo'<h2 style="margin-bottom:0;padding-bottom=0;">Personal Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><br><table align="left"><tr><td><ab>Name</ab></td><td>';
if($a['sex']=='M'){echo"Mr.";}else{echo"Mr.";}
echo$a['name'].'</td></tr><tr><td><ab>UIDAI (Aadhar Number)</ab></td><td>'.$a['uidai'].'</td></tr><tr><td><ab>Mobile</ab></td><td>'.$a['mobile'].'</td></tr>
<tr><td><ab>Category</ab></td><td>';
$result=$db->query('select catcode from candidates where uidai="'.$user.'"');
$results=$db->query('select * from category');
$row1=mysqli_fetch_assoc($result);
while($row11=mysqli_fetch_assoc($results)){
if($row11['catcode']==$row1['catcode'])
	  echo$row11['catname'];
}
echo '</td></tr>
<tr><td><ab>Email</ab></td><td>'.@$a[email].'</td></tr>
<tr><td><ab>Father Name</ab></td><td>'.@$a[fname].'</td></tr>
<tr><td><ab>Mother Name</ab></td><td>'.@$a[mname].'</td></tr>
<tr><td><ab>Address</ab></td><td style="width:100px;">'.@$a[address].'</td></tr>
<tr><td><ab>State</ab></td><td>'.@$a[state].'</td></tr>
<tr><td><ab>PIN</ab></td><td>'.@$a[pin].'</td></tr>
<tr><td><ab>Nationality</ab></td><td>'.@$a[nationality].'</td></tr>
<tr><td><ab>Relegion</ab></td><td>'.@$a[relegion].'</td></tr>
<tr><td><ab>Date of Birth</ab></td><td>'.@$a[dob].'</td></tr>
<tr><td><ab>Person with Disablity ?</ab></td><td>';
$result1=$db->query('select pwd from candidates where uidai="'.$user.'"');
$row2=mysqli_fetch_assoc($result1);
if($row2['pwd']=='1')
	  echo"YES";
if($row2['pwd']=='0')
	  echo"NO";
echo'</td></tr><tr><td><ab>Marital</ab></td><td>';
$result2=$db->query('select marital from candidates where uidai="'.$user.'"');
$row3=mysqli_fetch_assoc($result2);
if($row3['marital']=='1')
	  echo"Married";
if($row3['marital']=='0')
	  echo"Unmarried";
echo'</td></tr></table><p align="right"><img src="img/candidate/'.$user.'/'.$user.'p.jpg" height=280 width=220 /></p><br><br><br><br><br>';

$aa="select * from edudetails where uidai='".$user."' order by pyear";$i=1;
$qw=$db->query($aa);
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Educational Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Examination</th><th>Board/University</th><th>Roll No</th><th>Subjects</th><th>Marks Obtained</th><th>Total Marks</th><th>Percent</th><th>Year of Passing</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$i.'</td><td>'.$row1["class"].'</td><td>'.$row1["institute"].'</td><td>'.$row1["roll_no"].'</td><td>'.$row1["subjects"].'</td><td>'.$row1["omarks"].'</td><td>'.$row1["tmarks"].'</td><td>'.$row1["percent"].'%</td><td>'.$row1["pyear"].'</td></tr>';$i++;
}
echo'</table>';
$qe="select * from bookpub where uidai='".$user."' order by byear";$i=1;
$qw=$db->query($qe);
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Book Publication Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Publication Type</th><th>Title</th><th>ISBN No</th><th>Publisher</th><th>Publisher Type</th><th>Year of Publication</th><th>Author Type</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$i.'</td><td>';
	if($row1["booktype"]=='0'){echo"Book Chapter";}
	if($row1["booktype"]=='1'){echo"Book";}
	echo'</td><td>'.$row1["bookname"].'</td><td>'.$row1["isbn"].'</td><td>'.$row1["pubname"].'</td><td>';
	if($row1["pubtype"]=='0'){echo"International";}
	if($row1["pubtype"]=='1'){echo"National";}
	echo'</td><td>'.$row1["byear"].'</td><td>';
	if($row1["authortype"]=='0'){echo"Co-Author";}
	if($row1["authortype"]=='1'){echo"Author";}
	echo'</td></tr>';$i++;
}
echo'</table>';
$qe="select * from rpapers where uidai='".$user."' order by pyear";$i=1;
$qw=$db->query($qe);
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Research Paper Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Paper Title</th><th>Paper Journel</th><th>Journel ISSN</th><th>Journel Type</th><th>Author Type</th><th>Publishing Year</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$i.'</td><td>'.$row1['ptitle'].'</td><td>'.$row1['pjournel'].'</td><td>'.$row1['issn'].'</td><td>';
	if($row1["journeltype"]=='11'){echo"International refered";}
	if($row1["journeltype"]=='12'){echo"International Non-refered";}
	if($row1["journeltype"]=='21'){echo"National refered";}
	if($row1["journeltype"]=='22'){echo"National Non-refered";}
	echo'</td><td>';
	if($row1["authortype"]=='1'){echo"Author";}
	if($row1["authortype"]=='0'){echo"Co-Author";}
	echo'</td><td>'.$row1['pyear'].'</td></tr>';
	$i++;
}
echo'</table>';
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Research Project Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Title</th><th>Type</th><th>Amount</th><th>Funding Ajency</th><th>Duration (Months)</th><th>Year of starting</th></tr>';
$qe="select * from rprojects where uidai='".$user."' order by pyear";$i=1;
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr>'.$i.'<td>'.$row1['projectname'].'</td><td>';
	if($row1["projtype"]=='1'){echo"Major";}
	if($row1["projtype"]=='0'){echo"Minor";}
	echo'</td><td>'.$row1['projamount'].'</td><td>'.$row1['projfundingajency'].'</td><td>'.$row1['projdur'].'</td><td>'.$row1['pyear'].'</td></tr>';
	$i++;
}
echo'</table>';
$qe="select * from conferences where uidai='".$user."' order by confdate";$i=1;
$qw=$db->query($qe);
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Conference Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Name</th><th>Type</th><th>Place</th><th>Date</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$i.'</td><td>'.$row1['confname'].'</td><td>';
	if($row1["conftype"]=='1'){echo"PhD";}
	if($row1["conftype"]=='0'){echo"PG";}
	echo'</td><td>'.$row1['confplace'].'</td><td>'.$row1['confdate'].'</td></tr>';$i++;
}
echo'</table>';
$qe="select * from experience where uidai='".$user."' order by expfrom";$i=1;
$qw=$db->query($qe);
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Experience Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Organisation</th><th>Name</th><th>Type</th><th>From</th><th>Experience To</th><th>Total Months of Experience</th><th>Sallary</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$i.'</td><td>'.$row1['expinst'].'</td><td>'.$row1['expname'].'</td><td>';
	if($row1["exptype"]=='1'){echo"Regular";}
	if($row1["exptype"]=='2'){echo"Temporary";}
	if($row1["exptype"]=='3'){echo"Adhoc";}
	if($row1["exptype"]=='4'){echo"Contract";}
	echo'</td><td>'.$row1['expfrom'].'</td><td>'.$row1['expto'].'</td><td>'.$row1['exptotal'].'</td><td>'.$row1['expsal'].'</td></tr>';$i++;
}
echo'</table>';
$qe="select * from creferences where uidai='".$user."' order by refname";$i=1;
$qw=$db->query($qe);
echo'<h2 style="margin-bottom:0;padding-bottom=0;">References</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table style="text-align:left;padding:8px 0;border-spacing:12px;"><tr><th>S.No</th><th>Name</th><th>Mobile</th><th>Mail</th><th>Address</th></tr>';
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$i.'</td><td>'.$row1['refname'].'</td><td>'.$row1['refmobile'].'</td><td>'.$row1['refmail'].'</td><td>'.$row1['refaddress'].'</td></tr>';$i++;
}
echo'</table>';
echo"<br><br><cv style='font-size:22;'>I here by declare that all the information i provided during the online application for this recruitment are complete and true to the best of my knowledge and belif.In case of any information found wrong or conflicting, my application/appointment will be liable to be cancelled at any time by the Unviversity.</cv>";
echo'<br><br><p align="right"><img src="img/candidate/'.$user.'/'.$user.'s.jpg" height=50 width=110 /><br><br>Signature of Candidate</p>';
?>
</body>
</html>