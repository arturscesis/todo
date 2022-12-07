<?php
	require_once 'db.php';
 
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
 
		$conn->query("DELETE FROM `task` WHERE `task_id` = $task_id") or die(mysqli_errno($conn));
		header("location: todo.php");
	}	
?>