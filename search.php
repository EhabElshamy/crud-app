<!DOCTYPE html>
<?php include 'db.php';

if(isset($_POST['search'])){

$name = htmlspecialchars($_POST['search']);

$sql = "select * from tasks where name like '%$name%'";
$rows = $db->query($sql);

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
				<center><h1>To Do List</h1></center>
				<div class="col-md-10 col-md-offset-1">

					<?php if(mysqli_num_rows($rows) < 1 ): ?>

						<h2 class="text-danger text-center"> Nothing Found</h2>
						<a href="index.php" class="btn btn-warning">Go Back</a>

						<?php else: ?>
					<table class="table table-hover">
						<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task
						</button>
						<button type="button" class="btn btn-default pull-right" onclick="print()">Print</button>
						<hr>

						<div class="col-md-12 text-center">
						<form action="search.php" method="post" class="form-group">
							<input type="text" name="search" placeholder="Write something to search for" class="form-control">
							
						</form>
						<br>
					</div>
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Task</h4>
									</div>
									<div class="modal-body">
										<form method="post" action="add.php">
											<div class="form-group">
												<label>Task Name</label>
												<input type="text" required name="task" class="form-control">
											</div>
											<input type="submit" name="send" value="Add Task" class="btn btn-success">
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<thead>
							<tr>
								<th>No.</th>
								<th>Task </th>
							</tr>
						</thead>
						<tbody>
						<?php endif; ?>
							<tr>
								<?php while($row = $rows->fetch_assoc()): ?>
								<th><?php echo $row['id']; ?></th>
								<td class="col-md-10"><?php echo $row['name'] ?></td>
								<td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
								<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>

					
				</div>
			</div>
		</div>
	</body>
</html>