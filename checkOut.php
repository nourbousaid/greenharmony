
<?php

include 'connection.php';
session_start();
$grandTotal = $_SESSION['grandTotal'];
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bottstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link hre="https://sweetalert2.github.io/">
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

<?php
        $result = mysqli_query($con,"SELECT * FROM account WHERE email = '$email'");
        while($row = mysqli_fetch_array($result)) {
?>

<form class="row g-3" method="post">
        <h3>Check Out</h3>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" readonly>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Phone</label>
          <input type="text" class="form-control" value="<?php echo $row['phone'] ?>" name="phone" readonly>
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label">Address 1</label>
            <input type="text" class="form-control" value="<?php echo $row['address1'] ?>" placeholder="1234 Main St" name="address1" readonly>
          </div>
        <div class="col-6">
          <label for="inputAddress" class="form-label">Address 2</label>
          <input type="text" class="form-control" value="<?php echo $row['address2'] ?>" placeholder="Apartment, studio, or floor" name="address2" readonly>
        </div>
        <div class="col-6">
          <label for="inputAddress2" class="form-label">City</label>
          <input type="text" class="form-control" value="<?php echo $row['city'] ?>"  name="city" readonly>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Total Price $</label>
          <input type="text" class="form-control" value="<?php echo $grandTotal; ?>" name="total" readonly >
        </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="radio" value="dollar" name="pay" required>
      <label class="form-check-label" for="invalidCheck">
        Pay in dollar
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="radio" value="L.L." name="pay" required>
      <label class="form-check-label" for="invalidCheck">
        Pay in L.L.
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value=""required>
      <label class="form-check-label" for="invalidCheck">
        Cash On Delivery
      </label>
    </div>
  </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="orderNow">Order Now</button>
        </div>
      </form>

      <?php } ?>

      <?php
      
      if(isset($_POST['orderNow'])){

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $total = $_POST['total'];
        $pay = $_POST['pay'];
        
        $query = mysqli_query($con, "SELECT * FROM cart WHERE email = '$email'");
        if(mysqli_num_rows($query)){
            while($row = mysqli_fetch_assoc($query)){
                $plantName[] = $row['plantName'] .' ('. $row['qty'] .')';
                $plantID[] = $row['plantID'];
            }
        }
        
        $all_plants = implode(', ', $plantName);
        $all_plant_id = implode(', ', $plantID);
        $sql="INSERT INTO chekout (email,phone,address1,address2,city,all_plants,all_plant_id,pay,total)
                        VALUES('$email','$phone','$address1','$address2','$city','$all_plants','$all_plant_id','$pay','$total')";
        $result=mysqli_query($con,$sql);
        if($result){?>
            <script> 
            alert("thank you for shopping");

            </script>
            <?php }} ?>

</body>
</html>