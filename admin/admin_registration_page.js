
const firstname = document.getElementById("firstname");
const middlename = document.getElementById("middlename");
const lastname = document.getElementById("lastname");
const username = document.getElementById("username");
const course = document.getElementById("course");
const phone = document.getElementById("phone");
const male = document.getElementById("male");
const female = document.getElementById("female");
const others = document.getElementById("others");
const psw = document.getElementById("psw");
const pswRepeat = document.getElementById("psw_repeat");
const stdRegistration = document.getElementById("std-reg");
const email = document.getElementById('email');
const registerBtn = document.getElementById("registerbtn");

console.log(firstname, lastname, middlename, email, course, stdRegistration, registerBtn)


stdRegistration.addEventListener('submit', (e)=>{
    e.preventDefault();
    
    if(!validator.isEmail(email.value)){
        alert("Invalid Email. Please check the email address");
        stdRegistration.reset(); 
        return false
    } else {
        alert ("Correct values!")
    }

});

registerBtn.addEventListener('submit', (e)=>{
    e.preventDefault();
    
    if(!validator.isEmail(email.value)){
        alert("Invalid Email. Please check the email address");
        stdRegistration.reset();
        return false
    } else {
        alert ("Correct values!")
    }

});

// Clears the form on hitting the refresh browser button 
stdRegistration.reset(); 