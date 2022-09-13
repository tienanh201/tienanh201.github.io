const currentLocation = location.href;
const menuItem = document.querySelectorAll(".menu-list-link");
console.log(menuItem)
// console.log(menuItem)
for(let i=0; i<menuItem.length; i++){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = "active1"
    }
}
let btnmenu = document.querySelector(".nav-mobile");
let modalmenu = document.querySelector(".mydiv_mobile");
let cart = document.querySelector(".cart")
let menuCart = document.querySelector(".menu_cart")
let close1 = document.querySelector(".btnclose")
let cartClose = document.querySelector(".cart_close");
btnmenu.onclick = function () {
    modalmenu.style.display = "block";
}
close1.onclick = function () {
    modalmenu.style.display = "none";

}
cart.onclick = function () {
    menuCart.style.display = "block";
}
cartClose.onclick = function () {
    menuCart.style.display = "none";
}
console.log(cart)