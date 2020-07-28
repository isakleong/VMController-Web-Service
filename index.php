<?php
if(isset($_POST)){
	$_SESSION["status"]="Admin";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Proyek Tekvir</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="myscript.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #f2b51d">
	<div class="container">
		<div class="row mx-auto well col-lg-12 mt-5">
			<div class="col-lg-12 ">
				<h1>List of VM</h1>
				<br>
				<div class="text-right">

					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						Add Data
					</button>
				</div>	

				<br>
				<div id="dialog-form">
					<table class="table table-hover table-striped">
						<thead class="thead-dark">
							<tr style="text-align: center;">
								<th>ID</th>
								<th>VM Path</th>
								<th>VM Status</th>
								<th>Run Command</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="user-list">
							<?php
							include "database.php";

							global $con;
							
							$q = mysqli_query($con, "select * from proyek") or die(mysqli_error($con));
							while ($row = mysqli_fetch_assoc($q))
							{
								$data_id = $row["id"];
								$data_path= $row["path"];
								$data_status = $row["status"];

								echo "<tr>";
								echo "<td>$data_id</td><td>$data_path</td><td>$data_status</td>";
								echo "<td><a href='home.php?num=$data_id'><button class='btn btn-primary'>Run Command</button></a></td>";
								echo "<td><a href='delete.php?num=$data_id'><button class='btn btn-primary'>Delete</button></a></td>";
								echo "</tr>";

							}	
							?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	

	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">VM Path</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<form method="post" action="insert.php" enctype="multipart/form-data">
					<div class="modal-body">
						<label for="path">Path: </label>
						<input type="text" name="path" id="path" class="form-control">
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="submit">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

