<?php

include 'connection.php';

if (isset($_GET['removeImage'])) {
  $remove_id = $_GET['removeImage'];
  $response = mysqli_query($con, "DELETE FROM slider WHERE id = $remove_id");
  if ($response) { ?>
    <script>
      alert("Image deleted");
    </script>
  <?php
  }
};

if (isset($_GET['removeProject'])) {
  $remove_id = $_GET['removeProject'];
  $response = mysqli_query($con, "DELETE FROM pictures WHERE id = $remove_id");
  if ($response) { ?>
    <script>
      alert("Project deleted");
    </script>
  <?php
  }
};

if (isset($_GET['removePlant'])) {
  $remove_id = $_GET['removePlant'];
  $response = mysqli_query($con, "DELETE FROM plants WHERE id = $remove_id");
  if ($response) { ?>
    <script>
      alert("Plant deleted");
    </script>
<?php
  }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</head>

<body>

  <style>
    table {
      margin-top: 2%;
    }

    .btn-primary {
      margin-top: 5%;
    }
  </style>

  <div class="row">
    <div class="col-1">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Plants</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Pictures</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Orders</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Slider</a>
        <a class="nav-link" id="v-pills-categories-tab" data-toggle="pill" href="#v-pills-categories" role="tab" aria-controls="v-pills-categories" aria-selected="false">Categories</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
    <div class="col-10">
      <div class="tab-content" id="v-pills-tabContent">
        <!-- home -->
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

          <a href="addPlant.php" class="btn btn-primary">Add New Plant</a>

          <?php
          include('connection.php');

          $result = mysqli_query($con, "SELECT * FROM plants");
          ?>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Plant</th>
                <th scope="col">Categories</th>
                <th scope="col">Size</th>
                <th scope="col">Discount</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>

                <tr>
                  <th scope="row"><?php echo $row['id'] ?></th>
                  <td><img src="<?php echo "images/" . $row['image'] ?>" style="width: 120px;" alt=""></td>
                  <td><?php echo $row['plantName'] ?></td>
                  <td><?php echo $row['Category'] ?></td>
                  <td><?php echo $row['size'] ?></td>
                  <td><?php echo $row['discount'] ?>%</td>
                  <td><?php echo $row['price'] ?>$</td>
                  <td><a href="adminPage.php?removePlant=<?php echo $row['id'] ?>" onclick="return confirm('remove Plant?')" class="btn btn-danger">Delete</a></td>
                </tr>
            </tbody>
          <?php } ?>
          </table>
          <!-- end of  -->

        </div>
        <!-- profile   -->
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

          <a href="addPicture.php" class="btn btn-primary">Add New Project</a>

          <?php
          include('connection.php');

          $result = mysqli_query($con, "SELECT * FROM pictures");
          ?>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Project</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>

                <tr>
                  <th scope="row"><?php echo $row['id'] ?></th>
                  <td><img src="<?php echo "images/" . $row['image'] ?>" style="width: 120px;" alt=""></td>
                  <td><?php echo $row['projectName'] ?></td>
                  <td><?php echo $row['category'] ?></td>
                  <!-- <td><?php echo $row['description'] ?></td> -->
                  <td><a href="adminPage.php?removeProject=<?php echo $row['id'] ?>" onclick="return confirm('remove Project?')" class="btn btn-danger">Delete</a></td>
                </tr>
            </tbody>
          <?php } ?>
          </table>

        </div>
        <!-- end of profile -->
<!-- message -->
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

          <?php
          include('connection.php');

          $result = mysqli_query($con, "SELECT * FROM chekout");
          ?>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Address 1</th>
                <th scope="col">Address2</th>
                <th scope="col">Plants ID</th>
                <th scope="col">Plants(Quantity)</th>
                <th scope="col">Pay</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>

              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>

                <tr>
                  <th scope="row"><?php echo $row['email'] ?></th>
                  <td><?php echo $row['phone'] ?></td>
                  <td><?php echo $row['city'] ?></td>
                  <td><?php echo $row['address1'] ?></td>
                  <td><?php echo $row['address2'] ?></td>
                  <td><?php echo $row['all_plant_id'] ?></td>
                  <td><?php echo $row['all_plants'] ?></td>
                  <td><?php echo $row['pay'] ?></td>
                  <td><?php echo $row['total'] ?></td>
                </tr>
            </tbody>
          <?php } ?>
          </table>

        </div>
<!-- end of message -->
       
<!-- category -->
<div class="tab-pane fade" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab">
        <form class="row g-3" method="post" enctype="multipart/form-data">
          <h3>Add New Category</h3>
            <div class="col-md-6">
              <label for="inputcategory" class="form-label">Categories</label>
              <input type="text" class="form-control" id="inputcategory" name="category_name" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="addcategory">Add</button>
            </div>
        </form>

        <?php
          include('connection.php');

          $result = mysqli_query($con, "SELECT * FROM categories");
          ?>

        <table class="table table-striped">
            <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Category Name</th>
                  <!-- <th scope="col">Category Description</th> -->
              </tr>
            </thead>
            <tbody>

                    <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>

                      <tr>
                        <th scope="row"><?php echo $row['id'] ?></th>
                        <th scope="row"><?php echo $row['category_name'] ?></th>
                        <!-- <th scope="row"><?php echo $row['category_description'] ?></th> -->
                        <td><a href="adminPage.php?removeCategory=<?php echo $row['id'] ?>" onclick="return confirm('remove the category from categories?')" class="btn btn-danger">Delete</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
          </table>

                  <?php
                  if(isset($_GET['removeCategory'])){
                    $remove_id = $_GET['removeCategory'];
                    $response = mysqli_query($con, "DELETE FROM categories WHERE id = $remove_id");
                    if($response){?>
                    <script>
                        alert("Category deleted");
                    </script>
                    <?php
                    }
                    header("Location: categories.php");
                   };
                  ?>
                  <?php

// session_start();

include('connection.php');

if(isset($_POST['addcategory'])){

$category=$_POST['category_name'];

$sql="INSERT INTO categories (category_name) VALUES('$category')";
$results=mysqli_query($con,$sql);

}

?>
 </div>

                  <!--sliders  -->
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

          <form class="row g-3" method="post" enctype="multipart/form-data">
            <h3>Add New Slider Image </h3>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Slider Image</label>
              <input type="file" class="form-control" id="inputPassword4" name="image" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="addSlider">Add</button>
            </div>
          </form>

          <?php

            $result = mysqli_query($con,"SELECT * FROM slider");
          ?>

          <table class="table table-striped">
            <thead>
              <tr>
              <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>

            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

              <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><img src="<?php echo "images/" . $row['pictures'] ?>" style="width: 120px;" alt=""></td>
                <td><a href="adminPage.php?removeImage=<?php echo $row['id'] ?>" onclick="return confirm('remove Image from slider?')" class="btn btn-danger">Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
        </table>

        </div>

      </div>
    </div>
  </div>
  </div>
  

  <?php

  if (isset($_POST['addSlider'])) {

    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO slider (pictures) VALUES('$image')";
    $results = mysqli_query($con, $sql);
    move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $_FILES['image']['name']);

  }?>

 
                  </body>
</html>