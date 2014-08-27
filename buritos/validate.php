<html>
<title>the sign up form</title>
<head><center><h1>XYZ</h1></center></head>

<?php
 $shopname=$_POST["shopname"];
 $branch=$_POST["branch"]; 
 $fname=$_POST["firstname"];
 $lname=$_POST["lastname"];
 $mail=$_POST["usermail"];
 $pwd1=$_POST["pwd"];
 $pwd2=$_POST["pwd2"];

 
//$check=array('$_POST["e1"]','$_POST["e2"]','$_POST["e3"]','$_POST["e4"]','$_POST["e5"]');
{
  if($shopname=="")
  $e="please fill the name of the Franchise/restaurant!";
else
  $e="";
}

{
  if($branch=="")
  $f="please fill the branch name/area of location of the Franchise/restaurant!";
else
  $f="";
}

{
  if($fname=="")
  $x="please fill the first name!!!";
else
  $x="";
}

{
 if($lname=="")
 $y="please fill the last name!!!";
 else
 $y="";
}
{
 if($mail=="")
$z="please fill the email address!!!";
else
$z="";
}
{ 
if($pwd1=="")
$a="please enter a valid password";
 else
{
if(strlen($pwd1)<5||strlen($pwd1)>=10)
$a="Please enter a password that is between 5-10 characters";
else
$a="";
}
}
{
 if($pwd2!=$pwd1)
 $c="oops!!Password mismatch!";
else
$c="";
}

if($_FILES["file"]["size"]>12000)
     //if(preg_match(".\txt$",$_FILES["file"]["name"])
     $d="File size should be less than 1MB!!";
else
  {
 
    if($_FILES["file"]["error"]>0||$_FILES["file"]["type"]!="text/plain")//||$_FILES["file"]["type"]!="images/jpeg")
    $d="Invalid file!";
    else
    $d="";
   }
if($a==""&&$e==""&&$f==""&&$c==""&&$d==""&&$x==""&&$y==""&&$z=="")
{   $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   mysql_query("CREATE DATABASE franchisedetails",$connect);
  mysql_select_db("franchisedetails",$connect);
  //if(mysql_select_db("secretdb",$connect))
//echo "selected";
  
 
   $tmpname=$_FILES["file"]["tmp_name"];
   $filesize=$_FILES["file"]["size"];
   $fp=fopen($tmpname,'r');
   $content=fread($fp,filesize($tmpname));
   $content=addslashes($content);
   fclose($fp);

  $table="CREATE TABLE backgrounddetails(shopname varchar(10),branch varchar(10),Firstname varchar(10),Lastname varchar(10),MailId varchar(30),password varchar(100),filesize int,filecontent mediumblob)";
  mysql_query($table,$connect);
  $table2="CREATE TABLE keepers(shopname varchar(10),branch varchar(10))";
  mysql_query($table2,$connect);
  $pwd=md5($pwd1);
  $ins="INSERT INTO backgrounddetails VALUES('$shopname','$branch','$fname','$lname','$mail','$pwd','$filesize','$content')";
  mysql_query($ins,$connect);
   $ins2="INSERT INTO keepers VALUES('$shopname','$branch')";
   mysql_query($ins2,$connect);?>
  <center><font size="20" face="cambria" color="blue">
  <?php
  print "hello ".$shopname."-".$branch."!!!"."\n";
  print"your profile is under verification! you will be informed shortly on your registration";?>
  <br /><br /><center><a href="home.php">home</a>
 </font>
 </center>
<?php
}

else

{
?>
<body>
<center><font color="blue"><h3>Fill in the following details to register with the XYZ and establish the business!"</h3></font></center><br /><br /><br /><br />
<form name="secret" action="validate.php" method="POST" enctype="multipart/form-data">
Name of the Franchise/Restaurant:<input type="text" name="shopname"value="<?php echo htmlentities($shopname);?>" maxlength=10 /><font color="red"><?php echo $e;?></font><br /><br /><br /><br />
Location/branch of the Franchise:<input type="text" name="branch" value="<?php echo htmlentities($branch);?>" maxlength=10 /><font color="red"><?php echo $f;?></font><br /><br /><br /><br />
First name of the Manager/Owner of the Franchise: <input type="text" name="firstname" value="<?php echo htmlentities($fname);?>" maxlength=10 /><font color="red"><?php echo $x;?></font><br /><br />
Last name of the Manager/Owner of the Franchise: <input type="text" name="lastname" value="<?php echo htmlentities($lname);?>" maxlength=10 /><font color="red"><?php echo $y;?></font><br /><br />
E-mail ID: <input type="email" name="usermail" value="<?php echo htmlentities($mail);?>" /><font color="red"><?php echo $z;?></font><br /><br />
Password: <input type="password" name="pwd" /><font color="red"><?php echo $a;?></font><br/><br />
Renter password:<input type="password" name="pwd2" /><font color="red"><?php echo $c;?></font><br/><br />

<input type="checkbox" name="e1" value="a"  />The Franchise agrees<br />
Upload the scanned copy of the shop's license<input type="file" name="file" value="upload" /><font color="red"><?php echo $d;?></font><br /><br />
<input type="submit" value="Submit" /><br /><br />
</form>
*all fields are mandatory*
</body>
</html>
<?php
}
?>