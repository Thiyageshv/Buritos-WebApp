<html>
<title>the sign up form</title>
<head><center><h1>Food saler</h1></center></head>
<body>
<center><font color="blue"><h3>Fill in the following details to register with the buritos and establish the business!</h3></font></center>
<form name="secret" action="validate.php" method="post" enctype="multipart/form-data">
Name of the Franchise/Restaurant:<input type="text" name="shopname" /><br /><br />
Location/branch of the Franchise:<input type="text" name="branch" /><br /><br />
First name of the Manager/Owner of the Franchise: <input type="text" name="firstname" /><br /><br />
Last name of the Manager/Owner of the Franchise: <input type="text" name="lastname" /><br /><br />
E-mail ID of the Manager/owner: <input type="email" name="usermail" /><br /><br />
Password: <input type="password" name="pwd" /><br/><br />
Renter password:<input type="password" name="pwd2" /><br/><br />
<input type="checkbox" name="e1" value="a"  />The Franchise agrees to terms and conditions<br /><br />
Upload the scanned copy of the shop's license<input type="file" name="file" value="upload" /><br /><br />
<input type="submit" value="Submit" />
 </form>
*all fields are mandatory*
</body>
</html>  