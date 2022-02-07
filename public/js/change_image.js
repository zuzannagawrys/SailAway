const changeImageButton = document.querySelector('.change-image');
const image = document.querySelector('input[name="image-input"]');
const imageContainer = document.querySelector("img");

changeImageButton.addEventListener("click", function (event) {
    changeImageButton.innerText='';
    changeImageButton.appendChild(document.querySelector("#input-button-template").content.cloneNode(true))
    });






