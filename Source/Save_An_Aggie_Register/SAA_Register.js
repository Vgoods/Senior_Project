const registerForm = document.getElementById("SAA_register-form");
const registerErrorMsg = document.getElementById("SAA_register-error-msg");

registerForm.addEventListener("submit", function(e) {
    e.preventDefault();

    const emailField = document.getElementById("email-field");
    const emailValue = emailField.value;

    if (!emailValue.includes('@aggies.ncat.edu')) {
        registerErrorMsg.innerText = "Invalid Aggie Email";
        registerErrorMsg.style.opacity = 1;
        return;
    }

    const formData = new FormData(registerForm);

    fetch("SAA_Register_Connect.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (response.ok) {
            window.location.replace("SAA_Login.html");
        } else {
            throw new Error("Network response was not ok");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        registerErrorMsg.innerText = "Error occurred while registering";
        registerErrorMsg.style.opacity = 1;
    });
});
