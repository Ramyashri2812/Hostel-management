<?php
  $emailid = $_POST['emailid'];
  $password = $_POST['password'];
  $password1 = $_POST['password1'];

  $conn = new mysqli('localhost','root','','hostelmanagement');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
  else {
    $k = "SELECT * from student WHERE emailid='$emailid'";
    $result = mysqli_query($conn, $k);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
      if($password == $password1)
      {
        $h = password_hash($password, PASSWORD_DEFAULT);
        $sql=mysqli_query($conn, "UPDATE student SET password='$h' where emailid='$emailid'");
        if($sql)
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
        <h1 class="display-4">Your password has been changed!</h1>
        <p class="lead">Click on Go to login to login</p>
        <a class="btn btn-success btn-lg" href="sign_in.html" role="button">Go to login in</a>
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
      <h1 class="display-4">Passwords do not match!</h1>
      <p class="lead">Please try again.</p>
      <a class="btn btn-success btn-lg" href="change.html" role="button">Try again</a>
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
    <h1 class="display-4">Incorrect email address!</h1>
    <p class="lead">Please try again.</p>
    <a class="btn btn-success btn-lg" href="change.html" role="button">Try again</a>
  </div>
  </div>
  </body>
  </html>';
    }
  }

 ?>
