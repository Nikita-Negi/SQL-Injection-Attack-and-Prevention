<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Name</title>

	<link href="assets/css/main.css" rel="stylesheet">

	<script src="assets/js/jquery.js"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php 

	session_start();
	$conn = mysqli_connect("localhost","root","","software_project");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	

	$name = $email = $type = $result = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["username"]);
		$password = test_input($_POST["password"]);
	}
	  
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$_SESSION["username"] = $name;
	$sql = "SELECT username, passwordcheck, type FROM login";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["username"] == $name && $row["passwordcheck"] == $password) {
				
				if($row["type"] == "admin") {
					
					header("Location: assets/pages/dashboard.php");
				}
				else {
					header("Location: assets/pages/dashboard-user.php");
				}
				die();
			}
		}

	} else {
		echo "0 results";
	}
	$conn->close();


?>
<body>

	  <div class="col-sm-4 col-sm-offset-4 login-screen">
		  <div class="col-sm-12 title-bar text-center">
		  	<div class="row">
				<img src="assets/img/ILMlogo.png" class="ILMAppLogo">						
				<img src="assets/img/SortedAppLogo.png" class="SortedAppLogo">	
			</div>
			<div class="row">
				Career Coach Portal
			</div>
		  </div>

		  <div class="col-sm-12 image-tab">
			  <div class="col-sm-12 parent">
				<img src="assets/img/Largeimg.png" id="bigimg">
			  </div>
		  </div>

		  <div class="col-sm-12 form-tab">
			  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

				  <div class="form-group row">

					  <div class="col-sm-6 col-sm-offset-3">
						  <input type="text" class="form-control" id="inputName" placeholder="UserName" name="username">
					  </div>
				  </div>

				  <div class="form-group row">
					  <div class="col-sm-6 col-sm-offset-3">
						  <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
					  </div>
					<div class="form-group login-btn col-sm-6 col-sm-offset-3 row">
							<button type="submit" id="button" class="btn">Login</button>
					</div>
				</div>
				  
			  </form>
		  </div>
	  </div>
	</div>
	
</body>

</html>
