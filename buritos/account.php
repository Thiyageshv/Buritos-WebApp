<?php session_start();
if($_SESSION['loggedin']!=true)
  header("Location:home.php");    
          echo "hey"." ".$_SESSION['username'];

$dbname=$_SESSION['shop'].$_SESSION['branch'];
$oname=$_SESSION['shop']."order";
?>
<script type="text/javascript">

window.onload = initAll;

function initAll() 
{

  var allLinks = document.getElementsByTagName("a");
	
	
  for (var i=0; i<allLinks.length; i++) 
     {
		
       if (allLinks[i].className.indexOf("menulink") > -1) 
               {
			
                allLinks[i].onclick = toggleMenu;
                
		
               }
	
     }

}


 function toggleMenu() 
 {
	
  var startMenu = this.href.lastIndexOf("/")+1;
	
  var stopMenu = this.href.lastIndexOf(".");
	
  var thisMenuName = this.href.substring(startMenu,stopMenu);

	
  var thisMenu = document.getElementById(thisMenuName).style;
	
  if (thisMenu.display == "none")  
  {
		
    thisMenu.display = "block";
  }

  else
  thismenu.display="none"
  
  if(thisMenuName=="addmenu")
  { document.getElementById("displaymenu").style.display="none";
    document.getElementById("deletemenu").style.display="none";
    document.getElementById("editmenu").style.display="none";
	document.getElementById("orderstatus").style.display="none";
   }
  
  if(thisMenuName=="displaymenu")
   {document.getElementById("addmenu").style.display="none";
    document.getElementById("deletemenu").style.display="none";
    document.getElementById("editmenu").style.display="none";
	document.getElementById("orderstatus").style.display="none";
    }
  if(thisMenuName=="deletemenu")
   {document.getElementById("addmenu").style.display="none";
    document.getElementById("displaymenu").style.display="none";
    document.getElementById("editmenu").style.display="none";
	document.getElementById("orderstatus").style.display="none";
    }
   if(thisMenuName=="editmenu")
   {document.getElementById("addmenu").style.display="none";
    document.getElementById("displaymenu").style.display="none";
    document.getElementById("deletemenu").style.display="none";
	document.getElementById("orderstatus").style.display="none";
    }
	
	 if(thisMenuName=="orderstatus")
   {document.getElementById("addmenu").style.display="none";
    document.getElementById("displaymenu").style.display="none";
    document.getElementById("deletemenu").style.display="none";
	document.getElementById("editmenu").style.display="none";
    }
  
	
  
	
  return false;
 
}

</script>

<html>
<title>account</title>
<body>
<a href="logout.php">logout</a>
<h1><center>YOUR MENU</center></h1>
<br />
<center>

<div style="position:absolute;left:400;top:150;width:150;float:left;">
<h4><a href="addmenu.html" class="menulink">ADD MENU</a></h4>
</div>
<div style="position:absolute;left:550;top:150;width:150;float:left;">
<h4><a href="editmenu.html" class="menulink">EDIT MENU</a></h4>
</div>
<div style="position:absolute;left:700;top:150;width:150;float:left;">
<h4><a href="deletemenu.html" class="menulink">DELETE MENU</a></h4>
</div>
<div style="position:absolute;left:850;top:150;width:150;float:left;">
<h4><a href="displaymenu.html" class="menulink">DISPLAY MENU</a></h4>
</div>
<div style="position:absolute;left:1000;top:150;width:150;float:left;">

<h4><a href="orderstatus.html" class="menulink">ORDER STATUS</a></h4>
</div>
<div id="addmenu" style="position:absolute;left:550;top:250;width:400;height:800;display:none";>
<form name="menu" action="via.php" method="POST">
<center />
<table style="position:absolute;cell spacing:"5";">
<caption><center><font size="6" face="arial" color="red">MENUCARD</font></center></caption>
<br />
<tr>
<td align="left"><input type="text" name="1" />
<td align="left"><input type="text" name="501" />
</tr>
<tr>
<td align="left"><input type="text" name="2" />
<td align="left"><input type="text" name="502" />
</tr>
<tr>
<td align="left"><input type="text" name="3" />
<td align="left"><input type="text" name="503" />
</tr>
<tr>
<td align="left"><input type="text" name="4" />
<td align="left"><input type="text" name="504" />
</tr>
<tr>
<td align="left"><input type="text" name="5" />
<td align="left"><input type="text" name="505" />
</tr>
<tr>
<td align="left"><input type="text" name="6" />
<td align="left"><input type="text" name="506" />
</tr>
<tr>
<td align="left"><input type="text" name="7" />
<td align="left"><input type="text" name="507" />
</tr>
<tr>
<td align="left"><input type="text" name="8" />
<td align="left"><input type="text" name="508" />
</tr>
<tr>
<td align="left"><input type="text" name="9" />
<td align="left"><input type="text" name="509" />
</tr>
<tr>
<td align="left"><input type="text" name="10" />
<td align="left"><input type="text" name="510" />
</tr>
<tr>
<td align="left"><input type="text" name="11" />
<td align="left"><input type="text" name="511" />
</tr>
<centre><input type="submit" value="save"/></centre>
</form>
</table>
</div>

</center>
<div id="displaymenu" style="position:absolute;left:550;top:250;display:none;background-color="black";">
<?php
   $user="root";
   $passwd="";   
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $query2=mysql_select_db("franchisedetails",$connect);
   $query="SELECT * FROM $dbname";
   $result=mysql_query($query);
   if(!$result)
   echo mysql_error();
   $row=mysql_num_rows($result);
   $i=0; ?>
   <table>
   <tr>
   <td align="left"><font color="red">FOOD ITEM</font>
   <td>
   <td>
   <td>
   <td>
   <td align="right"><font color="red">PRICE</font>
   </tr>
   <?php
    while($i<$row)
  {
   $found=mysql_fetch_array($result);
    echo "<tr>";
    echo "<td>".$found['fooditem'];
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>".$found['price'];
    echo "</tr>";
    $i++;
  }
?> </table>
</div>
<div id="orderstatus" style="position:absolute;left:550;top:250;display:none;">
<form action="updatestatus.php" method="POST">
<table>
<tr>
   <td align="left"><font color="red">ORDER ID</font>
   <td>
   <td>
   <td>
   <td>
   <td>
   <td align="right"><font color="red">FOOD ITEM</font>
   <td>
   <td>
   <td>
   <td>
   <td>
   <td align="right"><font color="red">STATUS</font>
   </tr>
<tr>
<?php
   $user="root";
   $passwd="";   
   $name=
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $query2=mysql_select_db("franchisedetails",$connect);
   
   $query="SELECT orderid,fooditem,status FROM $oname";
   $result=mysql_query($query);
   if(!$result)
   echo mysql_error();
   $row=mysql_num_rows($result);
   $i=0;
    while($i<$row)
  {
   $found=mysql_fetch_array($result);
    echo "<tr>";
    echo "<td>".$found['orderid'];
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>";
	echo "<td>";
    echo "<td>".$found['fooditem'];
	 echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>";
	echo "<td>";
	// echo "<td>".$found['status'];
	 echo "<td>";?><font align="center"><?php echo $found['status']?></font><input type="checkbox" name="<?php echo $found['orderid'];?>"/>
   <? echo "</tr>";
    $i++;
  }
   ?>
   <tr>
   </table>
   <center><input type="submit" value="update status"><center>
   </div>
<div id="deletemenu" style="position:absolute;left:550;top:250;display:none;">
    <form action="via2.php" method="POST">
   <table>
   <tr>
   <td align="left"><font color="red">FOOD ITEM</font>
   <td>
   <td>
   <td>
   <td>
   <td align="right"><font color="red">PRICE</font>
   </tr>
   
 
  
<?php
$j=0;
$queryd="SELECT * FROM $dbname";
   $resultd=mysql_query($queryd);
   $rowsd=mysql_num_rows($resultd);
 while($j<$rowsd)
{
  
   $foundd=mysql_fetch_array($resultd);
    echo "<tr>";
    echo "<td>".$foundd['fooditem'];
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>".$foundd['price'];
    echo"<td>";?><input type="checkbox" name="<?php echo $foundd['fooditem'];?>"/>
   <?php echo "</tr>";
    $j++;
}

?> </table>
<input type="submit" value="delete">
</form>
</div>
<div id="editmenu" style="position:absolute;left:550;top:250;display:none;">
<table>
<form action="update.php" method="POST">
<?php $querys1="SELECT * FROM $dbname";
   $results1=mysql_query($querys1);
   $rows=mysql_num_rows($results1);
  $j=0;
 while($j<$rows)
{   
  $founds=mysql_fetch_array($results1);
  echo "<tr>";
  echo "<td>";?><input type="text" name="<?php echo "f".$founds['sno'];?>" value="<?php echo $founds['fooditem'];?>"/>
  <?echo "<td>";?><input type="text" name="<?php echo $founds['sno'];?>" value="<?php echo $founds['price'];?>"/>
  <?php echo "</tr>";
  $j++;
  
}
?>
</table>
<input type="submit" value="update">
</form>
</div>
</body>
</html>