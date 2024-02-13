const registerForm = document.getElementById("SAA_register-form");
const registerButton = document.getElementById("register-form-submit");
const registerErrorMsg = document.getElementById("SAA_register-error-msg");
const userfirstname = document.getElementById("firstname-field");
const userlastname = document.getElementById("lastname-field");
const useremail = document.getElementById("email-field");
const usernameinput = document.getElementById("register-username-field");
const passwordinput = document.getElementById("register-password-field")

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const usernameinputvalue = usernameinput.ariaValueText;
    const passwordinputvalue = passwordinput.ariaValueText;

    if (useremail.includes('@aggie.ncat.edu')) {
        true;
    }
    else {
        registerErrorMsg.style.opacity = 1;
    }
})
