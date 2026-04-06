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
             <a href="index.html">Home</a>    
             <a href="products.html">Products</a>   
             <a href="cart.html">Cart</a>
           </nav>
       
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
	 
	 
	 $myQuery = "SELECT * FROM tbl_reviews";
	 
	 
	 $result = mysqli_query($connection, $myQuery);
	 

	echo "<div class='review'>";

     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		
	echo "<div class='review'>";
	
	echo "<div>".$row["review_title"]. "</div>";
	echo "<div>".$row["review_desc"]. "</div>";
	echo '<br>';
	echo "</div>";
	}
	echo "</div>";
?>  
		   
		   
		   
		   
		 <div id="selectedProduct"> </div>
        <div id="details"> </div>

	  <!-- Footer -->
	  
	   
   <footer>
      <div class="contact"> <p>Contact us at: </p>
                          <p>  +44 (0)1772 201201 </p></div>
						  
      <div class="address">Find us at: 
                          <p>  Preston,Lancashire, UK PR1 2HE </p></div>
   
	 </footer>

    <script src="javascript.js"></script>

	
	</body>

</html>