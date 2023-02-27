<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bottstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <style>
        .row {
            margin-top: 10%;
            width: 50%;
            margin-left: 25%;
        }

        h3 {
            border-bottom: 2px solid #3A9943;
        }

        a {
            text-decoration: none;
            color: #3A9943;
        }

        a:hover {
            text-decoration: none;
            color: #3A9943;
        }
    </style>

    <div class="header-1">
   <div class="navbar">
                    <a href="index.php">Home</a>
</div> </nav>
        <div class="share">
     
            <span> follow us : </span>
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
        </div>

        <div class="call">
            <span> call us : </span>
            <a href="#">03695386</a>
        </div>

    </div>

    <form class="row g-3" method="post">
        <h3>Login</h3>
        <div class="col-8">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputEmail" name="email">
        </div>
        <div class="col-8">
            <label for="inputAddress" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="signIn">Sign in</button>
        </div>
        <h5>Don't have an Account? <a href="register.php">Register Now</a></h5>
    </form>

</body>

</html>

<?php

include('connection.php');

session_start();

if(isset($_POST['signIn'])){
$email = $_POST['email'];
$password = $_POST['password'];

// Verify password when using hashing
// $query = "SELECT * FROM users WHERE email = '$email' && userType = 'user'";
// $result = mysqli_query($con, $query);
// $row = mysqli_fetch_array($result);
// if (password_verify($password, $row['password'])) {
//     $_SESSION['email'] = $email;
//     $_SESSION['id'] = $row['id'];
//     $_SESSION['loggedIn'] = true;
//     header("Location:userPage.php");
// } else {
//     echo '<script>alert("Wrong email or password")</script>';
// }

$sql = "select * from account where email = '$email' && password = '$password' && userType = 'user'";
$result = mysqli_query($con,$sql) or
die ("Record not found");
   
$row = mysqli_fetch_row($result);
   if (isset($row)){
    $_SESSION['email'] = $email;
    header("Location:userPage.php");
   }
   else{?>
<script>
    alert("Invalid email or password!");
</script>
<?php
   }
  mysqli_free_result($result);
}

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "select * from account where email = '$email' && password = '$password' && userType = 'admin'";
    $result = mysqli_query($con,$sql) or
    die ("Record not found");
       
    $row = mysqli_fetch_row($result);
       if (isset($row)){
        $_SESSION['email'] = $email;
        header("Location:adminPage.php");
       }
       else{?>
<script>
    alert("Invalid email or password!");
</script>
<?php
       }
      mysqli_free_result($result);
    
    mysqli_close($con);
    }

?>