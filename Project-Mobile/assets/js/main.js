var btn1 = document.getElementById("flexRadioDefault1");
var btn2 = document.getElementById("flexRadioDefault2");
var btn3 = document.getElementById("flexRadioDefault3");
var btn4 = document.getElementById("flexRadioDefault4");
var btn5 = document.getElementById("flexRadioDefault5");

var changeColor = document.querySelector(".choose-color");
var changePrice = document.getElementById("change-color-price");
var changeImg1 = document.getElementById("img-13-1");
var changeImg2 = document.getElementById("img-13-2");


btn1.onclick = function(){
  changeColor.innerText= "Chọn màu Alpine Green";
  changePrice.innerText="27.390.000đ";
  changeImg1.src = "assets/images/iphone/mau-xanh-la-1-1.jpg";
  changeImg2.src = "assets/images/iphone/mau-xanh-la-2-1.jpg";

}
btn2.onclick = function(){
  changeColor.innerText= "Chọn màu Sierra Blue";
  changePrice.innerText="27.590.000đ";
  changeImg1.src = "assets/images/iphone/mau-xanh-1-1.png";
  changeImg2.src = "assets/images/iphone/mau-xanh-2-1.png";

}
btn3.onclick = function(){
  changeColor.innerText= "Chọn màu Graphite";
  changePrice.innerText="27.490.000đ";
  changeImg1.src = "assets/images/iphone/mau-den-1-1.png";
  changeImg2.src = "assets/images/iphone/mau-den-2-1.png";

}
btn4.onclick = function(){
  changeColor.innerText= "Chọn màu Sliver";
  changePrice.innerText="27.390.000đ";
  changeImg1.src = "assets/images/iphone/mau-trang-1-1.png";
  changeImg2.src = "assets/images/iphone/mau-trang-2-1.png";

}
btn5.onclick = function(){
  changeColor.innerText= "Chọn màu Gold";
  changePrice.innerText="26.990.000đ";
  changeImg1.src = "assets/images/iphone/mau-vang-1-1.png";
  changeImg2.src = "assets/images/iphone/mau-vang-2-1.png";



}


// // function click_btn(){
// //     location.assign('checkout.html');
    
// // }
// // const btn = document.querySelector(".order-button");
// // console.log(btn);

// //  for(var i=0; i<btn.length;i++){
// //     function click_btn(){
// //         // var btnItem = event.target
// //         // var product = btnItem.parentElement
// //         var productImg = document.querySelector("#img-13").src
// //         console.log(productImg)
// //     }
// //  }

// //  function click_btn(){
// //     // location.assign('checkout.html')
// //     var productImg = document.getElementById("img-13").src
// //     // console.log(productImg)
// //     addcart(productImg)

// //  }
// //  function addcart(productImg){
// //     let cartItem1 = JSON.parse(localStorage.getItem("prdInCart"));
// //      var addImg = document.createElement("div",style='display:flex')
// //      var imgContent ='<img src="'+productImg+'" alt="" width="30%"><div class="cart-item-title"><span>iPhone 13 Pro Max</span><span>x 1</span><p class="item_color">Chọn màu: Gold</p><p>Chọn Dung lượng: 128GB</p> </div>'
// //      addImg.innerHTML = imgContent
// //      var cartItem = document.querySelector(".cart-item")
// //     //  console.log(cartItem)
// //     cartItem.append(addImg)
    
// //  }

// const btnCart = document.getElementsByClassName("order-button");
// const products =[];
// for (var i = 0; i < btnCart.length; i++) {
//     let addCart = btnCart[i];
//     addCart.addEventListener("click", () => {
//       let product = {
//         image: event.target.parentElement.src;
//         quantity: 1,
//       };
//       addItemToLocal(product);
//     });
// }
// function addItemToLocal(product) {
//     let cartItem = JSON.parse(localStorage.getItem("prdInCart"));
//     if (cartItem === null) {
//       products.push(product);
//       localStorage.setItem("prdInCart", JSON.stringify(products));
//       console.log(cartItem);
//     } else {
//       cartItem.forEach((item) => {
//         if (product.name == item.name) {
//           product.quantity = item.quantity += 1;
//           product.totalprice = item.totalprice += product.totalprice;
//         } else {
//           products.push(item);
//         }
//       });
//       products.push(product);
//     }
//     localStorage.setItem("prdInCart", JSON.stringify(products));
//     window.location.reload();
//   }
//   function dispCartItem() {
//     let html = "";
//     let cartItem = JSON.parse(localStorage.getItem("prdInCart"));
//     cartItem.forEach((item) => {
//       html += '<img src="'+item.image+'" alt="" width="30%"><div class="cart-item-title"><span>iPhone 13 Pro Max</span><span>x 1</span><p class="item_color">Chọn màu: Gold</p><p>Chọn Dung lượng: 128GB</p> </div>'
//     });
//     document.querySelector(".cart-item").innerHTML = html;
//   }
//   dispCartItem();