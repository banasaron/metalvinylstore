let album_covers = document.querySelectorAll(".album-image");
for (let index = 0; index < album_covers.length; index++) {
    album_covers[index].onerror = function() {
        album_covers[index].src = "assets/img/comming_soon.png";
    }
}
let album_covers_cart = document.querySelectorAll(".album-image-cart");
for (let index = 0; index < album_covers_cart.length; index++) {
    album_covers_cart[index].onerror = function() {
        album_covers_cart[index].src = "assets/img/comming_soon.png";
    }
}
const parralaxes = document.querySelectorAll('.parralax');
addEventListener('scroll' , function() {
    let scrollOffset = window.scrollY;
    parralaxes.forEach(function(parralax) {
    parralax.style.backgroundPositionY = (scrollOffset - parralax.offsetTop) * 0.5  + "px"/*szybkosc przewijania*/ 
    })
    
});

const minus_btn = document.querySelector("#minus_btn");
const plus_btn = document.querySelector("#plus_btn");
let ilosc_btn = document.querySelector("#ilosc_btn");
console.log(ilosc_btn);
console.log(plus_btn);
console.log(minus_btn);

// ilosc_btn.onkeydown=function(event){
//     if(isNaN(event.key) && event.key !== 'Backspace' && event.key !== '0'){
//         event.preventDefault();
//         console.log(event.key);
//     }
// }
// ilosc_btn.addEventListener('input', (e)=>{
    
// });



