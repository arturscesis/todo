<?php
	require_once 'db.php';
    include("auth_session.php");
	if(isset($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
            $user_id = $_SESSION['id'];
 
			$conn->query("INSERT INTO `task` (task, status, user_id) VALUES('$task', '', '$user_id')");
			header('location:todo.php');
		}
	}
?>