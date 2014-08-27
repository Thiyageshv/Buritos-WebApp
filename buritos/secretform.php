<html>
<title>the sign up form</title>
<head><center><h1>THE SECRET SOCIETY</h1></center></head>
<body>
<center><font color="blue"><h3>Fill in the following details to know  the SECRET!!!"</h3></font></center>
<script type="text/javascript">

function alternate()
{
 document.secret.sexF.checked=false;

}
function ALTERNATE()
{document.secret.sexM.checked=false;
}

</script>
<form name="secret" action="validate.php" method="post" enctype="multipart/form-data">
First name: <input type="text" name="firstname" /><br /><br />
Last name: <input type="text" name="lastname" /><br /><br />
E-mail ID: <input type="email" name="usermail" /><br /><br />
Password: <input type="password" name="pwd" /><br/><br />
Renter password:<input type="password" name="pwd2" /><br/><br />
Select sex:
 <input type="radio" name="sexM" value="male" onclick="alternate()" /> Male
<input type="radio" name="sexF" value="female" onclick="ALTERNATE()" /> Female
<br /><br />
click the following checkboxes corresponding to the questions if your answer is 'yes'! Else avoid it!!<br /><br />
<input type="checkbox" name="e1" value="a"  /> boozed?<br />
<input type="checkbox" name="e2" value="b"  />smoked?<br />
<input type="checkbox" name="e3" value="c"  />virgin?<br />
<input type="checkbox" name="e4" value="d"  />hate justin bieber?<br />
<input type="checkbox" name="e5" value="e" />love to be friends with benifits?<br /><br />
<input type="file" name="file" value="upload" /><br /><br />
<input type="submit" value="Submit" />
 </form>
*all fields are mandatory*
</body>
</html>  