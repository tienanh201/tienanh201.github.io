let toasts = $(".toasts");
let btn = $(".toast-btn");
let close = $(".icon_close");
let countdown = $(".countdown");

//lắng nghe skien click vào button show
btn.click(function(){
   // thêm class active vào toats,countdown khi click vào button show
   toasts.addClass("active");
   countdown.addClass("active");;
//set time cho toasts
   setTimeout(()=>{
       toasts.addClass("active").removeClass("active");
   },5000)
//set time cho countdown
   setTimeout(()=>{
       countdown.addClass("active").removeClass("active");
   },5300)
})
 


//lắng nghe sự kiện click vào nút x
close.click(function(){
 //khi click vào sẽ xóa đi class active
 toasts.addClass("active").removeClass("active");
 //set time
     setTimeout(()=>{
         countdown.addClass("active").removeClass("active");
     },300)
})
   
