var lastScrollTop = 0;
var header = document.querySelector("header");

window.addEventListener("scroll", function() {
    var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        header.style.top = "-100px";
    } else {
        header.style.top = "0";
    }
    lastScrollTop = currentScroll;
});

document.querySelectorAll('.accept-task-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
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
