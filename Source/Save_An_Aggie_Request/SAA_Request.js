document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("maintenance-form");
    var emailInput = document.getElementById("request-email");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); 

        var emailValue = emailInput.value.trim();
        var emailPattern = /@aggies\.ncat\.edu$/; 

        if (!emailPattern.test(emailValue)) {
            alert("Please enter a valid Aggie email address (ending with @aggies.ncat.edu).");
            return;
        }

        var formData = new FormData(form); 
        var xhr = new XMLHttpRequest();
        xhr.open("POST", form.action, true); 
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Your request has been submitted.");
                window.location.reload();
            } else {
                alert("Error occurred while submitting the request.");
            }
        };
        xhr.send(formData); 
    });
});
