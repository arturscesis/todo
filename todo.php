<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>
<body>
    <center>
        <div class="col-md-6 border border-danger">
            <h3 class="text-primary">ToDo - By <?= $_SESSION['username'] ?></h3>
            <div class="col-md-8">
                <form method="POST" class="form-inline" action="add_query.php">
                    <input type="text" class="form-control" name="task" placeholder="Clean the kitchen" required/>
                    <button class="btn btn-primary form-control" name="add">Add Task</button>
                </form>
            </div>
            <br/><br/><br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'db.php';
                        $user_id = $_SESSION['id'];
                        $query = $conn->query("SELECT * FROM `task` WHERE user_id='$user_id' ORDER BY `task_id` ASC");
                        $count = 1;
                        while($fetch = $query->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td><?php echo $fetch['task']?></td>
                        <td><?php echo $fetch['status']?></td>
                        <td colspan="2">
							<?php
								if($fetch['status'] != "Done"){
									echo 
									'<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
								}
							?>
							 <a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
					    </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </center>
</body>
</html>