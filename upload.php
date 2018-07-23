<?php
$kind=$_POST["kind"];
$kind1=$kind;
$user=$_POST["user"];
if(!is_dir("img/candidate/".$user."/")){
mkdir("img/candidate/".$user."/");}
$target_dir="img/candidate/".$user."/";
$b=basename($_FILES["file"]["name"]);
$imageFileType=pathinfo($b,PATHINFO_EXTENSION);

include "conn.php";
$db->query("use rms");
$result=mysqli_fetch_assoc($db->query("select dcount from candidates where uidai like'".$user."'"));

if($kind=='p'){$kind1='perdetails';
$target_file = $target_dir."".$user."p.jpg";}
elseif($kind=='s'){$kind1='perdetails';
$target_file=$target_dir."".$user."s.jpg";}
else
{ 	
  if($kind=='edudetails'){$unq1='class';$unqd1=$_POST['class'];$unq2='roll_no';$unqd2=$_POST['roll_no'];}
  if($kind=='pubdetails'){$kind="bookpub";
	  $unq1='isbn';$unqd1=$_POST['isbn'];$unq2='bookname';$unqd2=$_POST['bookname'];}
  if($kind=='experiencedetails'){$kind="experience";
	  $unq1='expname';$unqd1=$_POST['expname'];$unq2='expfrom';$unqd2=$_POST['expfrom'];}
  if($kind=='rpaperdetails'){$kind="rpapers";
	  $unq1='ptitle';$unqd1=$_POST['ptitle'];$unq2='issn';$unqd2=$_POST['issn'];}
  if($kind=='rprojectdetails'){$kind="rprojects";
	  $unq1='projectname';$unqd1=$_POST['projectname'];$unq2='projamount';$unqd2=$_POST['projamount'];}
  if($kind=='rguidancedetails'){$kind="rguidance";
	  $unq1='scholarname';$unqd1=$_POST['scholarname'];$unq2='rgthesisname';$unqd2=$_POST['rgthesisname'];}
  if($kind=='conferences'){$kind="conferences";
	  $unq1='confname';$unqd1=$_POST['confname'];$unq2='confdate';$unqd2=$_POST['confdate'];}
  if($kind=='references'){$kind="creferences";
	  $unq1='refname';$unqd1=$_POST['refname'];$unq2='refmobile';$unqd2=$_POST['refmobile'];}
	  $zaq="select docno from ".$kind." where ".$unq1."='".$unqd1."' AND ".$unq2."='".$unqd2."'";
$result1=mysqli_fetch_assoc($db->query($zaq));
  if(!@$_POST['docno'] && !$result1['docno']){$docno=$user.$result['dcount'];
		$target_file=$target_dir."".$user.$result['dcount'].".jpg";}
  else{
	  if(@$_POST['docno']){$docno=@$_POST['docno'];}
	  if($result1['docno']){$docno=$result1['docno'];}
	   $target_file=$target_dir."".$docno.".jpg";}
}
$cc=0;
if (file_exists($target_file)){$cc=1;}
$uploadOk=1;
// Check if image file is a actual image or fake image 
    $check = getimagesize($_FILES["file"]["tmp_name"]); 
    if($check!==false){echo"File is an image - ".$check["mime"]."."; 
        $uploadOk=1;
		if (file_exists($target_file)){$cc=1;}}
	else{echo "File is not an image."; 
        $uploadOk=0;}
// Check file size 
if($kind=='p')
{if ($_FILES["file"]["size"]>80000){ 
    echo "Sorry, your photo file is too large.(Must be less than 80kb)"; 
    $uploadOk=0;}
}
elseif($kind=='s')
{if($_FILES["file"]["size"]>20000){ 
    echo "Sorry, your sign file is too large.(Must be less than 20kb)"; 
    $uploadOk=0;} 
} 
else
{if ($_FILES["file"]["size"]>110000){ 
    echo "Sorry, your photo file is too large.(Must be less than 100kb)"; 
    $uploadOk=0;}
}
echo'<form name="formr" action="home.php" method="POST"><input type="hidden" name="'.$kind1.'" value="'.$kind1.'" /></form>';
// Check if $uploadOk is set to 0 by an error 
if($uploadOk==0){ 
    echo "Sorry, your file was not uploaded.<br><a style='color:blue;cursor:pointer;' onClick='formr.submit()'>Try Again</a>"; 
}
// if everything is ok, try to upload file 
else{
	if (move_uploaded_file($_FILES["file"]["tmp_name"],
$target_file)){
	if($cc==1)
    echo "File Uploaded But Overwritten over previous one."; 
    if($kind=='p')
        echo "The photo has been uploaded.<br><a style='color:blue;cursor:pointer;' onClick='formr.submit()'>Back to Home</a>"; 
	elseif($kind=='s')
		echo "The sign has been uploaded.<br><a style='color:blue;cursor:pointer;' onClick='formr.submit()'>Back to Home</a>";
	else
	{
	 $qe="update ".$kind." set docno='".$docno."' where ".$unq1."='".$unqd1."' AND uidai='".$user."' AND ".$unq2."='".$unqd2."'";
	 $db->query($qe);
	 if(!@$_POST['docno']){
	 $db->query("update candidates set dcount=dcount-1 where uidai like'".$user."'");}
	echo'The file has been uploaded.<br><br>Please refresh contents of pages after uploads by clicking respective buttons like Personal Details , Education details etc<br><a style="color:blue;cursor:pointer;" onClick="formr.submit()">Back to Home</a>';}
    }
else{echo "Sorry, there was an error uploading your file.<br><a  style='color:blue;cursor:pointer;' onClick='formr.submit()'>Try Again</a>";}
}
?>