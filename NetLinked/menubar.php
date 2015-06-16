<li><a href="profile.php" ><?php


$result = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row = mysql_fetch_array($result))
  {
  echo "<img width=20 height=15 alt='Unable to View' src='" . $row["profImage"] . "'>";
echo"  ";
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }

?></a></li>
      <li><a href="Home.php">Home</a></li>
	  <li><a href="receivemessage.php">Messages(<?php
                          $received = mysql_query("SELECT * FROM messages WHERE recipient = '$_SESSION[SESS_MEMBER_ID]' AND status = 'unread'");
						  $receiveda = mysql_numrows($received);
								
						  echo '<font color="Red">'  .$receiveda .'</font>';

?>)</a></li>
               <li><a  href="#"onmouseover="mopen('m5')" onMouseOut="mclosetime()">Account</a>
          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
</a>
        
		<a href="logout.php"><font size="2" class="font1">Logout</font></a>
        </li>