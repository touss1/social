<?php
	require_once('session.php');
?>

<html>

<script src="jquery.js" type="text/javascript"></script>

<script type="text/javascript">

<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<head><title>Home</title></head>
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />

<link rel="icon" href="img/icon.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
	<link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../css/example.css" media="screen" rel="stylesheet" type="text/css" />
			<script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
			<script type="text/javascript">

jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
  	closeImage   : " facebox1.2/src/closelabel.png" 
})
</script>

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
		
   });
      });
   </script>
<style type="text/css">
<!--
body {
    background-image: url(images/New.jpg);
	background-repeat: repeat-x;
	
}
.style1 {font-weight: bold}
-->
</style>
</body >
<div class="main" >
<div id="shadow" class="popup"></div>

  <div class="lefttop1" > <div class="lefttopleft"><a href="img/slaulogo.jpg" rel="facebox"><img src="img/slaulogo.jpg" width="150" height="100"  style="margin:10px 0 10px 0;border:1px solid #ccc;padding:1px;" /></a></div>
   <div class="propic">
	<?php
include('connect.php');
$id= $_SESSION['SESS_MEMBER_ID'];	
$image=mysql_query("SELECT * FROM members WHERE member_id='$id'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['profImage'];
			echo '<div id="pic">';
			echo "<a href=".$row['profImage']." rel=facebox;><img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
			echo '</div>';

?>
</div>

<ul id="sddm1">
	<li><a href="editpic.php"><img src="img/pencil.png" width="17" height="17" border="0" /> &nbsp;Change Picture</a>
	</li>
	<li><a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
	</li>
	<li><a href="info.php"><img src="img/message.png" width="16" height="12" border="0" /> &nbsp;Info</a>
	</li>
	<li><a href="photos.php"><img src="img/photos.png" width="16" height="12" border="0" /> &nbsp;Photos(<?php
$result = mysql_query("SELECT * FROM photos WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo '<font color="red">' . $numberOfRows . '</font>'; 
	?>)	</a>
	</li>
	<li><a href="request.php"><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends Request
	(<?php 
					
					$member_id=$_SESSION['SESS_MEMBER_ID'];
					$seeall=mysql_query("SELECT * FROM friends WHERE friends_with='$member_id' AND status='unconf'") or die(mysql_error());
					$numberOFRows=mysql_numrows($seeall);
					echo '<font color="red">'.$numberOFRows.'</font>';?>)
					</a>
	</li>
	<li><a href="message.php"><img src="img/m.png" width="16" height="12" border="0" /> &nbsp;Message&nbsp(<?php 
$member_id = $_SESSION['SESS_MEMBER_ID'];
$received = mysql_query("SELECT * FROM messages WHERE recipient = '$member_id'")or die(mysql_error());
								$receiveda = mysql_numrows($received);
								echo '<font color="Red">'  .$receiveda .'</font>';


?>)
	</a>
	</li>
	<li><a href="notifications.php"><img src="img/n.png" width="16" height="12" border="0" /> &nbsp;Notifications&nbsp(<?php 
$member_id = $_SESSION['SESS_MEMBER_ID'];
$notes = mysql_query("SELECT * FROM notifications WHERE member_id = '$member_id' AND status = 'unread'")or die(mysql_error());
								$receivenote = mysql_numrows($notes);
								echo '<font color="Red">'  .$receivenote .'</font>';


?>)
	</a>
	</li>
	
	<li><hr width="150"></li>
	<li>
	</ul>

  </div>
  <div class="righttop1">
       <div class="search">
      <form action="search.php" method="POST">
        <input name="search" type="text" maxlength="30" class="textfield"  value="search" required/>
	
      </form>
</div>
    <div class="nav">
      <ul id="sddm">
        <?php include("menubar.php"); ?>
      </ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  
  </div>
  
<div class="right">
	<div class="rightright">
	
	 </div>

	   <div class="shout">


</div> 
<div class="shoutout">
    
		
		<div  class="back"><h4><class="p"><div></h4></div>
			
		</br>
		</br>
		<div class="u">
        <form  name="form1" method="post" action="comment.php">
          <div class="comment">
            <textarea name="message" cols="45" rows="5" id="message" required></textarea>
          </div>
          <input name="name" type="hidden" id="name" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>"/>
		  <input name="poster" type="hidden" id="name" value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>"/>
          <input name="name1" type="hidden" id="name" value="<?php echo $_SESSION['SESS_LAST_NAME'];?>"/>
          <input type="submit" name="btnlog" value="Post" class="greenButton" />
          </div>
        </form>
		</div>
     <div class="s"> 
	   <?php
	   

  $query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM comment  ORDER BY comment_id DESC";
$result = mysql_query($query);
			
			

while($row = mysql_fetch_assoc($result))
{
   echo '<div class="information">';
	echo '<div class="pic1">';
			$result1 = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row1 = mysql_fetch_array($result1))
  {
	echo "<img width=40 height=40 alt='Unable to View' src='" . $row1["profImage"] . "'>";
	}
	echo '<div class="message">';
	
		$result1 = mysql_query("SELECT * FROM members WHERE member_id='".$row["member_id"] ."'");
while($row1 = mysql_fetch_array($result1))
  {


 echo " Posted by:<font color=#1d3162> {$row1['FirstName']}"."&nbsp;{$row1["LastName"]}</font>";
  }
	
	
	echo '</br>';
	echo "{$row['comment']}";

	echo'</br>';
	echo'</br>';
	echo'</div>';
	echo'<hr width="390">';
	echo '<div class="kkk" style="border:1px solid #eee;width:390px;background:#fcfcfc">';
	
	//allow liking
	$like = mysql_query("SELECT * FROM likes WHERE commentID = $row[comment_id]");
	$likes = mysql_num_rows($like);
	
	//allow commenting 
	$com = mysql_query("SELECT * FROM com WHERE comment_id = $row[comment_id]");
	$coms = mysql_num_rows($com);
	//allow deleting
	if($_SESSION['SESS_MEMBER_ID']==$row['member_id']){
	  $del = '<a class="style" href="deletepost.php?id=' . $row["comment_id"] . '">delete</a>';
	}
	else{
	    $del ="";
	   }
	
	echo'&nbsp;&nbsp;<a class="style" href="like.php?id='.$row["comment_id"].'&from=home&owner='.$row['member_id'].'"><img width=20 height=20  src=img/like.png>Like('.$likes.')</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="commenting.php?id='.$row['comment_id'].'" class=style>comment('.$coms.')</a>&nbsp;&nbsp; '.$del." ";
	
	$days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
		
	echo'</div>';
	echo'</br>';
	echo'</br><br>';
	}
	
  echo '</div>';
  echo'</br>';
 
  ?>
  
  
  </div>
	 </div>
   </div>

 
  
</body>
</html>