<?php
session_start();

?>


<!DOCTYPE html>
<html>



<!--HEAD-->


  <head>
  
  <title>Home</title>
	
	<link rel="stylesheet" href="stylesheet.css" > <!-- link to the stylesheet -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8"> <!--to recognise the pound icon-->


	 
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

        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <i class="fa fa-bars" style="font-size:28px; color:white;"></i>
        </a>
		
		
  <div id="welcomeMessage">
  Hello <?php 
  
  if(isset($_SESSION['Username'])){
  echo htmlspecialchars($_SESSION['Username']);
  }
  else
  {
	  echo "Guest";
  }
  ?>
  
     </header>
   
  
   

</div>

<!-- Display offers -->


<?php
	   

	$connection = mysqli_connect("localhost", "kchristoforou",
            "sNwnZnVNH5", "kchristoforou");

     if (mysqli_connect_errno())
     {
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
       }
      
	 
	 echo '<br>';
	 
	 
	 $myQuery = "SELECT * FROM tbl_offers";
	 
	 
	 $result = mysqli_query($connection, $myQuery);
	 


     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		
		
	echo "<div class='offer1'>";
	
	
	echo "<li style='color:brown; font-weight:bold; font-size:25px;'>".$row["offer_title"]. "</li>";
	echo "<li>".htmlspecialchars($row["offer_desc"]). "</li>";
	echo '<br>';
	echo "</div>";
	}
?>


<br>
  <!-- Introduction -->
     <div id="intro">
    <h1 style="color:#34516C"> Where opportunity creates <br>success</h1>
  
    <p style="color:#555555 " >
	Every student at the University of Central Lancashire is automatically a member of the Students Union. <br> 
    We're here to make life better for students-inspiring you to succeed and achieve your goals.<br> <br> 
    Everything you need to know about Uclans Students Union. Your membership starts here </p>



     <p style="color:orange; text-align:center; font-size:30px;"> <b>Together</b> </p>

      </div>

  <!--videos-->
     <div id="video">
     <div class="videoTop"><video controls>  

      <source src="video.mp4"> </video></div>

      <div class="videoBottom"> <iframe src="https://player.vimeo.com/video/1071072056?h=d4263dcc56"></iframe></div>
      </div> 


  <!-- Buttons -->
    <button  onclick="topFunction()" id="buttonTop">Back to the top</button>


     <!-- Footer -->

     
   <footer>
      <div class="contact"> <p>Contact us at: </p>
                          <p>  +44 (0)1772 201201 </p></div>
						  
      <div class="address">Find us at: 
                          <p>  Preston,Lancashire, UK PR1 2HE </p></div>
    </div>

   
	 </footer>

    <script src="javascript.js"> 


</script>

    </body>

</html>
