function checkRegistrationForm() {
    var name=document.getElementById("name").value.trim();
    var address=document.getElementById("address").value.trim();
    var phone=document.getElementById("phone").value.trim();
    var email=document.getElementById("email").value.trim();
    var username=document.getElementById("username").value.trim();
    var password=document.getElementById("password").value.trim();

    if(name==="" || address==="" || phone==="" || email==="" || username==="" || password===""){
        alert("Please fill in all the fields.");
        return false;
    }
    return true;

}