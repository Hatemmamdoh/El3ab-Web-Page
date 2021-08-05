function validateRegister()
{
   var un = document.forms["myForm"]["fullName"].value;
   var pasw = document.forms["myForm"]["password"].value;
   var cpsw = document.forms["myForm"]["cpassword"].value;
 
   
   var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
   var mail = document.forms["myForm"]["email"].value;

  if (un == "")
  {
	 alert("Name must be filled out");
	 
  }
  else if (pasw.length < 8 )
  {
	 alert("your Password length can't be less than 8 characters");
  }
 else if (pasw != cpsw)
  {
   	 alert("password doesn't match confirm password ");
  }
  else
  {
     document.forms["myForm"].submit() ;
  }
   
}
function validateInsertGame()
{
   var gn = document.forms["myForm"]["gameName"].value;
   var category = document.forms["myForm"]["category"].value;
   var quantity = document.forms["myForm"]["quantity"].value;
   var price = document.forms["myForm"]["price"].value;
   var image = document.forms["myForm"]["imagePath"].value ;

   if (gn == "")
   {
      alert("The game name must be filled out") ;
   }

   else if (category === "default")
   {
      alert("Please choose the category") ;
   }

   else if (quantity == "" || quantity == 0)
   {
      alert("Please enter the quantity of the game") ;
   }

   else if (price == "" || price == 0)
   {
      alert("Please enter the price of the game") ;

   }
    else if(image == ""){
        alert("Please Enter Image");
    }
    else {
        document.forms["myForm"].submit();
    }


}
function validateSearch(){
    
   var search = document.forms["searchForm"]["gameName"].value;
    if (search == ""){
        alert('Enter the game name');
    } else{
        document.forms["searchForm"].submit();
    }            
}

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
