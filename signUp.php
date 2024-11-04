<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'components/_dbconnect.php';
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $date = $_POST["date"];
  $gender = $_POST["gender"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $Cpassword = $_POST["Cpassword"];
 //$exists = false;

  // Check whether this username exists
  $existSql = "SELECT * FROM `try` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    // $exists = true;
    $showError = "Username Already Exists";
  }
  else{
    // $exists = false;
  if($password == $Cpassword){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql ="INSERT INTO `try` (`name`, `phone`, `date`, `gender`, `username`, `email`, `password`, `Cpassword`) VALUES ('$name','$phone', '$date', '$gender', '$username', '$email', '$password', '$Cpassword')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $showAlert = true;
    }
  }
  else{
    $showError = "Passwords do not match";
  }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color: teal ">
      <?php require 'components/_nb.php' ?>

<?php 
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your account is now created and you can login.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong>' . $showError .'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
?>

<div class="container my-4 text-black border border-primary-subtle p-4 rounded-2 w-50 p-3 border-3">
    <h1 class="text-center">SignUp to our website</h1>
  <form action="/loginSystem/signUp.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>         
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" required>         
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>         
      </div>
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" aria-describedby="emailHelp" required>         
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>         
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" required>         
      </div>
      <div class="mb-3">
        <label for="Cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="Cpassword" name="Cpassword" aria-describedby="emailHelp" required>         
      </div>
      <div id="emailHelp" class="">Please Enter the same password.</div> 
      <button type="submit" class="btn btn-primary">SignUp</button>
  </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>