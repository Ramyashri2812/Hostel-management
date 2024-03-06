<?php

  $rollno = $_POST['rollno'];
  $password = $_POST['password'];
  
  $conn = new mysqli('localhost','root','','hostelmanagement');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
  else {
    $checkUser = "SELECT * from student where rollno='$rollno'";
		$result = mysqli_query($conn, $checkUser);
		$count = mysqli_num_rows($result);
		if($count==1)
		{
      $l = "SELECT password from student where rollno='$rollno'";
      $i = mysqli_query($conn, $l);
      $row = mysqli_fetch_row($i);
      if(password_verify($password, $row[0]))
      {
        header("Location: hostel_manage.html");
        exit;
      }
      else {
        echo '
        <html>
        <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
        <body>
        <div class="jumbotron jumbotron-fluid">
        <div class="container">
      <h1 class="display-4">Wrong credentials!</h1>
      <p class="lead">Click on Back to sign in to try again.</p>
      <a class="btn btn-success btn-lg" href="sign_in.html" role="button">Back to sign in!</a>
    </div>
    </div>
    </body>
    </html>';
      }
		}
    else {
    echo '
    <html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <body>
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
  <h1 class="display-4">Wrong credentials!</h1>
  <p class="lead">Click on Back to sign in to try again.</p>
  <a class="btn btn-success btn-lg" href="sign_in.html" role="button">Back to sign in!</a>
</div>
</div>
</body>
</html>';
    }
  }
?>
