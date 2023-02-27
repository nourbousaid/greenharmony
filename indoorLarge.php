
<?php include('connection.php');

session_start();

if(isset($_POST['addToCart'])){

    $email = $_SESSION['email'];
    $plantID = $_POST['plantID'];
    $plantName = $_POST['plantName'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $sql="INSERT INTO cart (plantID, email, plantName, size, qty, price) VALUES('$plantID', '$email', '$plantName', '$size', '$qty', '$price')";
    $results=mysqli_query($con,$sql);
    ?>
    <script>
        alert("Product Added to Cart...");
    </script>
    <?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Small</title>

    <link rel="stylesheet" href=https://swiperjs.com/demos#pagination />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>

<body>



    <!-- header section starts  -->

    <header>

        <div class="header-1">

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

        <div class="header-2">
            
            <a href="#" class="logo"> <i class="fas fa-seedling"></i> <img src="images/IMG_2619.jpg"
                    width="250px" height="150px"> </a>
            <form action="" class="search-bar-container">
                <input type="search" id="search-bar" placeholder="search here...">
                <label for="search-bar" class="fas fa-search"></label>
            </form>

        </div>

        <div class="header-3">

            <style>
                .navbar {
                    overflow: hidden;
                    background-color: white;
                }

                .navbar a {
                    float: left;
                    font-size: 16px;
                    color: #444;
                    text-align: center;
                    padding: 14px 16px;
                    text-decoration: none;
                }

                .dropdown {
                    float: left;
                    overflow: hidden;
                }

                .dropdown .dropbtn {
                    font-size: 16px;
                    border: none;
                    outline: none;
                    color: #444;
                    padding: 14px 16px;
                    background-color: inherit;
                    font-family: inherit;
                    margin: 0;
                }

                .navbar a:hover,
                .dropdown:hover .dropbtn {
                    background-color: teal;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                }

                .dropdown-content a {
                    float: none;
                    color: green;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                    text-align: left;
                }

                .dropdown-content a:hover {
                    background-color: #ddd;
                }

                .dropdown:hover .dropdown-content{
                    display: block;
                }
            </style>
            </head>

            <body>

                <div class="navbar">
                    <a href="userPage.php">Home</a>

                    <div class="dropdown">
                        <button class="dropbtn">Indoor Plants
                        
                        </button>
                        <div class="dropdown-content">
                          <a href="indoorSmall.php">Small</a>
                          <a href="indoorMedium.php">Medium</a>
                          <a href="indoorLarge.php">Large</a>
                          <a href="indoorSmall.php">Small</a>
                          <a href="indoorMedium.php">Medium</a>
                          <a href="indoorLarge.php">Large</a>
                        </div>
                      </div> 
                      
                      <div class="dropdown">
                        <button class="dropbtn">Outdoor Plants
                        
                        </button>
                        <div class="dropdown-content">
                          <a href="outdoorSmall.php">Small</a>
                          <a href="outdoorMedium.php">Medium</a>
                          <a href="outdoorLarge.php">Large</a>
                        </div>
                      </div>

                    <a href="#Landscape">Landscape

                    <a href="#ourcompany">Our Company
                    </div>

                <div class="icons">
                    <a href="cart.php" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="logout.php">Logout</a>
                </div>

        
        

    </header>



    <section class="Outdoorplants" id="Outdoorplants">

        <h1 class="heading"> Indoor Plants </h1>

        <div class="box-container">
        
            <?php
        $result = mysqli_query($con,"SELECT * FROM plants WHERE category = 'indoor' && size = 'large'");
        while($row = mysqli_fetch_array($result)) {
        ?>
        <div class="box">
            <form action="" method="post">
                <span class="discount"><?php echo $row['discount'] ?>%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="<?php echo"images/".$row['image'] ?>" alt="">
                <h3><?php echo $row['plantName'] ?></h3>
                <h3><?php echo $row['size'] ?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="quantity">
                    <span> quantity : </span>
                    <input name="qty" type="number" min="1" max="100" value="1">
                </div>
                <div class="price"><?php echo $row['price'] ?>$</div>
                <input name="plantID" type="hidden" value="<?php echo $row['id'] ?>">
                <input name="plantName" type="hidden" value="<?php echo $row['plantName'] ?>">
                <input name="size" type="hidden" value="<?php echo $row['size'] ?>">
                <input name="price" type="hidden" value="<?php echo $row['price'] ?>">
                <button name="addToCart" class="btn">add to cart</button>
                </form>
        </div>
        <?php } ?>
        
        </div>

    </section>




    <section class="icons-container">

        <div class="icon">
            <img src="images/icon1.png" alt="">
            <div class="content">
                <h3>free shipping</h3>
                <p>Free shipping on order</p>
            </div>
        </div>
        <div class="icon">
            <img src="images/icon2.png" alt="">
            <div class="content">
                <h3>100% Money Back</h3>
                <p>You’ve 30 days to Return</p>
            </div>
        </div>
        <div class="icon">
            <img src="images/icon3.png" alt="">
            <div class="content">
                <h3>Payment Secure</h3>
                <p>100% secure payment</p>
            </div>
        </div>
        <div class="icon">
            <img src="images/icon4.png" alt="">
            <div class="content">
                <h3>Support 24/7</h3>
                <p>Contact us anytime</p>
            </div>
        </div>

    </section>


    <!-- .icons section ends -->

    <!-- deal section starts  -->

    

    </section>

    <!-- deal section ends -->

   

    </section>

    <!-- contact section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
            <h3>for more information</h3>
                <p>Greenharmony22@gmail.com</p>
            </div>
            <div class="box">
                <h3>branch locations</h3>
                <a href="#">Lebanon</a>
                
            </div>
           
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                
            </div>

        </div>

        <h1 class="credit"> created by Nour Bou Said<span> </span> | all rights reserved! </h1>

    </section>
    <!-- footer section ends -->

    <!-- scroll top button  -->
    <a href="#home" class="scroll-top fas fa-angle-up"></a>







    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



    <!-- custom js file link  -->
    <script src="script.js"></script>

</body>

</html>