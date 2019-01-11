<?php 
	
	include("db.php");

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$query = "SELECT * FROM task WHERE id = $id";
		$result = mysqli_query($conn , $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$title = $row['title'];
			$id = $row['id'];
			$description = $row['description'];
		} 
	}

	if(isset($_POST['update'])) {
		$id = $_GET['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];

		$query = " UPDATE task SET title = '$title' , description = '$description' WHERE id = $id ";

		$result = mysqli_query($conn , $query);
		if ( !$result ) {
			die("query failed");
		}

		$_SESSION['message'] = "task update successfully";
		$_SESSION["message_type"] = "info";
		
		header("location: index.php");
	}

 ?>

 <?php include("includes/header.php") ?>

<div class="container">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="edit.php?id=<?php echo $id; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $title ?>" class="form-control" placeholder="Task Title" autofocus>
					</div>
					<div class="form-group">
						<textarea name="description" rows="2" name="description" placeholder="Task Description" class="form-control"> <?php echo $description; ?> </textarea>
					</div>
					<button type="submit" class="btn btn-success btn-block" name="update">
						Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

 <?php include("includes/footer.php") ?>