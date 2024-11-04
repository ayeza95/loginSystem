<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'components/_dbconnect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `try` WHERE username='$username' AND password= '$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if($num){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: index.html");
  }
    else{
      $showError = " Authentication failed.";
     }
}
?> 

  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color: teal">
  <?php  require 'components/_nb.php' ?>

  <?php
  if($login)
  {
   echo '<div class="alert alert-primary" role="alert">
   <strong>Success!</strong> Your username and password has been submitted successfully!
 </div>';
  }
  if($showError){
//       echo '<div class="alert alert-primary" role="alert">
//    <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvenience caused!
//  </div>';
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong>' . $showError .'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
?>
<div class="container position-absolute top-50 start-50 translate-middle p-3  mt-3" style="width: 40%">
  <h1 class="text-center">LOGIN</h1>
<form action="/loginSystem/logIn.php" method="post">
  <div class="mb-3" style="color: black">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3" style="color: black">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <div id="emailHelp" class="form-text" style="color: black"> We'll never share your password with anyone else.</div>
  </div>
  <button type="submit" class="btn btn-primary">LogIn</button>
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

