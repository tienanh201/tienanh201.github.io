let vouchers = [
    {
        id: 4,
        title: "0",
        dvt: "%",
        condition: 400,
        hsd: "30.09.2022"
    },
    {
        id: 5,
        title: "8",
        dvt: "%",
        condition: 200,
        hsd: "30.09.2022"
    },
    {
        id: 6,
        title: "15",
        dvt: "k",
        condition: 150,
        hsd: "30.09.2022"
    },
    {
        id: 7,
        title: "20",
        dvt: "k",
        condition: 250,
        hsd: "30.09.2022"
    },
    {
        id: 8,
        title: "20",
        dvt: "%",
        condition: 600000000,
        hsd: "30.09.2022"
    }
]

function convertMoney(number) {
    return number.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'});
}
var voucherId = document.querySelector(".voucher-id")
function renderVoucher(arr) {
    voucherId.innerHTML = "";
    let html1 = ""
    if(arr.length == 0) {
        voucherId.innerHTML = `<p class="text-center pt-5 text-red-500 font-bold">Không có mã khuyến mại</p>`;
        return
    }
    for (let i = 0; i < arr.length; i++) {
        const v = arr[i];
        html1 += `
        <div class="col-lg-6">
        <div class="vouchers">
            <div class="voucher_logo">
                <img src="./assets/images/Sonder2.png" alt="">
            </div>
            <div class="voucher_content">
                <div class="voucher_content_discount">
                    <p class="promo-code">Giảm <span> ${v.title}</span><span>${v.dvt}</span></p>
                    <p class="promo-click" onclick="addVoucher(${vouchers[i].id})">Dùng ngay <i class="fa-solid fa-chevron-right"></i></p>
                </div>
                <p class="min_order">Đơn tối thiểu <span> ${v.condition}</span>K</p>
                <p class="date_code">HSD: ${v.hsd}</p>
            </div>
        </div>
    </div>
        `
    }
    voucherId.innerHTML = html1
}

renderVoucher(vouchers)
var codeId = document.querySelector(".code-id")
var promoClick = document.querySelector(".promo-click");


function addVoucher(id) {
    codeId.innerHTML = ""
    
    let html2 = ""

    for (let i = 0; i < vouchers.length; i++) {
        if(vouchers[i].id == id) {
            html2 = `
            <div class="col-lg-12">
            <div class="vouchers">
                <div class="voucher_logo">
                    <img src="./assets/images/Sonder2.png" alt="">
                </div>
                <div class="voucher_content">
                    <div class="voucher_content_discount">
                        <p class="promo-code">Giảm 
                        <span class="promo-code-number"> ${vouchers[i].title}</span> 
                        <span>${vouchers[i].dvt}</span></p>
                        <p class="promo-click"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick="addVoucher(${vouchers[i].id})">Đổi mã khác <i class="fa-solid fa-chevron-right"></i></p>
                       
                    </div>
                    <p class="min_order">Đơn tối thiểu <span>${vouchers[i].condition}</span>K</p>
                    <p class="date_code">HSD: ${vouchers[i].hsd}</p>
                </div>
            </div>
        </div>
            `
        } 
        codeId.innerHTML = html2;
       
      
    }
    updateTotalMoney(products3)
}

let products3 = JSON.parse(localStorage.getItem("products"));

const discount = document.querySelector(".discount_price");
const total = document.querySelector(".total_products2")
// console.log(discount.innerHTML);
function updateTotalMoney(arr) {
    let totalMoney = 0;

    let discountMoney = 0;

    for (let i = 0; i < arr.length; i++) {
        totalMoney += arr[i].count * arr[i].price
    }


    // //Ap dung ma giam gia:

    const code = document.querySelector(".promo-code");
    const codeNumber = document.querySelector(".promo-code span");
    
    if(!code) {
        discountMoney = 0;
    } 
    else {
        const min = document.querySelector(".min_order span")
        console.log(min.innerHTML)
        if(Number(min.innerText)*1000 > Number(totalMoney)){
            codeId.innerHTML = `<p class="text-red-500 italic">Đơn hàng chưa đủ điều kiện áp dụng mã KM này</p>`
            discountMoney = 0
        } else {
            if (code.innerText.includes("%")) {
                discountMoney = Number(codeNumber.innerText) / 100 * totalMoney
                
            } if(code.innerText.includes("k")) {
                discountMoney = Number(codeNumber.innerText)*1000
            }
        }
        
    }
   
    discount.innerText = convertMoney(discountMoney);
    total.innerText = convertMoney(totalMoney - discountMoney)
   
}


updateTotalMoney(products3)

// renderProduct(products3)