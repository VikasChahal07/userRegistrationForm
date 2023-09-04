<?php
    $showAlert = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $username = $_POST["username"];
        $address = $_POST["address"];
        
        $sqlun = "INSERT INTO `users` (`username`) VALUES ('$username')";
        $sqladd = "INSERT INTO `addresses` (`address`) VALUES ('$address')";

        $resultun = mysqli_query($conn, $sqlun);
        $resultadd = mysqli_query($conn, $sqladd);

        if($resultun && $resultadd){
            $showAlert = true;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>User Registration</title>
  </head>
  <body>
    <?php
        if($showAlert){
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have registered successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
    ?>
    <div class="container" style="margin-top: 40px">
        <h1 class="text-center">Enter your details to register</h1>
        <form action="/registrationform/register.php" method="post">
            <div class="form-group">
                <label class="mt-2" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>