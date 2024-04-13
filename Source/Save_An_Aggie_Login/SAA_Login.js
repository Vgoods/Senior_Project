const loginForm = document.getElementById("SAA_login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("SAA_login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();

    const formData = new FormData(loginForm);

    fetch("SAA_Login_Connect.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === "Login Successfully") {
            window.location.replace("SAA_Home.html"); 
        } else {
            loginErrorMsg.innerText = data.error || "An error occurred while logging in";
            loginErrorMsg.style.opacity = 1;
        }
    })
    .catch(error => {
        console.error("Error:", error);
        loginErrorMsg.innerText = "An error occurred while logging in";
        loginErrorMsg.style.opacity = 1;
    });
});
