var lastScrollTop = 0;
var header = document.querySelector("header");

window.addEventListener("scroll", function() {
    var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Scroll down
        header.style.top = "-100px"; // Adjust this value as needed
    } else {
        // Scroll up
        header.style.top = "0";
    }
    lastScrollTop = currentScroll;
});

document.querySelectorAll('.accept-task-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // AJAX request to submit the form data asynchronously
        var formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Optionally, you can provide some visual feedback to the user
                // For example, hide the task item upon successful acceptance
                form.closest('.task-item').style.display = 'none';
            } else {
                console.error('Failed to process the task');
            }
        })
        .catch(error => {
            console.error('Error processing the task:', error);
        });
    });
});
