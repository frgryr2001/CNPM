// Lấy danh sách nhân viên và render ra giao diện
function getAllPromotionAccounts() {
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
  getAllPromotionAccounts();
});

// Hiện modal thực hiện thao tác cập nhật và xóa
function showPromotionDetailModal(id) {
  console.log(id);
}

// Đổ dữ liệu sản phẩm vào modal thêm khuyến mãi
function bindProductNamesToModal(id) {
  let url = "../admin/api/product/get_products_by_category.php?id=" + id;
  let modal_add_promotion_product_name = document.getElementById(
    "modal-add-promotion-product-name"
  );
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      let products = json.data;
      if (products) {
        let htmls = products.map((product) => {
          return `
              <option>${product.product_name}</option>
            `;
        });
        if (modal_add_promotion_product_name) {
          modal_add_promotion_product_name.innerHTML = htmls.join("");
        }
      } else {
        modal_add_promotion_product_name.innerHTML = "";
      }
    });
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
      bindProductNamesToModal(id_category);
    });
}

function getCorrespondingProduct(tag) {
  tag.setAttribute("changed", 1);
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
    bindProductNamesToModal(id);
  }
}
