const showPassword = document.getElementById('show_password');

const inputPassword = document.getElementById('password');

showPassword.textContent = "Show Password"


showPassword.addEventListener('click', ()=>{
    if(showPassword.textContent === "Show Password"){
        showPassword.textContent = "Hide Password";
        showPassword.style.backgroundColor = "red";
    } else {
        showPassword.textContent = "Show Password";
        showPassword.style.backgroundColor = "rgb(148, 247, 148)"
    }
    // Logic to show or hide password on the page.
    if (inputPassword.type === "password") {
        inputPassword.type = "text"
    } else {
        inputPassword.type = "password"
    }

});