let products = JSON.parse(localStorage.getItem("products"));
let filterAll = [];


$(".intro-title").text(products[0].name);
$("#change-color-price").text(products[0].price);

let productImg = document.querySelectorAll("#img-13-1");

for (let i = 0; i < products.length; i++) {
    if (titleProduct === products[i].name) {
      filterAll.push(products[i]);
    }
  }
function loopChangeImg(bxImg) {
    for (let i = 0; i < productImg.length; i++) {
      productImg[i].setAttribute("src", bxImg[i]);
     
    }
  }
  loopChangeImg(filterAll[0].img);  