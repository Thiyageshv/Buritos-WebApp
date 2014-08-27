<?php session_start();
if($_SESSION['loggedin']!=true)
  header("Location:homeuser.php");    
   if(@$_POST["submit"])
   {
	 
	 $_SESSION['msg']="Thankyou for choosing us!We would deliver the food as soon as possible";
     //header("Location:useraccount.php"); 
    }
    echo "hey"." ".$_SESSION['username'];?><html> <a href="logoutuser.php">logout</a><br /><br />
   <?php $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $query2=mysql_select_db("franchisedetails",$connect);
   echo $_SESSION['msg'];
   $uname=$_SESSION['username'];?>

<title><?php echo $_SESSION['username'];?> </title>
<head><font color="black"><h3>WELCOME TO <font color="blue">BURITOS</font></font>

</head>
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
	
  return false;
 
}
/*function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","order.php",true);
xmlhttp.send();
}*/
</script>
<body>


 <?php $query="SELECT * FROM keepers";
   $result=mysql_query($query);
   $row=mysql_num_rows($result);
   
   
  $i=0;
 while($i<$row)
 { $found=mysql_fetch_array($result);
   $franch=$found['shopname']."-".$found['branch'];
   $id=$franch.".html";
   
   
   $id2=$found['shopname'].$found['branch'];
   $query2="SELECT * FROM $id2";
   $result2=mysql_query($query2);
   $row2=mysql_num_rows($result2);
  
   ?>
  <div>
  <a href="<?php echo $id; ?>" class="menulink">
   <?php echo $franch;?>
  </a>
  
   <form method="GET" action="order.php">
   <br>
   <br>
   <table  id="<?php echo $franch;?>" style="display:none;">
   <?php $j=0;while($j<$row2)
                {
                  $found2=mysql_fetch_array($result2)
;
                  echo "<tr>";
               
                  echo "<td>";?><a><?php echo $found2['fooditem'];?></a>
                  <?php echo "<td>";echo "<td>";echo "<td>";echo "<td>";echo "<td>";
                  echo "<td>". $found2['price'];
                  $nam=$found2['sno'].$id2;
                  
                  //echo "<br>"
                  echo "<td>";?><input type="checkbox" name="<?php echo $nam;?>" onclick="loadXMLDoc()" />
                  <?php echo "</tr>";
                  
                  $j++;
                 }?>
  
  </table>
  <br><br><br>
   
 <?php   
    $i++;
 }?>
 <input type="submit" value="order!"   />
</form>
<br>
<br>
 <div style="position:absolute;left:700;top:150;width:150;float:left;"><center><a href="orderstatus.html" class="menulink">
   Order History
  </a>
   <table  id="orderstatus" style="display:none;">
   <tr>
   <?php
   $oquery=" SELECT * FROM franchisedetails.order where username= '$uname'";
   $oresult=mysql_query($oquery);
   $orow=mysql_num_rows($oresult);
   $i=0;
 while($i<$row)
 { $ofound=mysql_fetch_array($oresult);
   $tname="f".$ofound['orderid'];
   
   $dquery="SELECT * FROM $tname";
   $dresult=mysql_query($dquery);
  @$drow=mysql_num_rows($dresult);
        $j=0;
        while($j<$drow)
		{
		 $dfound=mysql_fetch_array($dresult);
		 echo "<tr>";
		 
         echo "<td>". $ofound['orderid'];?>
		  <?php echo "<td>";echo "<td>";echo "<td>";echo "<td>";echo "<td>";
		 echo "<td>";?><a><?php echo $dfound['fooditem'];?></a>
		 <?php echo "<td>";echo "<td>";echo "<td>";echo "<td>";echo "<td>";
         echo "<td>". $dfound['status'];?>
		 <?php echo "<td>";echo "<td>";echo "<td>";echo "<td>";echo "<td>";
		 //echo "<td>". $ofound['salesdate'];
		  
		 echo "</tr>";
		 $j++;
		}
   
  $i++;
  }?> 
  </tr>
  </table></center></div>
<div id="myDiv" >
</div>



</body>
</html>





