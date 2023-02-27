<?php include('connection.php');

session_start();

$email = $_SESSION['email'];

if(isset($_GET['remove'])){
    $remove_no = $_GET['remove'];
    $response = mysqli_query($con, "DELETE FROM cart WHERE plantID = $remove_no && email = '$email'");
    if($response){?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
    <script> 
    alert("deleted"); 
      
  
    
    </script>
    <?php
    }
};

if(isset($_GET['delete_all'])){
  $email = $_SESSION['email'];
  $response = mysqli_query($con, "DELETE FROM cart WHERE email = '$email'");
  if($response){?>
      <script>
        alert("Your cart has been emptied");
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
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body>

<?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM cart WHERE email = '$email'");
$grand_total = 0;
?>
<form action="" method="post">
<table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Plant</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   
                    <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>

                      <tr>
                        <td><?php echo $row['plantName'] ?></td>
                        <td><?php echo $row['size'] ?></td>
                        <td><?php echo $row['price'] ?>$</td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $sub_total = number_format($row['price'] * $row['qty']) ?></td>
                        <td><a href="cart.php?remove=<?php echo $row['plantID'] ?>" onclick="return confirm('remove item from cart?')" class="btn btn-danger">Delete</a></td>
                      </tr>

                      <?php $grand_total += $sub_total; } ?>
                      <?php
                  if(isset($_POST['checkOut'])){
                    $_SESSION['email'] = $email;
                    $_SESSION['grandTotal'] = $grand_total;
                    header("Location: checkOut.php");
                  }
                  
                  ?>

                      <tr>
                        <form action="" method="post">
                        <td colspan="2"></td>
                        <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure to delete all?')" class="btn btn-danger">Empty Cart</a></td>
                        <td><a class="btn btn-warning" href="userPage.php">Shop More</a></td>
                        <td><button name ="checkOut"class="btn btn-success" value ="Check-out">Check Out</button></td>
                        <td><strong>Total: <?php echo $grand_total; ?>$</strong></td>
                       
                  

                        </form>
                    </tr>
                    </tbody>
                    
                  </table>
                  </form>
                  
</body>
</html>