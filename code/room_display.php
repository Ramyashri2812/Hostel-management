
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Room display</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Alloted rooms</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form action="" method="POST">
                  <div class="form-group">
                    <input class="form-control" type="text" name="get_rollno" placeholder="Enter your roll number">
                  </div>
                  <button class="btn btn-primary"type="submit" name="search_by_rno">Search</button>
                  </form>
                </div>
              </div>
          <?php
          $conn = new mysqli('localhost','root','','hostelmanagement');
          if(isset($_POST['search_by_rno'])){
            $id = $_POST['get_rollno'];
            $query = "select * from roomallocation where rollno='$id'";
            $query_run = mysqli_query($conn,$query);
           ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Room number</th>
                      <th>Roll number</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(mysqli_num_rows($query_run)>0){
                      while($row = mysqli_fetch_array($query_run)){
                     ?>
                      <tr>
                        <td><?php echo $row['roomno'] ?></td>
                        <td><?php echo $row['rollno']?></td>
                      </tr>
                      <?php
                    }
                  }
                  else{
                    ?>
                    <tr>
                      <td colspan="6">No record found</td>
                    </tr>
                      <?php
                       }
                      ?>
                       </tbody>
              </table>
         </div>
      <?php
       }
       ?>
    </div>
  </div>
</div>
</div>
</div>
  </body>
</html>
