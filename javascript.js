
//********************************************************INDEX-HOME PAGE*************************************************//
//*********************************************************LOG-IN*********************************************************//
 function myCheck()
	{
		let p = document.forms["form1"]["password"].value;
		
		if (p==="password")
		{
			alert("The password is not secure");
			return false;
		}
		return true;
	}
 //******************************************************** SIGN-UP******************************************************//
//*********************************************************PRODUCTS******************************************************//

//Filter
document.getElementById('stockFilter').onchange=function()//when there is a change-chose an option from the dropdown 
{
	document.getElementById('filterForm').submit(); // call submit function 
};

//Add to Cart
function addToCart(id)
{
	alert("Added to Cart");
   window.location.href="cart.php?id="+id;
  }
 
 //Empty Cart
  function emptyCart()
{
   window.location.href="cart.php?empty=true";
  }

//Delete Item
/*function deleteItem(id)
{
	alert("Item Deleted");
   window.location.href="cart.php?delete_id="+id;
 }  */
  
//View Details	  
	function viewDetails(id)
{
   window.location.href="item.php?id="+id;
   
}
//****************************************************CART**************************************************//

//****************************************************ITEM-VIEW DETAILS**************************************************//
//****************************************************ALL PAGES**********************************************************//
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

function topFunction(){
	document.documentElement.scrollTop=0; //vertical scroll position of the body=0 
}
	