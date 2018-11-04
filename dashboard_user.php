<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style.css"> <!-- Resource style -->
	<script src="../js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Dashboard</title>
</head>
<?php
	session_start();
	$username = $_SESSION["username"];
	$conn = mysqli_connect("localhost","root","","software_project");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$note = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$note = test_input($_POST["note"]);		
		
		$sql = "SELECT username, note FROM notes";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
			}

		} else {

			echo "0 results";
		}
		$note= mysql_real_escape_string($note);
		$sql = "UPDATE notes SET note='$note' WHERE username='Tarush'";
		// $sql = "INSERT INTO notes (username, note) VALUES ('$username', '$note')";
		$result = $conn->query($sql);

		if($result) {
			;
		}
		
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}	
	


?>
<body>


<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a class="navbar-center" href="#"><img src="../img/SortedAppLogo.png"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="#">Time 61:69</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a id="coach" href="../../index.php">Coaches Portal</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-out"></span></a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="row col-sm-12 text-center">
	<h1 style="color: white; font-size: 30px; margin:2.5% 0; font-weight: bolder;"> Student portal </h1>
</div>
<div class="row-1 col-sm-12">
	<div class="video col-sm-6">
		<div class="embed-responsive embed-responsive-16by9">
			<!-- <iframe class="embed-responsive-item" src="../img/small.mp4"></iframe> -->
			<video width="540" height="310" controls>
			<source src="../img/<?php 
					$sql = "SELECT link FROM video where username='teacher'";
					$result = $conn->query($sql);
				
					if ($result->num_rows > 0) {
							
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo $row["link"];				
						}
				
					} else {
				
						echo "0 results";
					}
					?>"
				type="video/mp4">
			</video>
		</div>
	</div>

	<div class="notes col-sm-6">
		
			<div class="col-sm-12 notes-title">
				<div>Add Notes for <?php echo 'Tarush'; ?></div>
			</div>
		<div class="col-sm-6">
			<div class="text">
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" style="margin:10%;">
				Insert Note:<br>
				<input type="text" name="note" style="height: 200px; width: 100%;" ><br>
				<center>
						<button type="submit" style="margin-top:5px;">Submit</button>
				</center>
			</form>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="text">
			<div class="col-sm-12 form-tab">
					<div class="row form-title text-center">
						Please enter the following details to upload documents
					</div>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<center>Select image to upload:</center>
						<br><br>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<center><input type="submit" style="margin:2.5% 0; color:black;" value="Upload Image" name="submit"></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


	<div class="cd-tabs col-sm-6 col-sm-offset-3 text-center">
		<nav class="col-sm-12">
			<ul class="cd-tabs-navigation">
				<li><a data-content="inbox" href="#0">Student Details</a></li>
				<li><a data-content="new" href="#0">Upload documents</a></li>

			</ul> <!-- cd-tabs-navigation -->
		</nav>

		<ul class="cd-tabs-content">
		<li data-content="inbox">

			<div class="col-sm-12" id="TestResults">
					<div class="input-group col-sm-8 col-md-offset-2">
						<input type="text" class="form-control" placeholder="Enter phone no.">
						<span class="input-group-btn chk">
							<button class="btn btn-default" type="button">SUBMIT</button>
				   		</span>
					</div>

					<div class="col-sm-12 text-left tablename">
						YCQ Test Results
					</div>

					<div class="row drop-search col-xs-12">
						<div class="dropdown col-sm-4 styled-select yellow">

							<select id="soflow">
								<option value="10">Showing 10 Entries</option>
								<option value="25">Showing 25 entries</option>
								<option value="all">Showing All entries</option>
							</select>
						</div>

						<div class="search col-sm-3 col-md-offset-6">
							<div class="input-group">
								<input type="text" class="form-control">
								<span class="input-group-btn chk">
								<button class="btn btn-default" type="button">SEARCH</button>
							</span>
							</div>
						</div>

					</div>




				<div class="table-responsive col-sm-12">
				<div class="col-sm-12">

					<table class="table table-bordered">
						<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Username</th>
							<th>Active</th>
							<th>Boss</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							<td><input type="checkbox" value=""></td>
							<td><input type="radio" name="optradio"></td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
							<td><input type="checkbox" value=""></td>
							<td><input type="radio" name="optradio"></td>

						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Larry</td>
							<td>Bird</td>
							<td>@twitter</td>
							<td><input type="checkbox" value=""></td>
							<td><input type="radio" name="optradio"></td>

						</tr>

						</tbody>

					</table>
					</div>
				</div>

					<div class="col-sm-12 text-left tablename">
						Some Other Test Results
					</div>

					<div class="row drop-search col-xs-12">
						<div class="dropdown col-sm-4 styled-select yellow">

							<select >
								<option value="10">Showing 10 Entries</option>
								<option value="25">Showing 25 entries</option>
								<option value="all">Showing All entries</option>
							</select>
						</div>

						<div class="search col-sm-3 col-md-offset-6">
							<div class="input-group">
								<input type="text" class="form-control">
								<span class="input-group-btn chk">
								<button class="btn btn-default" type="button">SEARCH</button>
							</span>
							</div>
						</div>

					</div>




					<div class="table-responsive col-sm-12">
						<div class="col-sm-12">

							<table class="table table-bordered">
								<thead>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
									<th>Active</th>
									<th>Boss</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
									<td><input type="checkbox" value=""></td>
									<td><input type="radio" name="optradio"></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
									<td><input type="checkbox" value=""></td>
									<td><input type="radio" name="optradio"></td>

								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>Bird</td>
									<td>@twitter</td>
									<td><input type="checkbox" value=""></td>
									<td><input type="radio" name="optradio"></td>

								</tr>

								</tbody>

							</table>
						</div>

					</div>
			</div>
			</li>

			<li data-content="new">

				<div class="col-sm-12 form-tab">
					<div class="row form-title text-center">
						Please enter the following details to upload documents
					</div>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						Select image to upload:
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" style="color:black;" value="Upload Image" name="submit">
					</form>
				</div>

			</li>

		</ul> <!-- cd-tabs-content -->
	</div> <!-- cd-tabs -->

<script src="../js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
