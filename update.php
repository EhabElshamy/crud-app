<!DOCTYPE html>
<?php include 'db.php';
$id = (int)$_GET['id'];
$sql = "select * from tasks where id='$id'";
$rows = $db->query($sql);
$row=$rows->fetch_assoc();
if(isset($_POST['send'])){
	$task = htmlspecialchars($_POST['task']);
$sql = "update tasks set name='$task' where id ='$id'";
$db->query($sql);
header('location:index.php');
}
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<title> Crud App</title>
	</head>
	<body>
		<div class="container">
			<div class="row" style="margin-top: 7%">
				<center><h1>Update Task</h1></center>
				<div class="col-md-10 col-md-offset-1">
					
					<hr><br>
					
					<form method="post">
						<div class="form-group">
							<label>Task Name</label>
							<input type="text" required name="task" class="form-control" value="<?php echo $row['name']; ?>">
						</div>
						<input type="submit" name="send" value="Update Task" class="btn btn-success">&nbsp;
						<a href="index.php" class="btn btn-warning">Go Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>
</div>
</div>
</body>
</html>