document.addEventListener('DOMContentLoaded', function() {
    const requestSubjectinputvalue = localStorage.getItem('requested-subject')
    const requestDescriptioninputvalue = localStorage.getItem('requested-description');
    const requestFirstNameinputvalue = localStorage.getItem('requested-first-name');
    const requestLastNameinputvalue = localStorage.getItem('requested-last-name');
    const requestPhoneinputvalue = localStorage.getItem('requested-phone');
    const requestEmailinputvalue = localStorage.getItem('requested-email');

    document.getElementById('task-subject').textContent = requestSubjectinputvalue;
    document.getElementById('task-description').textContent = requestDescriptioninputvalue;
    document.getElementById('task-firstname').textContent = requestFirstNameinputvalue;
    document.getElementById('task-lastname').textContent = requestLastNameinputvalue;
    document.getElementById('task-phone').textContent = requestPhoneinputvalue;
    document.getElementById('task-email').textContent = requestEmailinputvalue;

    // Redirect to another page when the button is clicked
    document.getElementById('accept-task').addEventListener('click', function() {
        localStorage.setItem('requested-subject', requestSubjectinputvalue);
        localStorage.setItem('requested-description', requestDescriptioninputvalue);
        localStorage.setItem('requested-first-name', requestFirstNameinputvalue);
        localStorage.setItem('requested-last-name', requestLastNameinputvalue);
        localStorage.setItem('requested-phone', requestPhoneinputvalue);
        localStorage.setItem('requested-email', requestEmailinputvalue);
        window.location.replace("Save_An_Aggie_Active.html");
    });
});
