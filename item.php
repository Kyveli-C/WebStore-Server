<?php
session_start();

?>


<!DOCTYPE html>

<html lang="en">



    <!--HEAD-->
    <head>

	    <title> Item </title>
	   
		<link rel="stylesheet" href="stylesheet.css"> 
		<meta charset="UTF-8"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  
	</head>

        <!--BODY-->
		
	<body>

		<!-- Header -->
		 
          <header>  
    
	       <div class="logo"> <img src="logo_reverse.png"  alt="logo">
	 
           <nav class="fullScreen" >
             <a href="index.php">Home</a>   
             <a href="logIn.php">Sign In</a>			 
             <a href="products.php">Products</a>   
             <a href="cart.php">Cart</a>
			 <a href="logout.php">Log Out</a>

           </nav>
       
	     </div>
       
	     </div>

        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <i class="fa fa-bars" style="font-size:28px; color:white;"></i>
        </a>
  
     </header>
   
		   	<!-- Content -->
		   
		   <h1> View details: </h1>
		   
	<?php	   
		 $connection = mysqli_connect("localhost", "kchristoforou",
            "sNwnZnVNH5", "kchristoforou");

     if (mysqli_connect_errno())
     {
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
       }
      
	 
	 echo '<br>';
	 
	
	 if(isset($_GET['id']))
	 {
		 $id=$_GET['id'];
	 }
	 else
	 {
		 $id=0;
	 }
	 
	 $myReviews = "SELECT * FROM tbl_reviews WHERE product_id=$id";
	 $review = mysqli_query($connection, $myReviews);
	
	$myResults = "SELECT * FROM tbl_products WHERE product_id=$id";
	 $result = mysqli_query($connection, $myResults);
	 
	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
	
	echo "<div class='products'>";
	
	//echo "<div>".$row["product_id"]. "</div>";
	echo "<div>".htmlspecialchars($row["product_title"]). "</div>";
	echo "<div>£".htmlspecialchars($row["product_price"]). "</div>";
	echo "<div>".htmlspecialchars($row["product_stock"]). "</div>";
	echo "<div>".htmlspecialchars($row["product_desc"]). "</div>";
	echo "<div><img src='".$row["product_src"]."' style='width:150px; height:auto;'></div>";
	 if (isset($_SESSION['user_id']))
			{
				echo "<div><button id='cartButton' onclick='addToCart(" .$row["product_id"].")'>Add to Cart</button></div>";
			}
			else
			{
				echo "You must be logged in to add this item to your cart";
				echo '<br>';
			echo '<a href="logIn.php">Sign In</a>';			 

			}
    echo '<br>';
	echo "</div>";
}
	echo "</div>";
	?>
	
	<p><b>See the reviews:</b></p>
	
	<?php
	//see reviews 
	while($row1 = mysqli_fetch_array($review, MYSQLI_ASSOC))
	{
	
	echo "<div class='reviews'>";

	echo "<div>".htmlspecialchars($row1["review_title"]). "</div>";
	echo "<div>".htmlspecialchars($row1["review_desc"]). "</div>";
	echo "<div>".htmlspecialchars($row1["review_rating"]). "/5</div>";
	//$finalScore+=($row1["review_rating"]);

	if ($row1["review_rating"]==1)
	{
		echo "<div>★✰✰✰✰</div>";
	}
	else if ($row1["review_rating"]==2)
	{
		echo "<div>★★✰✰✰</div>";
	}
	else if ($row1["review_rating"]==3)
	{
		echo "<div>★★★✰✰</div>";
	}
	else if ($row1["review_rating"]==4)
	{
		echo "<div>★★★★✰</div>";
	}
	else if ($row1["review_rating"]==5)
	{
		echo "<div>★★★★★</div>";
	}
	echo "<div>".$row1["review_timestamp"]. "</div>";
	
    echo '<br>';
	echo "</div>";
	}
	
	echo '<br>';
	 
	 	
?>  
 
<?php

$numberOfReviews = "SELECT AVG(review_rating) AS avgRating FROM tbl_reviews WHERE product_id=$id";
 $number = mysqli_query($connection, $numberOfReviews);
 
 if($rowAverage=mysqli_fetch_assoc($number))
 {
 $averageRating=round($rowAverage['avgRating']*2)/2; //in case it's not a whole number
	 echo "Score:".number_format($averageRating,1). "/5"; //1 decimal place
	
	if ($rowAverage["avgRating"]==1)
	{
		echo "div>★</div>";
	}
	else if ($rowAverage["avgRating"]==1.5)
	{
		echo "<div>★⯪</div>";
	}
	else if ($rowAverage["avgRating"]==2)
	{
		echo "<div>★★</div>";
	}
	else if ($rowAverage["avgRating"]==2.5)
	{
		echo "<div>★★⯪</div>";
	}
	else if ($rowAverage["avgRating"]==3)
	{
		echo "<div>★★★</div>";
	}
	else if ($rowAverage["avgRating"]==3.5)
	{
		echo "<div>★★★⯪</div>";
	}
	else if ($rowAverage["avgRating"]==4)
	{
		echo "<div>★★★★</div>";
	}
	else if ($rowAverage["avgRating"]==4.5)
	{
		echo "<div>★★★★⯪</div>";
	}
	else if ($rowAverage["avgRating"]==5)
	{
		echo "<div>★★★★★</div>";
	}
 }
 else
 {
	 echo "No reviews yet";
 }


?>
<br> <br> 
              
    <?php
	
	echo "Rate the product:";
		    if (isset($_SESSION['user_id']))
			{
		  echo '<form method="post" action=""+product_id id="giveReview" name="giveReview">
		   <br>
		    <input type="number" name="scoreByUser" min="1" max="5" placeholder="(/5)">
		 <br> <br>  <input type="text" name="reviewTitle" placeholder="Review Title">
		  <br> <br>  <input type="text" name="reviewByUser" placeholder="Describe the product">
		  <br> <br>  <input type="hidden" name="productId" value="'. $id.'">
			<br> <button type="submit" name="submitReview">Submit Review</button>

		   </form>';
			}
		   else
		   {
			  echo '<br>';
			  echo "Please Log in to Review";
			  echo '<br>';
			  echo '<a href="logIn.php">Sign In</a>';			 

		   }
		   
		 
		   if (isset($_POST["submitReview"]))
		   {
				   if(!isset($_SESSION['user_id']))
				   {
					   echo "You must be logged in to leave a review";
					   $userID=0;
				   }
				  else
			       {
			     $userID=$_SESSION['user_id'];
		           }
			  
			  
			   $rating=(int)$_POST["scoreByUser"];
			   $reviewTitle=$_POST["reviewTitle"];
			   $reviewDesc=$_POST["reviewByUser"];
			   
			   $userID=$_SESSION['user_id'];
			   $productId=$_POST['productId'];
		   
		  
		   
        $insert_sql = 'INSERT INTO tbl_reviews (user_id,product_id,review_title,review_desc,review_rating,review_timestamp) VALUES (?,?,?,?,?,NOW())';
        $insert_stmt = mysqli_prepare($connection, $insert_sql);
        mysqli_stmt_bind_param($insert_stmt, 'iissi', $userID,$productId,$reviewTitle,$reviewDesc,$rating);
		mysqli_stmt_execute($insert_stmt);
		}
		echo '<br>';
		
		
?>


	  <!-- Footer -->
	  
	   
   <footer>
      <div class="contact"> <p>Contact us at: </p>
                          <p>  +44 (0)1772 201201 </p></div>
						  
      <div class="address">Find us at: 
                          <p>  Preston,Lancashire, UK PR1 2HE </p></div>
   
	 </footer>

    <script src="javascript.js">


	</script>

	
	</body>

</html>
