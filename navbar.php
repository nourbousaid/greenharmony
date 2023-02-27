<?php while($row = mysqli_fetch_array($result)) { ?>

<div class="box-container">
       
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