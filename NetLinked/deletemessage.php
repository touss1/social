<?php
  require ("connect.php");  
?>  
	
<?php
  if(isset($_REQUEST['message_id'])){
	$ID =$_REQUEST['message_id'];
	mysql_query("DELETE FROM messages WHERE message_id = '$ID'")
	or die(mysql_error());  	
	header("Location: receivemessage.php");
	}
?>

<?php
    if(isset($_REQUEST['mark_message_id'])){
	$ID =$_REQUEST['mark_message_id'];
	mysql_query("UPDATE   messages SET status = 'read' WHERE message_id = '$ID'")
	or die(mysql_error());  	
	header("Location: receivemessage.php");
	}
?>