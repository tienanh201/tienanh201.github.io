const currentLocation = location.href;
const menuItem = document.querySelectorAll(".menu-list-link");
console.log(menuItem)
// console.log(menuItem)
for (let i = 0; i < menuItem.length; i++) {
    if (menuItem[i].href === currentLocation) {
        menuItem[i].className = "active1"
    }
}
let closeOver = document.querySelector(".overlay-close");
let btnmenu = document.querySelector(".nav-mobile");
let modalmenu = document.querySelector(".mydiv_mobile");
let cart = document.querySelector(".cart")
let menuCart = document.querySelector(".dialog,.overlay")
let close1 = document.querySelector(".btnclose")
let cartClose = document.querySelector(".cart_close");

closeOver.onclick = function(){
    menuCart.style.display="none";
}
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






let products2 = JSON.parse(localStorage.getItem("products"));

let productE2 = document.querySelector(".elementtor_cart_items");
console.log(productE2);
function convertMoney(number) {
    return number.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}

function renderProduct2(arr) {
    productE2.innerHTML = "";

    updateTotalCart(arr);
    // totalCart.innerHTML = updateTotalCart(arr);

    let html5 = ""
    for (let i = 0; i < arr.length; i++) {
        const p = arr[i];

        html5 += `
        <div class="elementor-menu-cart">
                        <div class="elementor-menu-img">
                            <img src="${p.img}" alt="">
                        </div>
                        <div class="elmentor-menu-text">
                            <div class="elementor-menu-text-name">
                                <span>${p.name}</span>

                            </div>
                            <div class="elementor-menu-text-price">
                                <span>${p.count} x</span>
                                <span>${convertMoney(p.price)}</span>
                            </div>
                        </div>
                        <div class="elementor-menu-delete">
                        <i class="fa-regular fa-circle-xmark" onclick="removeItems(${p.id})"></i>
                        </div>
                    </div>
        
        
        `
    }
    productE2.innerHTML = html5;
}
let totalCart = document.querySelector(".elementor_total");
console.log(totalCart)
window.updateTotalCart = function (arr) {
    let total = 0;
    for (let i = 0; i < arr.length; i++) {
        total += arr[i].count * arr[i].price;

    }
    totalCart.innerText = convertMoney(total);
}


window.removeItems = function(id){
    for(let i=0;i<products2.length;i++){
        if(products2[i].id == id){
            products2.splice(i,1);
        }
    }
    setProductsToLocalStorage(products2);
    renderProduct2(products2)
};
renderProduct2(products2)