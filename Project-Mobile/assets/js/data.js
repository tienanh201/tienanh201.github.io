
let products = [
    {
        id: 1,
        img: "./assets/images/iphone/iphone-13-pro-max.webp",
        price: 26990000,
        name: "iPhone 13 Pro Max",
        color: "Gold",
        capacity: "128GB",
        count: 1,
    },
    {
        id: 2,
        img: "./assets/images/iphone/ip13pro-1-1.webp",
        price: 24490000,
        name: "iPhone 13 Pro ",
        color: "Gold",
        capacity: "128GB",
        count: 1,
    },
    {
        id: 3,
        img: "./assets/images/iphone/iphone-13ss.webp",
        price: 18990000,
        name: "iPhone 13 ",
        color: "Gold",
        capacity: "128GB",
        count: 1,
    },
    {
        id: 4,
        img: "./assets/images/iphone/ip13mini-1.webp",
        price: 18590000,
        name: "iPhone 13 mini",
        capacity: "64GB",
        color: "Green",
        count: 1,
    },
    {
        id: 5,
        img: "./assets/images/iphone/iphone12-Sale.webp",
        price: 15790000,
        name: "iPhone 12 ",
        capacity: "64GB",
        color: "Green",
        count: 1,
    },
    {
        id: 6,
        img: "./assets/images/iphone/iphone-11-Green.webp",
        price: 10590000,
        name: "iPhone 11 ",
        capacity: "64GB",
        color: "Green",
        count: 1,
    },
    {
        id: 7,
        img: "./assets/images/iphone/ipse.webp",
        price: 10590000,
        name: "iPhone SE (2022)",
        capacity: "64GB",
        color: "While",
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
let productsE1 = document.querySelector(".get_products");
console.log(productsE1)
// console.log(productsE1)

function renderProduct(arr) {
    productsE1.innerHTML = ""

    // updateTotalPrice(arr);
    totalProducts.innerHTML = updateTotalProducts(arr);


    // productsE1.innerHTML = ""
    if (arr.length == 0) {
        productsE1.insertAdjacentHTML("afterbegin", "<tr>Không có sản phẩm nào trong giỏ hàng</tr>")
        return;
    }

    //có sản phẩm
    let html = "";
    for (let i = 0; i < arr.length; i++) {
        const p = arr[i];
        html += `

           
                <div class="col-lg-3 col-6">
                    <a href="details.html">
                        <div class="product">
                            <div class="prd-img">
                                <img src="${p.img}" alt=""
                                    class="img">
                            </div>
                            <div class="prd-info">
                                <h4 class="info-title">${p.name} </h4>
                                   
                                <div class="box-p">
                                    <span class="title-price">Giá từ: </span>
                                    <span class="price">${convertMoney(p.price)}</span>
                                    <p class="price-old "></p>
                                    <span class="percent"></span>
                                </div>

                            </div>
                        </div>
                    </a>
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
// window.updateTotalPrice = function (arr) {
//     let total = 0;
//     for (let i = 0; i < arr.length; i++) {
//         total += arr[i].count * arr[i].price;
//     }
//     totalMoney.innerText = convertMoney(total);

// };
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
