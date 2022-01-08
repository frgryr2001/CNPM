function refreshPage() {
  window.location.reload();
}

// Lấy danh sách khuyến mãi
function getAllPromotions() {
  // $("#add-employee-success-modal").modal("hide");
  let promotion_list = document.getElementById("promotion-list");
  // console.log(promotion_list);
  if (promotion_list) {
    promotion_list.innerHTML = "";
    let url = "../admin/api/promotion/get_all_promotions.php";
    fetch(url)
      .then((response) => response.json())
      .then((json) => {
        let products = json.data;
        products.forEach((product) => {
          let tr = document.createElement("tr");
          tr.classList.add("row-item");
          tr.onclick = function () {
            showPromotionDetailModal(product.id);
          };
          let url =
            "../admin/api/category/get_category.php?id=" + product.id_category;
          fetch(url)
            .then((res) => res.json())
            .then((json) => {
              //   console.log(json.data);
              tr.innerHTML = `   
                <td>${product.product_name}</td>
                <td>${json.data.name}</td>
                <td>${product.sale_off}%</td>
                <td>${product.sale_off_period}</td>`;
            });
          promotion_list.appendChild(tr);
        });
      });
  }
}

window.addEventListener("load", (e) => {
  getAllPromotions();
});

// Hiện modal thực hiện thao tác cập nhật và xóa
function showPromotionDetailModal(id) {
  // console.log(id);
  $("#view-promotion-detail-modal").modal("show");
  document
    .getElementById("btn-confirm-edit-promotion")
    .setAttribute("product-id", id);
  document
    .getElementById("btn-confirm-delete-promotion")
    .setAttribute("product-id", id);
  let url = "../admin/api/admin_product/get_product.php?id=" + id;
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      if (json.code === 0) {
        let product = json.data;
        // console.log(product);
        // console.log(product.product_name);
        document.getElementById(
          "modal-view-promotion-detail-product-name"
        ).value = product.product_name;
        document.getElementById("modal-view-promotion-detail-quantity").value =
          product.sale_off;
        document.getElementById("modal-view-promotion-detail-period").value =
          product.sale_off_period;
        document.getElementById("confirm-edit-promotion-modal-name").innerHTML =
          product.product_name;
        document.getElementById(
          "confirm-delete-promotion-modal-name"
        ).innerHTML = product.product_name;
      }
    });
}

// Đổ dữ liệu sản phẩm vào modal thêm khuyến mãi
function bindProductNamesToModal(id) {
  let url = "../admin/api/admin_product/get_products_by_category.php?id=" + id;
  let modal_add_promotion_product_name = document.getElementById(
    "modal-add-promotion-product-name"
  );
  if (modal_add_promotion_product_name) {
    modal_add_promotion_product_name.innerHTML = "";
    fetch(url)
      .then((res) => res.json())
      .then((json) => {
        let products = json.data;
        if (products) {
          products.forEach((product) => {
            if (parseInt(product.sale_off) === 0) {
              let option = document.createElement("option");
              option.classList.add("product-name-item");
              option.setAttribute("product-id", product.id);
              option.innerHTML = product.product_name;
              modal_add_promotion_product_name.appendChild(option);
            }
            // return `
            //     <option class="product-name-item" product-id=${product.id}>${product.product_name}</option>
            //   `;
          });
          // if (modal_add_promotion_product_name) {
          //   modal_add_promotion_product_name.innerHTML = htmls.join("");
          //   modal_add_promotion_product_name.setAttribute(
          //     "product-id",
          //     products[0].id
          //   );
          // }
        } else {
          modal_add_promotion_product_name.innerHTML = "";
          modal_add_promotion_product_name.setAttribute("product-id", 0);
        }
      });
  }
}

// Lấy danh sách danh mục đưa vào modal
function bindCategoryDataToModal() {
  let url = "../admin/api/category/get_all_categories.php";
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      let categories = json.data;
      let modal_add_promotion_category_name = document.getElementById(
        "modal-add-promotion-category-name"
      );
      let htmls = categories.map((category) => {
        return `
            <option category-id=${category.id_category} class="category-name-item">${category.name}</option>
          `;
      });
      modal_add_promotion_category_name.innerHTML = htmls.join("");
      let category_name_item_init = Array.from(
        document.querySelectorAll(".category-name-item")
      )[0];
      let id_category = category_name_item_init.getAttribute("category-id");
      modal_add_promotion_category_name.setAttribute(
        "category-id",
        id_category
      );
      bindProductNamesToModal(id_category);
    });
}

// Lấy sản phẩm tương ứng với danh mục
function getCorrespondingProduct(tag) {
  tag.setAttribute("changed", 1);
  let modal_add_promotion_category_name = document.getElementById(
    "modal-add-promotion-category-name"
  );
  let category_name_items = Array.from(
    document.querySelectorAll(".category-name-item")
  );
  //   console.log(tag.value);
  let selected_item = category_name_items.filter((item) => {
    return item.innerHTML === tag.value;
  });
  //   console.log(selected_item[0].getAttribute("category-id"));
  let id = selected_item[0].getAttribute("category-id");
  if (id) {
    modal_add_promotion_category_name.setAttribute("category-id", id);
    bindProductNamesToModal(id);
  }
}

// Set lại id của sản phẩm được chọn mỗi khi thay đổi
function setProductIdAttribute(tag) {
  let modal_add_promotion_product_name = document.getElementById(
    "modal-add-promotion-product-name"
  );
  let product_name_items = Array.from(
    document.querySelectorAll(".product-name-item")
  );
  //   console.log(tag.value);
  let selected_item = product_name_items.filter((item) => {
    return item.innerHTML === tag.value;
  });
  //   console.log(selected_item[0].getAttribute("category-id"));
  let id = selected_item[0].getAttribute("product-id");
  if (id) {
    // modal_add_promotion_category_name.setAttribute("category-id", id);
    // bindProductNamesToModal(id);
    // console.log(id);
    modal_add_promotion_product_name.setAttribute("product-id", id);
  }
}

// Xử lý thêm khuyến mãi
function addPromotion() {
  let product_id = document
    .getElementById("modal-add-promotion-product-name")
    .getAttribute("product-id");
  // console.log(product_id);
  let promotion_num = document.getElementById(
    "modal-add-promotion-quantity"
  ).value;
  let promotion_period = document.getElementById(
    "modal-add-promotion-period"
  ).value;

  let add_promotion_error_mess = document.getElementById(
    "add-promotion-error-mess"
  );
  // Kiểm tra đầu vào
  if (
    parseInt(product_id) === 0 ||
    promotion_num === "" ||
    promotion_period === ""
  ) {
    add_promotion_error_mess.classList.add("card");
    add_promotion_error_mess.innerHTML = "Vui lòng nhập đầy đủ thông tin";
  } else if (parseInt(promotion_num) <= 0 || parseInt(promotion_num) > 100) {
    add_promotion_error_mess.classList.add("card");
    add_promotion_error_mess.innerHTML = "Giá trị khuyến mãi không hợp lệ";
  } else {
    product_id = parseInt(product_id);
    promotion_num = parseInt(promotion_num);

    // console.log("OK");

    // Call api Thêm khuyến mãi
    let url = "../admin/api/promotion/update_promotion.php";
    let data = {
      id: product_id,
      sale_off: promotion_num,
      sale_of_period: promotion_period,
    };
    fetch(url, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((json) => {
        if (json.code === 0) {
          $("#add-promotion-success-modal").modal("show");
          $("#add-promotion-modal").modal("hide");
          document.querySelector(".modal-backdrop").classList.add("d-none");
        }
      });
  }
}

// Kiểm tra thông tin trước khi cập nhật
function validateEditPromotionInput() {
  let edit_promotion_error_mess = document.getElementById(
    "edit-promotion-error-mess"
  );
  let num = document.getElementById(
    "modal-view-promotion-detail-quantity"
  ).value;
  let period = document.getElementById(
    "modal-view-promotion-detail-period"
  ).value;

  if (num === "" || period === "") {
    edit_promotion_error_mess.classList.add("card-promotion-error");
    edit_promotion_error_mess.innerHTML = "Vui lòng nhập đầy đủ thông tin";
  } else if (parseInt(num) <= 0 || parseInt(num) > 100) {
    edit_promotion_error_mess.classList.add("card-promotion-error");
    edit_promotion_error_mess.innerHTML = "Giá trị khuyến mãi không hợp lệ";
  } else {
    $("#view-promotion-detail-modal").modal("hide");
    $("#confirm-edit-promotion-modal").modal("show");
    document.querySelector(".modal-backdrop").classList.add("d-none");
  }
}

// Call api -> Chỉnh sửa khuyến mãi
function sendEditPomotionRequest(tag) {
  let id = tag.getAttribute("product-id");
  // console.log(id);
  let sale_off = parseInt(
    document.getElementById("modal-view-promotion-detail-quantity").value
  );
  let sale_off_period = document.getElementById(
    "modal-view-promotion-detail-period"
  ).value;

  let url = "../admin/api/promotion/update_promotion.php";
  let data = {
    id: id,
    sale_off: sale_off,
    sale_of_period: sale_off_period,
  };
  fetch(url, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((json) => {
      if (json.code === 0) {
        refreshPage();
      }
    });
}

// Call Api -> Xóa khuyến mãi
function sendDeletePromotionRequest(tag) {
  let id = tag.getAttribute("product-id");
  // console.log(id);
  let sale_off = 0;
  let sale_off_period = "0000-00-00";

  let url = "../admin/api/promotion/update_promotion.php";
  let data = {
    id: id,
    sale_off: sale_off,
    sale_of_period: sale_off_period,
  };
  fetch(url, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((json) => {
      if (json.code === 0) {
        refreshPage();
      }
    });
}
