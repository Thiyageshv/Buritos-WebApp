<?php
session_start();
if($_SESSION['loggedin']!=true)
  header("Location:home.php");  
for($i=1;$i<=11;$i++)
{$j=$i+500;
 $item[$i]=$_POST[$i];
 $price[$i]=$_POST[$j];
 //echo $price[$i];
}
   $user="root";
   $passwd="";
   $dbname=$_SESSION['shop'].$_SESSION['branch'];
   $dborder=$_SESSION['shop']."order";
   echo $dborder;
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
  // $query=mysql_query("CREATE DATABASE $dbname",$connect);
   $query2=mysql_select_db("franchisedetails",$connect);
   if(!$query2)
   echo mysql_error();
   $table="CREATE TABLE $dbname(sno int AUTO_INCREMENT,fooditem varchar(50),price int,PRIMARY KEY(sno))";
   $table2="CREATE TABLE $dborder(username varchar(20),orderid int , fooditem varchar(50) ,price int)";
   $restab=mysql_query($table,$connect);
   $restab2=mysql_query($table2,$connect);
   if(!$restab)
    echo mysql_error();
	if(!$restab2)
    echo mysql_error();
   for($i=1;$i<=11;$i++)
   {if($item[$i]!=""&&$price[$i]!="")
    {
      $ins="INSERT INTO $dbname(fooditem,price)VALUES('$item[$i]','$price[$i]')";
      mysql_query($ins,$connect);
     }
     
    /*if($item[$i]==""||$price[$i]==""&&!($item[$i]==""&&$price[$i]==""))
    {
    
    ?><script type="text/javascript">
      alert("FILL OR LEAVE BOTH THE BLANKS! DONT JUST LEAVE ONE BLANK EMPTY!");
      </script>
     <?php break;}*/
   }
   
   header("Location:account.php");

?>