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
        let popup = GetParent(element, "popup");
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

function GetParent(element, parentClass){
    let currentElement = element;
    while(!currentElement.classList.contains(parentClass)){
        currentElement = currentElement.parentNode;
    }
    return currentElement;
}
function search(event) {
    var searchInput = document.getElementById('searchInput').value;
    var allTitles = document.getElementsByClassName('article__block__title__inner');
    var blocksArray = [...allTitles];
    if (event.keyCode === 13) {

        blocksArray.forEach(element => {
            var parent = GetParent(element, "article__block");
            let title = element.innerText;
            if(title == (searchInput)){
                parent.style.display = "block";
            }
            else{
                parent.style.display = "none";
            }
        });
    }
    else
    {
        if(searchInput == ""){
            blocksArray.forEach(element => {
                parent = GetParent(element, "article__block");
                parent.style.display = "block";
            });
        }    
    }    
}
