<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bottstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    </style>
    
<form class="row g-3" method="post" enctype="multipart/form-data">
        <h3>Add New Plant</h3>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Plant Name</label>
          <input type="text" class="form-control" id="inputEmail4" name="plantName" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Plant Image</label>
          <input type="file" class="form-control" id="inputPassword4" name="image" required>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Category</label>
            <select class="form-control" name="category" id="">
                <option value="indoor">Indoor Plant</option>
                <option value="outdoor">Outdoor Plant</option>
            </select>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Size</label>
            <select class="form-control" name="size" id="">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
          </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Discount</label>
          <input type="number" class="form-control" id="inputAddress" name="discount">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Price</label>
          <input type="number" class="form-control" id="inputAddress2" name="price" required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="addPlant">Add</button>
        </div>
      </form>

</body>
</html>

<?php

session_start();

include('connection.php');

if(isset($_POST['addPlant'])){

$image=$_FILES['image']['name'];
$plantName=$_POST['plantName'];
$category=$_POST['category'];
$size=$_POST['size'];
$discount=$_POST['discount'];
$price=$_POST['price'];

$sql="INSERT INTO plants (image, plantName, category, size, discount, price) VALUES('$image', '$plantName', '$category', '$size', '$discount', '$price')";
$results=mysqli_query($con,$sql);
move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
header("Location: adminPage.php");
}

?>