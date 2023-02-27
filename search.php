<?php 
require_once 'connection.php';

?>


<!-- div class="row"> -->
  <!-- <div class="col-12"><h2 class="header"></h2></div> -->
<!-- </div> -->
<!-- <br>
<div class="row">
	<div class="" > -->
		<?php 
       if (isset($_POST['submit'])){
           
           $search=$_POST['search'];
        //    $results = mysqli_query($con, "SELECT * FROM plants WHERE search='$search';");
         $result = $con -> query("SELECT * FROM plants WHERE plantName='$search';"); 
            // echo "Returned rows are: " . $result -> num_rows;
            // Free result set
           
          
        $row=mysqli_fetch_array($result);
        $name=$row['plantName'];
        $price=$row['price'];
        // Return to search result page with the search result
        // header("Location: searchResult.php?name=$name&price=$price");

        // echo "<script> location='index.php?name={$name}&&price={$price}';</scrpit>";
        header ("Location:index.php?name={$name}&price={$price}");
        $result -> free_result(); 
     }
       
       ?>

	
	<?php ?>
<!-- </table>	 -->
<!-- </div> -->
<!-- </div> -->
    

    <!-- <section class="header">
        <div class="container"> -->
            
            <?php 
// $search=$_POST["search"];


//                 //Sql query to get plants  based on search keyword
//                 // $sql = "SELECT * FROM plants WHERE plantName LIKE '%$search%'";
//                 $results = mysqli_query($db, "SELECT * FROM plant");

//                 //execute the query
//                 // $res = mysqli_query($conn, $sql);

//                 //count rows
//                 $count = mysqli_num_rows($results);

                
//                 if($count>0)
//                 {
//                     //plant available
//                     while($row=mysqli_fetch_assoc($results))
//                     {
//                         //Get the Details
//                         $id = $row['id'];
//                         $title = $row['plantName'];
//                         $price=$row['price'];
                

                       
//                     }
//                 }
//                 else
//                 {
//                     //plant not available
//                     echo "<div class ='error'>plant Not Found</div>";
//                 }
            
//             ?>

    