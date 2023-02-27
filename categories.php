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
        <h3>Add New Category</h3>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Category Id</label>
          <input type="text" class="form-control" id="inputEmail4" name="plantName" required>
        </div>
        <div class="col-md-6">
          <label for="inputText" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="inputtext" name="text" required>
        </div>
        <div class="col-md-6">
          <label for="inputText" class="form-label">Category information</label>
          <input type="text" class="form-control" id="inputText" name="infomation" required>
        </div>
      </form>

</body>
</html>

<?php

session_start();

include('connection.php');

if(isset($_POST['addCategory'])){

$id=$_POST ['Id'];
$category_name=$_POST['categoryName'];
$category_info=$_POST['information'];


$sql="INSERT INTO categories (id, categoryName,information) VALUES('$id', '$category_name', '$category_info')";
$results=mysqli_query($con,$sql);

header("Location: adminPage.php");
}

?>