<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bottstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <style>

.row{
    margin-top: 10%;
    width: 50%;
    margin-left: 25%;
}

h3{
    border-bottom: 2px solid #3A9943;
}

a{
    text-decoration: none;
color: #3A9943;}

a:hover{
    text-decoration: none;
color: #3A9943;}

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
        <h3>Create New Account</h3>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="password">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="inputConfPass" name="confPass">
          </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity" name="city">
        </div>
        <div class="col-md-6">
          <label for="inputZip" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="inputPhone" name="phone">
        </div>
        <div class="col-md-6">
          <input type="hidden" class="form-control" id="inputPhone" name="userType" value="user">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="signUp">Sign up</button>
        </div>
        <h5>Already have an Account? <a href="login.php">Login</a></h5>
      </form>
    
</body>
</html>

<?php

include('connection.php');

if(isset($_POST['signUp'])){
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$city=$_POST['city'];
$userType="user";

$confPass=$_POST['confPass'];

$sql1="SELECT * FROM account where email='$email'";
$result=mysqli_query($con,$sql1);
$present=mysqli_fetch_row($result);
if($present>0){?>
    <script>
        alert("Email already exist!");
    </script>
    <?php
}
else if($confPass != $password){?>
    <script>
        alert("Password and Confirm Password not equal!");
    </script>
    <?php
}
else{


// // Hash the password before saving in the database
// $password = password_hash($password, PASSWORD_DEFAULT);
// // Validate the form fields
// $error_message = "";
// if (empty($email)) {
//     $error_message .= "Email is required.<br>";
// }
// if (empty($phone)) {
//     $error_message .= "Phone is required.<br>";
// }
// if (empty($password)) {
//     $error_message .= "Password is required.<br>";
// }

// // Validate the data for sql injection
// $email = stripslashes($email);
// $phone = stripslashes($phone);
// $password = stripslashes($password);
// $address1 = stripslashes($address1);
// $address2 = stripslashes($address2);
// $city = stripslashes($city);
// $userType = stripslashes($userType);


$sql2 = "INSERT INTO account (email, phone, password, address1, address2, city, userType) VALUES('$email', '$phone', '$password', '$address1', '$address2', '$city', '$userType')";
$results=mysqli_query($con,$sql2);
if($results){?>
    <script>
        alert("Account has been created!");
    </script>
    <?php
}
}
}

?>