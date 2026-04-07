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
	 
	 $myReviews = "SELECT * FROM tbl_reviews WHERE product_id=$id";
	 $review = mysqli_query($connection, $myReviews);
	
	$myResults = "SELECT * FROM tbl_products WHERE product_id=$id";
	 $result = mysqli_query($connection, $myResults);

	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
	
	echo "<div class='products'>";
	
	//echo "<div>".$row["product_id"]. "</div>";
	echo "<div>".$row["product_title"]. "</div>";
	echo "<div>£".$row["product_price"]. "</div>";
	echo "<div>".$row["product_stock"]. "</div>";
	echo "<div>".$row["product_desc"]. "</div>";
	echo "<div><img src='".$row["product_src"]."' style='width:150px; height:auto;'></div>";
	echo "<div><button id='cartButton' onclick='addToCart(" .$row["product_id"].")'>Add to Cart</button></div>";
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
	echo "<div>".$row1["review_desc"]. "</div>";
	echo "<div>".$row1["review_rating"]. "/5</div>";
	if ($row1["review_rating"]==1)
	{
		echo "<div>*</div>";
	}
	else if ($row1["review_rating"]==2)
	{
		echo "<div>**</div>";
	}
	else if ($row1["review_rating"]==3)
	{
		echo "<div>***</div>";
	}
	else if ($row1["review_rating"]==4)
	{
		echo "<div>****</div>";
	}
	else if ($row1["review_rating"]==5)
	{
		echo "<div>*****</div>";
	}
	echo "<div>".$row1["review_timestamp"]. "</div>";
    echo '<br>';
	echo "</div>";

	
	}
?>  
<br> <br>
		   
	<!--	   <form method="post" action="item.php" id="giveReview" name="giveReview">
		   <label> Leave a rating (/5) </label>
		    <input type="number" name="scoreByUser" min="1" max="5">
		    <input type="text" name="reviewTitle">
		    <input type="text" name="reviewByUser">
			<button type="submit" name="submitReview">Submit</button>

		   </form>
		   
		   
		  /*
		   
		   if (isset($_POST["giveReview"]))
		   {
			   $rating=$_POST["scoreByUser"];
			   $reviewTitle=$_POST["reviewTitle"];
			   $reviewDesc=$_POST["reviewByUser"];
			   
			   $userID=$_SESSION['userID'];
			   $productId=$_GET['id'];
		   
        $insert_sql = 'INSERT INTO tbl_reviews (review_id,user_id,product_id,review_title,review_desc,review_rating,review_timestamp) VALUES (?,?,?,?,?,?,?)';
        $insert_stmt = mysqli_prepare($conn, $insert_sql);
        mysqli_stmt_bind_param($insert_stmt, 'is', $rating,$reviewDesc);
		 mysqli_stmt_execute($insert_stmt);
		   }
		
?> */


	  <!-- Footer -->
	  
	   
   <footer>
      <div class="contact"> <p>Contact us at: </p>
                          <p>  +44 (0)1772 201201 </p></div>
						  
      <div class="address">Find us at: 
                          <p>  Preston,Lancashire, UK PR1 2HE </p></div>
   
	 </footer>

    <script>

		function addToCart(product_id)
{
   window.location.href="cart.php";
    
    alert('Added to cart!');
}

		function toggleMenu(){
 
	let menu=document.getElementsByClassName("fullScreen")[0]; //returns the first element -otherwise=undefinied
	if (menu.style.display === 'flex') 
	{
	  menu.style.display = "none";
	}
	else 
	{
	  menu.style.display = "flex"
	 }
}

	</script>

	
	</body>

</html>
