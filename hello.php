<?php
session_start();

if(isset($_POST['username']))
{
	$_SESSION['Username']=$_POST['username'];
}
if(isset($_POST['age']))
{
	$_SESSION['Age']=$_POST['age'];
}
?>

<!DOCTYPE html>
<html>

<head>
<title> HELLO </title>
<link rel="stylesheet" href="stylesheet.css" >

	<link rel="stylesheet" href="stylesheet.css" > <!-- link to the stylesheet -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8"> <!--to recognise the pound icon-->

</head>




<body>

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
	 <br> <br>
<p> Hello <?php echo htmlspecialchars($_SESSION['Username']);?> </p>
   
   <?php if (htmlspecialchars($_POST["password"]=="password"))
	     
			  {
				  echo '<p>The password is not secure</p>';
			  }
		  
	

	?>
		



</body>

</html>