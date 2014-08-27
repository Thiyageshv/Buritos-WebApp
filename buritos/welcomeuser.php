
<?php
session_start();
$_SESSION['session']="";
$_SESSION['loggedin']=false;
$_SESSION['username']="";
$_SESSION['msg']="";
/*function logged_in() 
{
return isset($_SESSION['session']);
	
}*/	 
$mail=$_POST["usermail"];
$pwd=$_POST["pwd"];
$msg="";

   
   if($mail=="")
   $a="Please enter the email id to login!";
   else
   $a="";
   if($pwd=="")
   $b="please fill the password to login!";
   else
   $b="";

  
   $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   mysql_select_db("userdetails",$connect);
   $query="SELECT * FROM users WHERE MailId='$mail'";
   $result=mysql_query($query);
   if(!$result)
   {die('invalid query:'.mysql_error());
   }
  // if (mysql_num_rows($result)== 1)
   //echo mysql_numrows($result);
 
   	
   
    if (mysql_affected_rows()==1)
 { 
    //$msg="The mail id does not exist in the database";
   
     // echo "s";
      $found_user=mysql_fetch_array($result)
;
       if(md5($pwd)==$found_user['password'])
        { // echo $found_user['password'];
         $_SESSION['loggedin']=true;
         $_SESSION['username']=$found_user['Firstname'];
         $_SESSION['msg']="";
         $_SESSION['mailid']=$mail;        
         
          //echo $_SESSION['username'];
          
          header("Location:useraccount.php");
         }
        //else
        //header("Location:home.php");
   
   
      else

   { $msg="The username,password combination is incorrect"; ?><br /><br />  
   
  
      <html>
      <title>home page</title>
      <head><center>XYZ</center>

      </head>
      <body>
      <a href="userreg.php"> click here to register</a>
      <br /><br />
      <center>LOGIN<br /><br />
   
      <font color="red"><?php echo $msg;?></font><br />
      <form name="login" action="welcomeuser.php" method="POST">
       E-MAIL ID: <input type="email" name="usermail" /><font color="red"><?php echo $a;?></font><br /><br />
       PASSWORD: <input type="password" name="pwd" /><font color="red"><?php echo $b;?></font><br/><br />
       <input type="submit" value="Login" />
       </center>
       </form>
      </body>
   <?php 
  
   }
}
else
{ ?>
<html>
      <title>home page</title>
      <head><center>XYZ</center>

      </head>
      <body>
      <a href="userreg.php"> click here to register</a>
      <br /><br />
      <center>LOGIN<br /><br />
      <font color="red">The email id does not exist in the database</font>
      <font color="red"><?php echo $msg;?></font><br />
      <form name="login" action="welcomeuser.php" method="POST">
       E-MAIL ID: <input type="email" name="usermail" /><font color="red"><?php echo $a;?></font><br /><br />
       PASSWORD: <input type="password" name="pwd" /><font color="red"><?php echo $b;?></font><br/><br />
       <input type="submit" value="Login" />
       </center>
       </form>
      </body><?php
}?>
</html>

