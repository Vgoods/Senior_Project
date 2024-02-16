const registerForm = document.getElementById("SAA_register-form");
const registerButton = document.getElementById("register-form-submit");
const registerErrorMsg = document.getElementById("SAA_register-error-msg");
const userfirstname = document.getElementById("firstname-field");
const userlastname = document.getElementById("lastname-field");
const useremail = document.getElementById("email-field");
const usernameinput = document.getElementById("register-username-field");
const passwordinput = document.getElementById("register-password-field");


registerButton.addEventListener("click", (e) => {
    e.preventDefault();
    const usernameinputvalue = usernameinput.value;
    const passwordinputvalue = passwordinput.value;
    const useremailvalue = useremail.value;

    if (useremailvalue.includes('@aggies.ncat.edu')) {
        // Save username and password to localStorage
        localStorage.setItem('registeredUsername', usernameinputvalue);
        localStorage.setItem('registeredPassword', passwordinputvalue);
        window.location.replace("Save_An_Aggie_Login.html");
    }
    else {
        registerErrorMsg.style.opacity = 1;
    }
})
