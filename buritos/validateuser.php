<html>
<title>the sign up form</title>
<head><center><h1>XYZ</h1></center></head>

<?php
 
 $fname=$_POST["firstname"];
 $lname=$_POST["lastname"];
 $mail=$_POST["usermail"];
 $pwd1=$_POST["pwd"];
 $pwd2=$_POST["pwd2"];
 $numb=$_POST["phno"];

 
//$check=array('$_POST["e1"]','$_POST["e2"]','$_POST["e3"]','$_POST["e4"]','$_POST["e5"]');

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


{
 if($numb==""||!is_numeric($numb))
 $b="Please enter a valid number";
 else
$b="";
}


if($a==""&&$b==""&&$c==""&&$x==""&&$y==""&&$z=="")
{   $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   mysql_query("CREATE DATABASE userdetails",$connect);
  mysql_select_db("userdetails",$connect);
  //if(mysql_select_db("secretdb",$connect))
//echo "selected";
  
 

  $table="CREATE TABLE users(Firstname varchar(10),Lastname varchar(10),MailId varchar(30),password varchar(100),phnumber int)";
  mysql_query($table,$connect);
  $pwd=md5($pwd1);
  $queryv="SELECT * FROM users WHERE MailId='$mail'";
  $resultv=mysql_query($queryv,$connect);
  if (mysql_num_rows($resultv)>=1)
  {header("Location:userreg.php");
  }
  $ins="INSERT INTO users VALUES('$fname','$lname','$mail','$pwd','$numb')";
  mysql_query($ins,$connect);?>
  <center><font size="20" face="cambria" color="blue">
  <?php
  print "hello ".$fname." ".$lname."!!!";
  echo "<br>";?>
  echo "you have succesfully registered with xyz!";
  <br /><br /><center><a href="homeuser.php">click here to login</a>
 </font>
 </center>
<?php
}

else

{
?>
<body>
<center><font color="blue"><h3>Fill in the following details to register with the XYZ!"</h3></font></center><br /><br /><br /><br />
<form name="secret" action="validateuser.php" method="POST">


First name: <input type="text" name="firstname" value="<?php echo htmlentities($fname);?>" maxlength=10 /><font color="red"><?php echo $x;?></font><br /><br />
Last name : <input type="text" name="lastname" value="<?php echo htmlentities($lname);?>" maxlength=10 /><font color="red"><?php echo $y;?></font><br /><br />
E-mail ID: <input type="email" name="usermail" value="<?php echo htmlentities($mail);?>" /><font color="red"><?php echo $z;?></font><br /><br />
Password: <input type="password" name="pwd" /><font color="red"><?php echo $a;?></font><br/><br />
Renter password:<input type="password" name="pwd2" /><font color="red"><?php echo $c;?></font><br/><br />
phone number:<input type="text" name="phno" /><br /><br /><br /><font color="red"><?php echo $b;?></font><br/><br />
<input type="submit" value="Submit" /><br /><br />
</form>
*all fields are mandatory*
</body>
</html>
<?php
}
?>