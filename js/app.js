//Buttons
const loginButton = document.getElementById('loginButton');
const registrationButton = document.getElementById('registrationButton');

const popupCloseButtons = document.querySelectorAll('.popup__content__close');
//Popups
const loginPopup = document.getElementById('loginPopup');
const registrationPopup = document.getElementById('registrationPopup');

const inputImage = document.getElementById('inputImage');
const previewImage = document.getElementById('previewImage');

if(loginButton != null){
    loginButton.onclick = function(event){
        TogglePopup(loginPopup);
    }    
}

if(registrationButton != null){
    registrationButton.onclick = function(event){
        TogglePopup(registrationPopup);
    }
}

popupCloseButtons.forEach(element => {
    element.onclick = function(event){
        let popup = GetPopupOfCloseButton(element);
        TogglePopup(popup);
    }
});

inputImage.addEventListener('change', function(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function(event) {
    previewImage.src = event.target.result;
  };

  reader.readAsDataURL(file);
});


function TogglePopup(popup){
    if(popup.style.display == "block")
        popup.style.display = "none";
    else
        popup.style.display = "block";
}

function GetPopupOfCloseButton(closeButton){
    let currentElement = closeButton;
    while(!currentElement.classList.contains("popup")){
        currentElement = currentElement.parentNode;
    }
    return currentElement;
}