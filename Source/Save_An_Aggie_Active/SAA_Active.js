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
});
