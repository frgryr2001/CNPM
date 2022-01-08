// Lấy danh sách nhân viên và render ra giao diện
function getAllEmployeeAccounts() {
  // $("#add-employee-success-modal").modal("hide");
  let employee_account_list = document.getElementById("employee-account-list");
  // console.log(employee_account_list);
  employee_account_list.innerHTML = "";
  let url = "../admin/api/employee/get_employees.php";
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      let accounts = data.data;
      let html = accounts.map((account) => {
        // console.log(account);
        // console.log(account.fullname);
        let type = "Nhân viên kho";
        if (parseInt(account.role) === 2) {
          type = "Nhân viên bán hàng";
        }
        return `   
                    <tr data-bs-toggle="modal" data-bs-target="#view-detail-employee-modal" class="row-account-item" onclick="viewEmployeeAccountDetail(${account.id})">
                        <td>${account.fullname}</td>
                        <td>${account.email}</td>
                        <td>${type}</td>
                        <td>
                            <span data-bs-toggle="modal" data-bs-target="#edit-employee-modal" onclick="openEditEmployeeModal(${account.id})" class="me-2 font-size-20"><i class="fas fa-edit"></i></span>
                            <span data-bs-toggle="modal" data-bs-target="#confirm-delete-employee-modal" onclick="openConfirmDeleteEmployeeModal(${account.id}, '${account.fullname}')" class="font-size-20"><i class="fas fa-trash-alt"></i></span>
                        </td>
                    </tr>`;
        // employee_account_list.appendChild(tr);
      });
      employee_account_list.innerHTML = html.join("");
    });
}

window.addEventListener("load", () => {
  getAllEmployeeAccounts();
});

// Thêm nhân viên
function addEmployeeAccount() {
  let add_employee_error_mess = document.getElementById(
    "add-employee-error-mess"
  );
  let name = document.getElementById("modal-add-employee-name").value;
  let email = document.getElementById("modal-add-employee-email").value;
  let gender = 0;
  if (document.getElementById("modal-add-employee-male").checked) {
    gender = 1;
  }
  let role = parseInt(
    document.getElementById("modal-add-employee-type").value.split(" - ")[0]
  );
  let birthday = document.getElementById("modal-add-employee-birthday").value;
  let phone = document.getElementById("modal-add-employee-phone").value;
  let address = document.getElementById("modal-add-employee-address").value;
  let salary = parseInt(
    document.getElementById("modal-add-employee-salary").value
  );

  if (
    name === "" ||
    email === "" ||
    !Number.isInteger(gender) ||
    !Number.isInteger(role) ||
    birthday === "" ||
    phone === "" ||
    address === "" ||
    !Number.isInteger(salary)
  ) {
    add_employee_error_mess.classList.add("card");
    add_employee_error_mess.innerHTML = "Vui lòng nhập đầy đủ thông tin";
  } else {
    add_employee_error_mess.innerHTML = "";
    add_employee_error_mess.classList.remove("card");
    let url = "../admin/api/employee/add_employee.php";
    let data = {
      email: email,
      name: name,
      phone: phone,
      address: address,
      role: role,
      birthday: birthday,
      salary: salary,
      gender: gender,
    };
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((json) => {
        // Thành công
        if (json["code"] == 0) {
          $("#add-employee-modal").modal("hide");
          $("#add-employee-success-modal").modal("show");
          document.querySelector(".modal-backdrop").classList.add("d-none");
        }
        // Thất bại
        else {
          add_employee_error_mess.classList.add("card");
          add_employee_error_mess.innerHTML = "Có lỗi, vui lòng thử lại";
        }
      });
  }
}

// Refresh page
function refreshPage() {
  window.location.reload();
}

// Xem thông tin chi tiết của nhân viên
function viewEmployeeAccountDetail(id) {
  let url = "../admin/api/employee/get_employee.php?id=" + id;
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      let account = json.data;
      // console.log(account);
      document.getElementById("modal-view-employee-detail-name").value =
        account.fullname;
      document.getElementById("modal-view-employee-detail-email").value =
        account.email;
      if (parseInt(account.gender) === 1) {
        document.getElementById(
          "modal-view-employee-detail-male"
        ).checked = true;
      } else if (parseInt(account.gender) === 0) {
        document.getElementById(
          "modal-view-employee-detail-female"
        ).checked = true;
      }
      if (parseInt(account.role) === 1) {
        document.getElementById("modal-view-employee-detail-type").value =
          "1 - Nhân viên kho";
      } else if (parseInt(account.role) === 2) {
        document.getElementById("modal-view-employee-detail-type").value =
          "2 - Nhân viên bán hàng";
      }
      document.getElementById("modal-view-employee-detail-birthday").value =
        account.birthday;
      document.getElementById("modal-view-employee-detail-phone").value =
        account.phone;
      document.getElementById("modal-view-employee-detail-address").value =
        account.address;
      document.getElementById("modal-view-employee-detail-salary").value =
        account.salary;
    });
}

// Mở modal chỉnh sửa thông tin nhân viên
function openEditEmployeeModal(id) {
  let url = "../admin/api/employee/get_employee.php?id=" + id;
  fetch(url)
    .then((res) => res.json())
    .then((json) => {
      let account = json.data;
      // console.log(account);
      document.getElementById("modal-edit-employee-name").value =
        account.fullname;
      document.getElementById("modal-edit-employee-email").value =
        account.email;
      if (parseInt(account.gender) === 1) {
        document.getElementById("modal-edit-employee-male").checked = true;
      } else if (parseInt(account.gender) === 0) {
        document.getElementById("modal-edit-employee-female").checked = true;
      }
      if (parseInt(account.role) === 1) {
        document.getElementById("modal-edit-employee-type").value =
          "1 - Nhân viên kho";
      } else if (parseInt(account.role) === 2) {
        document.getElementById("modal-edit-employee-type").value =
          "2 - Nhân viên bán hàng";
      }
      document.getElementById("modal-edit-employee-birthday").value =
        account.birthday;
      document.getElementById("modal-edit-employee-phone").value =
        account.phone;
      document.getElementById("modal-edit-employee-address").value =
        account.address;
      document.getElementById("modal-edit-employee-salary").value =
        account.salary;

      document.getElementById("confirm-edit-employee-modal-name").innerHTML =
        account.fullname;
      document
        .getElementById("btn-confirm-edit-employee")
        .setAttribute("employee-id", account.id);
    });
}

// Kiểm tra thông tin chỉnh sửa
function verifyEditEmployeeInfo() {
  let name = document.getElementById("modal-edit-employee-name").value;
  let email = document.getElementById("modal-edit-employee-email").value;
  let gender = 0;
  if (document.getElementById("modal-edit-employee-male").checked) {
    gender = 1;
  }
  let role = parseInt(
    document.getElementById("modal-edit-employee-type").value.split(" - ")[0]
  );
  let birthday = document.getElementById("modal-edit-employee-birthday").value;
  let phone = document.getElementById("modal-edit-employee-phone").value;
  let address = document.getElementById("modal-edit-employee-address").value;
  let salary = parseInt(
    document.getElementById("modal-edit-employee-salary").value
  );

  var edit_employee_modal = bootstrap.Modal.getInstance(
    document.getElementById("edit-employee-modal")
  );
  var confirm_edit_employee_modal = bootstrap.Modal.getInstance(
    document.getElementById("confirm-edit-employee-modal")
  );
  let edit_employee_error_mess = document.getElementById(
    "edit-employee-error-mess"
  );

  if (
    name === "" ||
    email === "" ||
    !Number.isInteger(gender) ||
    !Number.isInteger(role) ||
    birthday === "" ||
    phone === "" ||
    address === "" ||
    !Number.isInteger(salary)
  ) {
    edit_employee_error_mess.classList.add("card");
    edit_employee_error_mess.innerHTML = "Vui lòng nhập đầy đủ thông tin";
  } else {
    // edit_employee_modal.hide();
    // confirm_edit_employee_modal.show();
    $("#edit-employee-modal").modal("hide");
    $("#confirm-edit-employee-modal").modal("show");
    document.querySelector(".modal-backdrop").classList.add("d-none");
    edit_employee_error_mess.classList.remove("card");
    edit_employee_error_mess.innerHTML = "";
  }
}

// Call api Cập nhật thông tin nhân viên
function sendEditEmployeeRequest(btn) {
  let id = btn.getAttribute("employee-id");
  // console.log(id);
  let name = document.getElementById("modal-edit-employee-name").value;
  let email = document.getElementById("modal-edit-employee-email").value;
  let gender = 0;
  if (document.getElementById("modal-edit-employee-male").checked) {
    gender = 1;
  } else if (document.getElementById("modal-edit-employee-female").checked) {
    gender = 0;
  }
  let role = parseInt(
    document.getElementById("modal-edit-employee-type").value.split(" - ")[0]
  );
  let birthday = document.getElementById("modal-edit-employee-birthday").value;
  let phone = document.getElementById("modal-edit-employee-phone").value;
  let address = document.getElementById("modal-edit-employee-address").value;
  let salary = parseInt(
    document.getElementById("modal-edit-employee-salary").value
  );
  // console.log(id, name, email, gender, role, birthday, phone, address, salary);
  let url = "../admin/api/employee/update_employee.php";
  let data = {
    id: id,
    email: email,
    name: name,
    phone: phone,
    address: address,
    role: role,
    birthday: birthday,
    salary: salary,
    gender: gender,
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
      refreshPage();
    });
}

// Mở modal xác nhận Xóa nhân viên
function openConfirmDeleteEmployeeModal(id, fullname) {
  document
    .getElementById("btn-confirm-delete-employee")
    .setAttribute("employee-id", id);
  document.getElementById("confirm-delete-employee-modal-name").innerHTML =
    fullname;
}
// Call api Xóa nhân viên
function sendDeleteEmployeeRequest(btn) {
  let id = btn.getAttribute("employee-id");
  // console.log(btn);
  // console.log(id);
  let url = "../admin/api/employee/delete_employee.php?id=" + id;
  fetch(url, {
    method: "DELETE",
  })
    .then((res) => res.json())
    .then((json) => {
      console.log(json["code"]);
      if (json["code"] == 0) {
        getAllEmployeeAccounts();
      }
    });
}
