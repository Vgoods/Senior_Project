const loginForm = document.getElementById("SAA_login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("SAA_login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    const registeredUsername = localStorage.getItem('registeredUsername');
    const registeredPassword = localStorage.getItem('registeredPassword');

    if (username === registeredUsername && password === registeredPassword) {
        window.location.replace("Save_An_Aggie_Start.html");
    } 
    else {
        loginErrorMsg.style.opacity = 1;
    }
})
