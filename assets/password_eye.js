const eyes = document.querySelectorAll(".icon-eye-off");

eyes.forEach(item => {
    let isActive = false;
    item.addEventListener('click', ()=>{
        const input = item.previousElementSibling;
        //console.log(input);
        switch(isActive){
            case true:
                input.type = "password";
                item.classList.add("icon-eye-off");
                item.classList.remove("icon-eye");
                break;
            case false:
                input.type = "text";
                item.classList.add("icon-eye");
                item.classList.remove("icon-eye-off");
                //console.log("xljnjnkjnjdjnx ");
                break;
        }
        isActive = !isActive;
    });
});