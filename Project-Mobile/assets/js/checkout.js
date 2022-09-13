let products = JSON.parse(localStorage.getItem("products"));
let productE1 = document.querySelector(".products-item");
console.log(productE1)

function convertMoney(number) {
    return number.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'});
}
function renderProduct(arr){
    productE1.innerHTML=""
    updateTotal(arr)
    totalProducts.innerHTML = updateTotalProducts(arr);

    let html5 = ""
    for(let i=0 ; i< arr.length ;i++){
        const p = arr[i];

        html5 += `
    <div class="cart-item">
        <img src="${p.img}" alt="" width="30%">
        <div class="cart-item-title">
            <span>${p.name}</span>
            <span>x ${p.count}</span>

            <p class="item_color">Chọn màu: ${p.color}</p>
            <p>Chọn Dung lượng: ${p.capacity}</p>

        </div>
           
    </div> 
        `
    }
    productE1.innerHTML = html5
}

let totalMoney = document.querySelector(".total_products")
// console.log(totalMoney)
window.updateTotal = function (arr){
    let total = 0;
    for(let i=0;i< arr.length ;i++){
        total +=arr[i].count * arr[i].price;
        
    }
    totalMoney.innerText = convertMoney(total);
}
// số lượng khi add vào
let totalProducts = document.querySelector(".cart_sl");

function updateTotalProducts(arr){
    let total3 = 0;
    for(let i=0;i<arr.length;i++){
        total3 += arr[i].count;
    }
    return total3;


}

renderProduct(products)