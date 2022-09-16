
 $(window).scroll(function () {
  if ($(this).scrollTop() >= 300) {
      $(".gototop").fadeIn();
  }
  else {
      $(".gototop").fadeOut();

  }
})
$(".gototop").click(function(){
  $("html,body").animate({scrollTop:0},"slow");
})


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



