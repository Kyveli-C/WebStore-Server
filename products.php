<?php
session_start();

?>


<!DOCTYPE html>

<html lang="en">


    <head>

       <title> Products </title>
	   
		<link rel="stylesheet" href="stylesheet.css"> 
		<meta charset="UTF-8"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
	 <!--https://www.w3schools.com/tags/tag_meta.asp-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  
	</head>


		 <!--BODY-->

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

 <!--https://www.w3schools.com/howto/howto_js_topnav_responsive.asp-->
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <i class="fa fa-bars" style="font-size:28px; color:white;"></i>
        </a>
  
     </header>
   

			<!-- Content -->
  
     <h1 class="titleProducts"> Online Shop </h1>
      <br>
	  
	  
	  <form id="filterForm" method="post" action="products.php">
	  <select id="stockFilter" name="stockFilter" >
		  <option value="Show Stock">Stock</option>
		  <option value="out-of-stock">Out of Stock </option>
		  <option value="limited-stock">Limited Stock </option>
		  <option value="available">Available </option>
		  <option value="all">ALL </option>

	   </select>
       
     </form>
	 <br><br>
	 
	  
	  <?php
	  
	  
	$connection = mysqli_connect("localhost", "kchristoforou",
            "sNwnZnVNH5", "kchristoforou");
	
	if (mysqli_connect_errno())
     {
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
	 }
	
       
      
 if (isset($_POST['stockFilter']))
	 {
	 $filter=$_POST['stockFilter'];
	 }
	 else
	 {
	  $filter="all";
	 }

 
	 if($filter==="all")
	 {
	 $myQuery = "SELECT * FROM tbl_products";
	 }
	 else if($filter==="limited-stock")
	 {
	$myQuery = "SELECT * FROM tbl_products WHERE product_desc LIKE '%Limited stock%' ";	 
	 }
	 else if($filter==="available")
	 {
	$myQuery = "SELECT * FROM tbl_products WHERE product_desc LIKE '%Perfect%' ";	 
	 }
	  else if($filter==="out-of-stock")
	 {
	$myQuery = "SELECT * FROM tbl_products WHERE product_desc LIKE '%Unfortunately%' ";	 
	 }	 
	 else if($filter==="all")
	 {
	 $myQuery = "SELECT * FROM tbl_products";
	 }
	 
	 	$result = mysqli_query($connection, $myQuery);

	 ?>
	 
	 
	 <div class='products-container'>
	 
	 <?php

     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		
	echo "<div class='products'>";
	echo "<div>".htmlspecialchars($row["product_title"]). "</div>";
	echo "<div>£".htmlspecialchars($row["product_price"]). "</div>";
	echo "<div>".htmlspecialchars($row["product_stock"]). "</div>";
	echo "<div>".htmlspecialchars($row["product_desc"]). "</div>";
	echo "<div><img src='".$row["product_src"]."' style='width:150px; height:auto;'></div>";
	echo "<div><button id='detailsButton' onclick='viewDetails(" .$row ["product_id"].")'>View Details</button></div>";
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
?>
</div>
	   




	<!-- Buttons -->
	<button  onclick="topFunction()" id="buttonTop">Back to the top</button>
	   

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
