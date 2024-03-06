<?php
  $name = $_POST['name'];
  $rollno = $_POST['rollno'];
  $emailid = $_POST['emailid'];
  $year = $_POST['year'];
  $gender = $_POST['gender'];
  $pwd = $_POST['pwd'];

  $conn = new mysqli('localhost','root','','hostelmanagement');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
  else {
		   if($gender=='F')
       {
         $checkUser = "SELECT * from girlregister where rollno='$rollno'";
     		$result = mysqli_query($conn, $checkUser);
     		$count = mysqli_num_rows($result);
         $checkUser1 = "SELECT * from girlregister where emailid='$emailid'";
     		$result1 = mysqli_query($conn, $checkUser1);
     		$count1 = mysqli_num_rows($result1);
     		if($count>0 && $count1>0)
     		{
           echo '

<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
             integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
             crossorigin="anonymous">
			<body>
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-4">Check your credentials and try again as it seems that you have already registered!</h1>
						<p class="lead">Click here to go to home</p>
						<a class="btn btn-success btn-lg" href="rooms.html" role="button">Go to home</a>
					</div>
				</div>
			</body>
		</html>';
     		}
     		else {
     		$stmt = $conn->prepare("insert into girlregister(name, rollno, emailid, year, gender, pwd) values(?, ?, ?, ?, ?, ?)");
     		$stmt->bind_param("ssssss", $name, $rollno, $emailid, $year, $gender, $pwd);
     		$execval = $stmt->execute();
         echo '

		<html>
			<head>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
           integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
           crossorigin="anonymous">
					<body>
						<div class="jumbotron jumbotron-fluid">
							<div class="container">
								<h1 class="display-4">Your registration is successful!</h1>
								<p class="lead">Come back after a while to check your room allocation.</p>
								<a class="btn btn-success btn-lg" href="rooms.html" role="button">Go to home</a>
							</div>
						</div>
					</body>
				</html>';
     		$stmt->close();
     		$conn->close();
     	}
       }
       else {
         $checkUser = "SELECT * from boyregister where rollno='$rollno'";
     		$result = mysqli_query($conn, $checkUser);
     		$count = mysqli_num_rows($result);
         $checkUser1 = "SELECT * from boyregister where emailid='$emailid'";
     		$result1 = mysqli_query($conn, $checkUser1);
     		$count1 = mysqli_num_rows($result1);
     		if($count>0 && $count1>0)
     		{
           echo '

				<html>
					<head>
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
             integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
             crossorigin="anonymous">
							<body>
								<div class="jumbotron jumbotron-fluid">
									<div class="container">
										<h1 class="display-4">Check your credentials and try again as it seems that you have already registered!</h1>
										<p class="lead">Click here to go to home</p>
										<a class="btn btn-success btn-lg" href="rooms.html" role="button">Go to home</a>
									</div>
								</div>
							</body>
						</html>';
     		}
     		else {
     		$stmt = $conn->prepare("insert into boyregister(name, rollno, emailid, year, gender, pwd) values(?, ?, ?, ?, ?, ?)");
     		$stmt->bind_param("ssssss", $name, $rollno, $emailid, $year, $gender, $pwd);
     		$execval = $stmt->execute();
         echo '

						<html>
							<head>
								<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
           integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
           crossorigin="anonymous">
									<body>
										<div class="jumbotron jumbotron-fluid">
											<div class="container">
												<h1 class="display-4">Your registration is successful!</h1>
												<p class="lead">Come back after a while to check your room allocation.</p>
												<a class="btn btn-success btn-lg" href="rooms.html" role="button">Go to home</a>
											</div>
										</div>
									</body>
								</html>';
     		$stmt->close();
     		$conn->close();
       }
     }
	}
 ?>
