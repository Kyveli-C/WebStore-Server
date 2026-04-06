<?php
session_start();

?>


<!DOCTYPE html>


<html lang="en">


	   <!--HEAD-->

    <head>

       <title> Cart </title>
	   
		<link rel="stylesheet" href="stylesheet.css"> 
		<meta charset="UTF-8"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  
	</head>


        <!--BODY-->

      <body style="background-color:#f4f0ec;">


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

        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <i class="fa fa-bars" style="font-size:28px; color:white;"></i>
        </a>
  
     </header>
   
   
      <!-- Content -->

	  <h2 style="text-align:center;">Your Shopping Cart</h2>
	 
	 
	  <div id="cart"></div>
	  <div id="cartItems"></div>
	  

	 <button  onclick="topFunction()" id="buttonTop">Back to the top</button>
	 <button  onclick="emptyCart()" id="emptyCart">Empty Cart</button>


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