const bands_list_header = document.querySelector("#bands-list-header");
const bands_list = document.querySelector("#bands-list");
const arrow = document.querySelector("#arrow");
let isShown = true;
bands_list_header.addEventListener('click', ()=>{
    console.log(isShown);
    switch(isShown){
        case true:
            arrow.textContent = "+";
            bands_list.style.visibility = "hidden";
            console.log("+");
            break;
        case false:
            arrow.textContent = "-";
            bands_list.style.visibility = "visible";
            console.log("-");
            break;
    }
    isShown=!isShown;
});