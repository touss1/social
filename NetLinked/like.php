
<?php
		    session_start(); 
			include('connect.php');
			
			
			$commentID = $_GET['id'];
			$user = $_SESSION['SESS_MEMBER_ID'];
			$from = $_GET['from'].".php";
			$owner = $_GET['owner'];
			
			//check if already liked
			$checklike = mysql_query("SELECT *  FROM likes WHERE commentID = '$commentID' AND user = '$user'");
			
			if(mysql_num_rows($checklike)==0){
			$like = mysql_query("INSERT INTO likes (commentID,user)VALUES ('$commentID','$user')");
			
			
			//send notification 
            
			 $userquery = mysql_query("SELECT * FROM members WHERE member_id = '$user' ");
			 $res = mysql_fetch_object($userquery);
			 $username = $res->FirstName." ".$res->LastName;
			 $time = date("Y-m-d h-i-s");
			 mysql_query("INSERT INTO notifications VALUES('','$owner','$commentID','$username liked your post','$time','unread') ");
			 
            }else{
			 $unlike = mysql_query("DELETE FROM likes WHERE commentID = '$commentID' AND user = '$user'");
			}

			header("location: ".$from."");
			
			//if like from friend profile
			if(isset($_GET['u'])) {
			  header("location: ".$from."?id=$_GET[u]");
			}
			
			
			exit();
			
			mysql_close($con);
			
			?>