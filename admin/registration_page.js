const showPassword = document.getElementById('show_password');
const inputPassword = document.getElementById('password');

showPassword.addEventListener('click', ()=>{
    // Logic to show or hide password on the page.
    if (inputPassword.type === "password") {
        inputPassword.type = "text"
    } else {
        inputPassword.type = "password"
    }

    if(showPassword.textContent === "Show Password") {
        showPassword.textContent = "Hide Password"
        showPassword.style.backgroundColor = "red"
    } else {
        showPassword.textContent = "Show Password";
        showPassword.style.backgroundColor = "rgb(80, 247, 80)" 
    }
});

