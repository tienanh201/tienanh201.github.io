let products = [
    {
        id: 1,
        img: "./assets/images/iphone/mau-vang-1-1.png",
        price: 26990000,
        name: "iPhone 13 Pro Max",
        color: "Gold",
        capacity: "128GB",
        count: 1,
    },
    {
        id: 2,
        img: "./assets/images/ipad/ipad-air-5.webp",
        price: 15490000,
        name: "iPad Air 5",
        capacity: "64GB",
        color: "Purple",
        count: 1,
    },
    {
        id: 3,
        img: "./assets/images/mac/mac-m2-1.webp",
        price: 30490000,
        name: "MacBook Pro 13 M2 2022",
        color: "Space Gray",
        capacity: "256GB",
        count: 1,
    },
];


function getProductsFromLocalStorage() {
    let localStorageValue = localStorage.getItem("products");
    if (localStorageValue) {
        try {
            products = JSON.parse(localStorageValue)
            console.log(products);
        }
        catch (err) {
            products = []
        }
    }
    else {
        products = [];
    }
    renderProduct(products);
}

function setProductsToLocalStorage(arr) {
    localStorage.setItem("products", JSON.stringify(arr));
    renderProduct(products)
}
window.onload = getProductsFromLocalStorage

function convertMoney(number) {
    return number.toLocaleString("it-IT", { style: "currency", currency: "VND" });
}

let productsE1 = document.querySelector(".products");
let cartNo = document.querySelector(".cart_no");
// console.log(productsE1)

function renderProduct(arr) {
    productsE1.innerHTML = ""

    updateTotalPrice(arr);
    totalProducts.innerHTML = updateTotalProducts(arr);


    // productsE1.innerHTML = ""
    if (arr.length == 0) {
        // cartNo.style.display="none";
        cartNo.innerHTML=`
        <div class="empty_img">
        <img src="./assets/images/empty-cart.png" alt="">
        </div>
        `
        return;
    }

    //có sản phẩm
    let html = "";
    for (let i = 0; i < arr.length; i++) {
        const p = arr[i];
        html += `
                                        
                                        <tr id="delete_div1">
                                            <td class="set-height">
                                                <a href="">
                                                    <img src="${p.img}" alt=""
                                                        width="55px">
                                                </a>
                                            </td>
                                            <td class="set-height-mobile set-desktop">
                                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                                </td>
                                          
                                            <!--  -->
                                            <td class="set-height set_mobile">
                                                <a href="" style="color: #0d6dfe !important;">${p.name
            }</a>
                                                <dl>
                                                    <dt>Chọn màu: ${p.color}</dt>
                                                    <dt>Chọn dung lượng: ${p.capacity}</dt>

                                                </dl>
                                            </td>
                                            <!--  -->
                                            <td class="set-height set_mobile">
                                                <span>${convertMoney(
                p.price
            )}</span>
                                            </td>
                                            <!--  -->
                                            <td class="set-height set_mobile">
                                            <div class="soluong">
                                                <span class=" btn-tru" onclick="subtractCount(${p.id})">-</span>
                                                <span class="kq">${p.count}</span>
                                                <span class=" btn-cong" onclick="addCount(${p.id})">+</span>                          
                                            </div>
                                            </td>
                                            <!--  -->
                                            <td class="set-height set_mobile">
                                                <span class="price_pro">
                                                   ${convertMoney(p.count * p.price)}
                                                </span>
                                            </td>
                                            <!--  -->
                                            <td class="set-height set_mobile">
                                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-trash-can"></i>
                                           </button>
                                                
                                            </td>




                                        </tr>  
                                        <tr class="set-desktop">
                                          <td>
                                            Sản phẩm
                                          </td>
                                          <td class="set-height-mobile">
                                             ${p.name}
                                          </td>
                                        </tr>  
                                        <tr class="set-desktop">
                                          <td>
                                            Gía
                                          </td>
                                          <td class="set-height-mobile">
                                          <span class="price_pro">
                                          ${convertMoney(p.count * p.price)}
                                       </span>
                                          </td>
                                        </tr> 
                                        <tr class="set-desktop">
                                          <td>
                                            Số lượng
                                          </td>
                                          <td>
                                          <div class="soluong set-height-mobile">
                                          <span class=" btn-tru" onclick="subtractCount(${p.id})">-</span>
                                          <span class="kq">${p.count}</span>
                                          <span class=" btn-cong" onclick="addCount(${p.id})">+</span>                          
                                      </div>
                                          </td>
                                        </tr>          
                                        
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
      <h6 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xóa sản phẩm ?</h6>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
        <button type="button" class="btn btn-primary" onclick="removePro(${p.id})" data-bs-dismiss="modal" style="width:80px">CÓ</button>
      </div>
    </div>
  </div>
</div>   
             

    `;
    }
    productsE1.innerHTML = html;
}
// tăng số lượng
window.addCount = function (id) {
    for (let i = 0; i < products.length; i++) {
        if (products[i].id == id) {
            products[i].count += 1;
        }
    }
    setProductsToLocalStorage(products)
    renderProduct(products);
};
// giảm
window.subtractCount = function (id) {
    for (let i = 0; i < products.length; i++) {
        if (products[i].id == id) {
            products[i].count -= 1;
        }
        if (products[i].count < 1) {
            products[i].count = 1;
        }
    }
    setProductsToLocalStorage(products)

    renderProduct(products);
};
// xóa sản phẩm
window.removePro = function (id) {
    for (let i = 0; i < products.length; i++) {
        if (products[i].id == id) {
            products.splice(i, 1);
        }
    }
    setProductsToLocalStorage(products)

    renderProduct(products);
};
// cập nhật tổng tiền
let totalMoney = document.querySelector(".moneytotal");
// console.log(totalMoney);
window.updateTotalPrice = function (arr) {
    let total = 0;
    for (let i = 0; i < arr.length; i++) {
        total += arr[i].count * arr[i].price;
    }
    totalMoney.innerText = convertMoney(total);
    // rederProduct(arr)
};
// số lượng products
let totalProducts = document.querySelector(".cart_sl");

function updateTotalProducts(arr) {
    let total3 = 0;
    for (let i = 0; i < arr.length; i++) {
        total3 += arr[i].count;
    }
    return total3;


}

//tổng số lượng sản phẩm


// cập nhật tiền của từng sản phẩm
setProductsToLocalStorage(products)

renderProduct(products);


