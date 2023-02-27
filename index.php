<?php include('connection.php'); ?>

<?php

if(isset($_POST['addToCart'])){
    header("Location: login.php");
}



?>

<?php

if(isset($_POST['btnIndoor'])){
    header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Harmony</title>

    <link rel="stylesheet" href=https://swiperjs.com/demos#pagination />

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
            <?php 
            $search = ""
            ?>
            <a href="#" class="logo"> <i class="fas fa-seedling"></i> <img src="images/IMG_2619.jpg" width="250px"
                    height="150px"> </a>

            <!-- Search form -->
            <form action="index.php" class="search-bar-container" method="POST">

                <input type="search" id="search-bar" name="search" placeholder="search here..."
                    value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

                <button type="submit" name="submit" id="submit" class="fas fa-search fa-3x text-white"
                    style="background:transparent;color:white;cursor:pointer">
            </form>


            <?php if (isset ($_GET['plantName'])& isset($_GET['price'])){?>
            <table id="plants">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php   ?>
                <tr>
                    <td><?php echo $_GET['plantName']; ?></td>
                    <td><?php echo $_GET['price']; ?></td>
                </tr>
                <?php
                }
            ?>
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

                .dropdown:hover .dropdown-content {
                    display: block;
                }
            </style>
            </head>

            <body>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                        <div class="dropdown">
                            <form action="" method="post">
                                <button  class="dropbtn">Indoor Plants

                                </button>
                            </form>
                            <div class="dropdown-content">
                                <a href="#">Small</a>
                                <a href="#">Medium</a>
                                <a href="#">Large</a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <form action="" method="post">
                                <button name="btnIndoor" class="dropbtn">Outdoor Plants

                                </button>
                            </form>
                            <div class="dropdown-content">
                                <a href="#">Small</a>
                                <a href="#">Medium</a>
                                <a href="#">Large</a>
                            </div>
                        </div>

                        <a href="#Landscape">Landscape</a>

                        <a href="#ourcompany">Our Company</a>
            </nav>

                <div class="icons">
                    <a href="login.php" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="login.php" class="fas fa-user-circle"></a>
                </div>




    </header>

    <!-- header section ends -->

    <!-- home section starts  -->
    <section class="home" id="home">

    </section>
    <!-- home section ends -->

    <!-- banner section starts  -->

    <!-- category section ends -->

    <!-- product section starts  -->
    <section class="slider-container" id="slider-container">
        <div class="slick-slider" id="slick-slider">
            <?php
            $result = mysqli_query($con,"SELECT * FROM slider");
            while($row = mysqli_fetch_array($result)) {
            ?>
            <div class="single-slider"><img src="<?php echo"images/".$row['pictures'] ?>"
                    style="width: 800px; height: 400px; margin:0 auto;"></div>
            <?php } ?>
        </div>
    </section>

    <?php if (isset($_POST['submit']) && $_POST['search'] != null){ ?>
    <section class="Outdoorplants" id="Outdoorplants">
        <h1 class="heading"> Search Result </h1>
        <div class="box-container">
            <?php 
            $search = $_POST['search'];
            $result = mysqli_query($con,"SELECT * FROM plants 
            Where PlantName LIKE '%$search%' OR Price = '$search'");

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
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="quantity">
                        <span> quantity : </span>
                        <input type="number" min="1" max="100" value="1">
                    </div>
                    <div class="price"><?php echo $row['price'] ?>$</div>
                    <button name="addToCart" href="#" class="btn">add to cart</button>
                </form>
            </div>
            <?php } ?>

    </section>
    <?php } ?>


    <section class="Outdoorplants" id="Outdoorplants">
        <h1 class="heading"> Indoor Plants </h1>
        <div class="box-container">
            <?php
            $result = mysqli_query($con,"SELECT * FROM plants WHERE category = 'indoor' ORDER BY rand() LIMIT 6");
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
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="quantity">
                        <span> quantity : </span>
                        <input type="number" min="1" max="100" value="1">
                    </div>
                    <div class="price"><?php echo $row['price'] ?>$</div>
                    <button name="addToCart" href="#" class="btn">add to cart</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="Outdoorplants" id="Outdoorplants">
        <h1 class="heading">Outdoor Plants </h1>
        <div class="box-container">
            <?php
            $result = mysqli_query($con,"SELECT * FROM plants WHERE category = 'outdoor' ORDER BY rand() LIMIT 6");
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
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="quantity">
                        <span> quantity : </span>
                        <input type="number" min="1" max="100" value="1">
                    </div>
                    <div class="price"><?php echo $row['price'] ?>$</div>
                    <button name="addToCart" href="#" class="btn">add to cart</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="Landscape" id="Landscape">
        <h1 class="heading">Landscape Projects</h1>
        <div class="box-container">
            <?php
            $result = mysqli_query($con,"SELECT * FROM pictures WHERE category = 'landscape'");
            while($row = mysqli_fetch_array($result)) {
            ?>
            <div class="box">
                <img src="<?php echo"images/".$row['image'] ?>" alt="">
                <h3><?php echo $row['projectName'] ?></h3>
                <div class="price"><?php echo $row['description'] ?></div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- product section ends -->

    <!-- .icons section starts  -->
    <section class="Company" id="ourcompany">
        <h1 class="heading"> Our Company </h1>
        <div class="box-container">
            <?php
            $result = mysqli_query($con,"SELECT * FROM pictures WHERE category = 'ourcompany'");
            while($row = mysqli_fetch_array($result)) {
            ?>
            <div class="box">
                <img src="<?php echo"images/".$row['image'] ?>" alt="">
                <h3><?php echo $row['projectName'] ?></h3>
                <div class="price"><?php echo $row['description'] ?></div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- product section ends -->

    <!-- .icons section starts  -->
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
    <script src="script.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
    swal("Hello world!"); </script>
</body>
</html>