"use strict";

// Call api -> lấy danh sách đơn hàng chưa được duyệt
function getNumOfNotApprovedOrder() {
  let url = "../admin/api/statistical/get_all_not_approved_orders.php";
  let num_of_not_approved_orders = document.getElementById(
    "num-of-not-approved-orders"
  );
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      if (num_of_not_approved_orders) {
        num_of_not_approved_orders.innerHTML = json.data.length;
      }
    });
}

// Call api -> lấy danh sách đơn hàng đã được duyệt
function getNumOfApprovedOrder() {
  let url = "../admin/api/statistical/get_all_approved_orders.php";
  let num_of_approved_orders = document.getElementById(
    "num-of-approved-orders"
  );
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      if (num_of_approved_orders) {
        num_of_approved_orders.innerHTML = json.data.length;
      }
    });
}

// Call api -> lấy số lượng sản phẩm đã bán
function getNumOfProductSold() {
  let url = "../admin/api/statistical/get_num_of_product_sold.php";
  let num_of_product_sold = document.getElementById("num-of-product-sold");
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      //   console.log(json.data);
      if (num_of_product_sold) {
        num_of_product_sold.innerHTML = json.data["SUM(qty)"];
      }
    });
}

// Call api -> lấy tổng doanh thu
function getNumOfTotalSales() {
  let url = "../admin/api/statistical/get_num_of_total_sales.php";
  let num_of_total_sales = document.getElementById("num-of-total-sales");
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      //   console.log(json.data);
      if (num_of_total_sales) {
        let num = new Intl.NumberFormat("vi-VN", {
          style: "currency",
          currency: "VND",
        }).format(json.data["SUM(total)"]);
        num_of_total_sales.innerHTML = num;
      }
    });
}

window.addEventListener("load", (e) => {
  getNumOfNotApprovedOrder();
  getNumOfApprovedOrder();
  getNumOfProductSold();
  getNumOfTotalSales();
});
