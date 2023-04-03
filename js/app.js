//Buttons
const loginButton = document.getElementById('loginButton');
const registrationButton = document.getElementById('registrationButton');

const popupCloseButtons = document.querySelectorAll('.popup__content__close');
//Popups
const loginPopup = document.getElementById('loginPopup');

loginButton.onclick = function(event){
    TogglePopup(loginPopup);
}
popupCloseButtons.forEach(element => {
    element.onclick = function(event){
        TogglePopup(loginPopup);
    }
});

function TogglePopup(popup){
    if(popup.style.display == "block")
        popup.style.display = "none";
    else
        popup.style.display = "block";
}