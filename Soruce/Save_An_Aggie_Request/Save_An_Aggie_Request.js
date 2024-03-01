const requestType = document.getElementById("request-type");
const requestSubject = document.getElementById("request-subject");
const requestDescription = document.getElementById("request-description");
const requestFirstName = document.getElementById("request-first-name");
const requestLastName = document.getElementById("request-last-name");
const requestPhone = document.getElementById("request-phone");
const requestEmail = document.getElementById("request-email");
const submitRequestButton = document.getElementById("submit-request-button");
const requestErrorMsg = document.getElementById("request-error-msg");

submitRequestButton.addEventListener("click", (e) => {

    const requestSubjectinputvalue = requestSubject.value;
    const requestDescriptioninputvalue = requestDescription.value;
    const requestFirstNameinputvalue = requestFirstName.value;
    const requestLastNameinputvalue = requestLastName.value;
    const requestPhoneinputvalue = requestPhone.value;
    const requestEmailinputvalue = requestEmail.value;

    if(requestEmailinputvalue.includes('@aggies.ncat.edu')){
        e.preventDefault();
       
        localStorage.setItem('requested-subject', requestSubjectinputvalue);
        localStorage.setItem('requested-description', requestDescriptioninputvalue);
        localStorage.setItem('requested-first-name', requestFirstNameinputvalue);
        localStorage.setItem('requested-last-name', requestLastNameinputvalue);
        localStorage.setItem('requested-phone', requestPhoneinputvalue);
        localStorage.setItem('requested-email', requestEmailinputvalue);
        
        alert("Your Request Has been submitted");
        window.location.reload("Save_An_Aggie_Request.html");
    }
    else{
        alert("Unable to submit your request. Please check you entry again");
    }
})
