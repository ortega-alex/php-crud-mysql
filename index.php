<?php 	
	include("db.php");
	include("./includes/header.php");
?>

<div class="container p-4">

	<?php if ( isset( $_SESSION['message'])) { ?>

		<div class="alert alert-<?= $_SESSION["message_type"];?> alert-dismissible fade show" role="alert">
		  <?= $_SESSION['message'] ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>

	<?php session_unset(); } ?>

	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<form action="save_task.php" method="POST">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
					</div>
					<div class="form-group">
						<textarea name="description" rows="2" name="description" placeholder="Task Description" class="form-control"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
				</form>
			</div>
		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<th>Title</th>
					<th>Description</th>
					<th>Create At</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM task";
						$result = mysqli_query($conn , $query);
						while($row = mysqli_fetch_array($result)) {
					 ?>
						<tr>
							<td><?php echo $row['title'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td><?php echo $row['created_at'] ?></td>
							<td>
								<a class="btn btn-info" href="edit.php?id=<?php echo $row['id'] ?>">
									<i class="fas fa-marker"></i>	
								</a>
								<a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id'] ?>">
									<i class="far fa-trash-alt"></i>	
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
	include("./includes/footer.php");
?>


 	

	