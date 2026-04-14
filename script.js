function checkRegistrationForm() {
    var name=document.getElementById("name").value.trim();
    var address=document.getElementById("address").value.trim();
    var phone=document.getElementById("phone").value.trim();
    var email=document.getElementById("email").value.trim();
    var username=document.getElementById("username").value.trim();
    var password=document.getElementById("password").value.trim();

    var namePattern=/^[a-zA-Z ]+$/; 
    var addressPattern=/^[a-zA-Z0-9 ]+$/;
    var phonePattern=/^1[0-9]{10}$/; 
    var emailPattern = /^[0-9a-zA-Z]+@[0-9a-zA-Z]+\.[0-9a-zA-Z]+\.(cn|com)$/i;
    var usernamePattern=/^[a-zA-Z0-9]{6,}$/;
    var passwordPattern=/^[a-zA-Z0-9]{6,}$/;
    //name
    if(name===""){
        alert("Name can not be empty.");
        return false;
    }
    if(!namePattern.test(name)){
        alert("Name must only contain letters and spaces.");
        return false;
    }
    //address
    if(address===""){
        alert("Address can not be empty.");
        return false;
    }
    if(!addressPattern.test(address)){
        alert("Address must only contain letters, numbers and spaces.");
        return false;
    }
    //phone
    if(phone===""){
        alert("Phone number can not be empty.");
        return false;
    }
    if(!phonePattern.test(phone)){
        alert("Please enter a valid Chinese phone number.");
        return false;
    }
    //email
    if(email===""){
        alert("Email can not be empty.");
        return false;
    }
    if(!emailPattern.test(email)){
        alert("Please enter a valid email address.");
        return false;
    }
    //username
    if(username===""){
        alert("Username can not be empty.");
        return false;
    }
    if(!usernamePattern.test(username)){
        alert("Username must be at least 6 characters and contain only letters and numbers.");
        return false;
    }
    //password
    if(password===""){
        alert("Password can not be empty.");
        return false;
    }
    if(!passwordPattern.test(password)){
        alert("Password must be at least 6 characters and contain only letters and numbers.");
        return false;
    }
    return true;

}