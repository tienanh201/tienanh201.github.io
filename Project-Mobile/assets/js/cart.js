let products = [
    {
        id: 1,
        img: "./assets/images/iphone/mau-vang-1-1.png",
        price: 26990000,
        name: "iPhone 13 Pro Max",
        count: 1,
    },
    {
        id: 2,
        img: "./assets/images/ipad/ipad-air-5.webp",
        price: 15490000,
        name: "iPad Air 5",
        count: 1,
    },
    {
        id: 3,
        img: "./assets/images/mac/mac-m2-1.webp",
        price: 30490000,
        name: "MacBook Pro 13 M2 2022",
        count: 1,
    },
]
function convertMoney(number) {
    return number.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });

}
let productsE1 = document.querySelector(".products")
// console.log(productsE1)

function rederProduct(arr) {
    
    productsE1.innerHTML =""
    updateTotalPrice(arr);

    // productsE1.innerHTML = ""
    // if (arr.length == 0) {
    //     productsE1.insertAdjacentHTML("afterbegin", "<tr>Không có sản phẩm nào trong giỏ hàng</tr>")
    //     return;
    // }

    //có sản phẩm
    let html = ""
    for (let i = 0; i < arr.length; i++) {
        const p = arr[i]
        html += `
                                    
                                        <tr id="delete_div1">
                                            <td class="set-height">
                                                <a href="">
                                                    <img src="${p.img}" alt=""
                                                        width="55px">
                                                </a>
                                            </td>
                                            <!--  -->
                                            <td class="set-height">
                                                <a href="" style="color: #0d6dfe !important;">${p.name}</a>
                                                <dl>
                                                    <dt>Chọn màu: Gold </dt>
                                                    <dt>Chọn dung lượng: 128GB </dt>

                                                </dl>
                                            </td>
                                            <!--  -->
                                            <td class="set-height">
                                                <span>${convertMoney(p.price)}</span>
                                            </td>
                                            <!--  -->
                                            <td class="set-height">
                                                <span class="btn btn-primary" onclick="subtractCount(${p.id})">-</span>
                                                <span id="kq">${p.count}</span>
                                                <span class="btn btn-primary" onclick="addCount(${p.id})">+</span>
                                            </td>
                                            <!--  -->
                                            <td class="set-height">
                                                <span>
                                                    26.990.000đ
                                                </span>
                                            </td>
                                            <!--  -->
                                            <td class="set-height">
                                                <i class="fa-solid fa-trash-can" onclick="removePro(${p.id})"></i>
                                            </td>




                                        </tr>                            
             
    `
    }
    productsE1.innerHTML = html
}
// tăng số lượng
window.addCount = function(id){
    for(let i=0;i<products.length;i++){
        if(products[i].id == id){
            products[i].count +=1;
        }
    }
    rederProduct(products)
}
// giảm
window.subtractCount = function(id){
    for(let i=0;i<products.length;i++){
        if(products[i].id == id){
            products[i].count -=1;
        }
        if(products[i].count < 1){
            products[i].count = 1;
        }
    }
    rederProduct(products)
}
// xóa sản phẩm
window.removePro = function(id){
    for(let i=0 ;i< products.length ;i++){
        if(products[i].id ==id){
            products.splice(i,1)
        }
    }
    rederProduct(products)
}
// cập nhật tổng tiền
let totalMoney = document.querySelector(".moneytotal")
console.log(totalMoney)
window.updateTotalPrice = function(arr){
    let total = 0;
    for(let i=0; i<arr.length;i++){
        total += arr[i].count * arr[i].price;
    }
    totalMoney.innerText = convertMoney(total);
    // rederProduct(arr)
}

rederProduct(products)