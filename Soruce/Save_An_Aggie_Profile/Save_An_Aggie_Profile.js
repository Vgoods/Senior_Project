const registeredUsername = localStorage.getItem('registeredUsername');
const registeredEmail = localStorage.getItem('registeredEmail');
const registeredFirstname = localStorage.getItem('registeredFirstname');
const registeredLastname = localStorage.getItem('registeredLastname');

document.getElementById('profile-username').textContent = registeredUsername;
document.getElementById('profile-email').textContent = registeredEmail;
document.getElementById('profile-firstname').textContent = registeredFirstname;
document.getElementById('profile-lastname').textContent = registeredLastname;
