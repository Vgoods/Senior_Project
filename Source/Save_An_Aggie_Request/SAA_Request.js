document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("maintenance-form");
    var emailInput = document.getElementById("request-email");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission

        var emailValue = emailInput.value.trim();
        var emailPattern = /@aggies\.ncat\.edu$/; // Regex pattern for email validation

        if (!emailPattern.test(emailValue)) {
            alert("Please enter a valid Aggie email address (ending with @aggies.ncat.edu).");
            return;
        }

        // If email is valid, submit the form
        var formData = new FormData(form); // Create a FormData object with form data
        var xhr = new XMLHttpRequest();
        xhr.open("POST", form.action, true); // Open a POST request to form action asynchronously
        xhr.onload = function () {
            if (xhr.status === 200) {
                // If request was successful, display alert and reload page
                alert("Your request has been submitted.");
                window.location.reload();
            } else {
                // If there was an error, display an error message
                alert("Error occurred while submitting the request.");
            }
        };
        xhr.send(formData); // Send form data asynchronously
    });
});
