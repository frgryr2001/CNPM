// Lấy danh sách nhân viên và render ra giao diện
function getAllCustomerAccounts() {
  // $("#add-employee-success-modal").modal("hide");
  let customer_account_list = document.getElementById("customer-account-list");
  // console.log(employee_account_list);
  if (customer_account_list) {
    customer_account_list.innerHTML = "";
    let url = "../admin/api/customer/get_customers.php";
    fetch(url)
      .then((response) => response.json())
      .then((data) => {
        let accounts = data.data;
        let html = accounts.map((account) => {
          return `   
                <tr data-bs-toggle="modal" data-bs-target="#view-detail-customer-modal" class="row-item" onclick="viewCustomerAccountDetail(${account.id})">
                    <td>${account.fullname}</td>
                    <td>${account.email}</td>
                    <td>${account.phone}</td>
                    <td>${account.address}</td>
                </tr>`;
          // employee_account_list.appendChild(tr);
        });
        customer_account_list.innerHTML = html.join("");
      });
  }
}

window.addEventListener("load", (e) => {
  getAllCustomerAccounts();
});

// Xem thông tin chi tiết của khách hàng
function viewCustomerAccountDetail(id) {
  let url = "../admin/api/customer/get_customer.php?id=" + id;
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      let account = json.data;
      // console.log(account);
      document.getElementById("modal-view-customer-detail-name").value =
        account.fullname;
      document.getElementById("modal-view-customer-detail-email").value =
        account.email;
      if (parseInt(account.gender) === 1) {
        document.getElementById(
          "modal-view-customer-detail-male"
        ).checked = true;
      } else if (parseInt(account.gender) === 0) {
        document.getElementById(
          "modal-view-customer-detail-female"
        ).checked = true;
      }
      document.getElementById("modal-view-customer-detail-birthday").value =
        account.birthday;
      document.getElementById("modal-view-customer-detail-phone").value =
        account.phone;
      document.getElementById("modal-view-customer-detail-address").value =
        account.address;
    });
}
