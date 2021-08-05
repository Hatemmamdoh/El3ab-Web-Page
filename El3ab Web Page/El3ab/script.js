function run(){
    var password = document.forms["main"]["password"].value;
    var cpassword = document.forms["main"]["cpassword"].value;
    var age = document.forms["main"]["age"].value;
    
    if ( password != cpassword ){
        window.alert( "password and confirm password not match" );
        returfalse;
    }
    if ( age.length == 0 ){
        window.alert( "age cannot be empty" );
        return false;
    }
    
    for ( var itr = 0; itr < age.length; itr++ ){
        if ( age[itr] < '0' || age[itr] > '9' ){
            window.alert( "Age should be numberic" );
            return false;
        }
    }
    document.forms["main"].submit();
}