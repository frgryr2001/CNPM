<?php
require_once('.././conf/conf.php');
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: ../login.php");
    exit();
} else if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
    header("Location: ../error.php");
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- alertify -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- 
        RTL version
    -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <title>Trang qu???n l??</title>
    <style>
        .table-content {
            padding-left: 270px;
        }

        .pt-60 {
            padding-top: 60px;
        }

        .ml-6 {
            margin-left: 6px;
        }

        .font-size-20 {
            font-size: 20px;
        }

        .row-item {
            cursor: pointer;
        }

        #DataTables_Table_0_filter {
            display: none;
        }

        .ajs-commands,
        .ajs-header {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Header navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>

            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="index.php">
                <!-- <img width="260px" height="36px" style="object-fit: cover;" src="../assets/img/Samsung Logo PNG White.png" alt="logo"> -->
                <!-- TRANG CH??? -->
                <a style="font-size: 32px; line-height: 60px; color: #fff; text-decoration: none;" href="index.php">Trang ch???</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="topNavBar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <!-- <li><a class="dropdown-item" href="#">Th??ng tin t??i kho???n</a></li> -->
                            <li>
                                <a class="dropdown-item" href="../logout.php">????ng xu???t</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div> -->
        </div>
    </nav>

    <!-- // ===================================================================================
    // ----------------------------------------------------------------------------------- -->
    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small mt-2 fw-bold text-uppercase px-3">
                            TRANG CH???
                        </div>
                    </li>
                    <li class="<?php if (!isset($_GET['page'])) {
                                    echo 'bg-secondary';
                                } ?>">
                        <a href="index.php" class="nav-link nav-link-custom px-3">
                            <span class="me-2"><i class="fas fa-chart-line"></i></span>
                            <span>T???NG QUAN</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            CH???C N??NG
                        </div>
                    </li>
                    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0 || $_SESSION['role'] == 1)) { ?>
                        <li class="<?php if (isset($_GET['page']) && $_GET['page'] == 'products') {
                                        echo 'bg-secondary';
                                    } ?>">
                            <a href="?page=products" class="nav-link nav-link-custom px-3">
                                <span class="me-2"><i class="icon fas fa-store"></i></span>
                                <span>S???N PH???M</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 0) { ?>
                        <li class="<?php if (isset($_GET['page']) && $_GET['page'] == 'accounts' && isset($_SESSION['role']) && $_SESSION['role'] == 0) {
                                        echo 'bg-secondary';
                                    } ?>">
                            <a href="?page=accounts" class="nav-link nav-link-custom px-3">
                                <span class="me-2"><i class="icon fas fa-user"></i></span>
                                <span>T??I KHO???N</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 0) { ?>
                        <li class="<?php if (isset($_GET['page']) && $_GET['page'] == 'employees' && isset($_SESSION['role']) && $_SESSION['role'] == 0) {
                                        echo 'bg-secondary';
                                    } ?>">
                            <a href="?page=employees" class="nav-link nav-link-custom px-3">
                                <span class="me-2"><i class="fas fa-user-circle"></i></span>
                                <span>NH??N VI??N</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 0) { ?>
                        <li class="<?php if (isset($_GET['page']) && $_GET['page'] == 'promotions' && isset($_SESSION['role']) && $_SESSION['role'] == 0) {
                                        echo 'bg-secondary';
                                    } ?>">
                            <a href="?page=promotions" class="nav-link nav-link-custom px-3">
                                <span class="me-2"><i class="far fa-bookmark"></i></i></span>
                                <span>KHUY???N M??I</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0 || $_SESSION['role'] == 2)) { ?>
                        <li class="<?php if (isset($_GET['page']) && $_GET['page'] == 'orders' && isset($_SESSION['role']) && $_SESSION['role'] == 0) {
                                        echo 'bg-secondary';
                                    } ?>">
                            <a href="?page=orders" class="nav-link nav-link-custom px-3">
                                <span class="me-2"><i class="fa fa-shopping-cart"></i></i></span>
                                <span>????N H??NG</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    <!-- // ===================================================================================
    // ----------------------------------------------------------------------------------- -->
    <!-- Trang s???n ph???m -->
    <!-- Trang s???n ph???m -->
    <?php if (isset($_GET['page']) && $_GET['page'] == 'products') { ?>
        <div class="row table-content">
            <div class="col-md-12 mb-3">
                <div class="card pt-60">
                    <div class="card-body">
                        <div class="">
                            <div class="my-2 d-flex">
                                <form class="d-flex ms-auto my-3 my-lg-0">
                                    <div class="input-group">
                                        <input class="form-control" type="search" placeholder="B???n mu???n t??m g???" aria-label="Search" />
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <button id="add_product_btn" class="btn btn-primary ms-2">Th??m s???n ph???m</button>
                            </div>
                            <table id="" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>T??n s???n ph???m</th>
                                        <th>Lo???i s???n ph???m</th>
                                        <th>Chi ti???t</th>
                                        <th>Gi??</th>
                                        <th>Sale</th>
                                        <th>S??? l?????ng b??n ra</th>
                                        <th>B???o h??nh</th>
                                        <th>Thao t??c</th>
                                    </tr>
                                </thead>
                                <tbody id="product-list" class="product-list">
                                    <?php
                                    $product_array = get_product();
                                    foreach ($product_array as $key => $value) {
                                        $category_res = get_category_byID($value['id_category']);
                                        echo '<tr>';
                                        echo '<td > ' . $value['product_name'] . '</td>';
                                        echo '<td >' . $category_res['name'] . '</td>';
                                        echo '<td >' . $value['description'] . '</td>';
                                        echo '<td >' . $value['inital_price'] . '</td>';
                                        echo '<td >' . $value['sale_off'] . '</td>';
                                        echo '<td >' . $value['sell_quantity'] . '</td>';
                                        echo '<td >' . $value['guarantee'] . '</td>';
                                        echo '<td>
                                                            <span class="me-2 font-size-20" onclick="editProduct(this)" style = "cursor : pointer;">
                                                            <i class="fas fa-edit"></i></span>
                                                            <span class="font-size-20" onclick="deleteProduct(' . $value['id'] . ')"><i class="fas fa-trash-alt" style = "cursor : pointer;"></i></span>
                                                      </td>';
                                        echo '</tr>';
                                    };
                                    ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const addProduct = document.getElementById("add_product_btn")
            // console.log(addProduct);
            addProduct.onclick = function() {
                alertify.confirm(`
                    <form id = "form_product" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_name">T??n s???n ph???m</label>
                            <input type="text" class="form-control" id="product_name" placeholder="T??n s???n ph???m">
                        </div>
                        <div class="form-group">
                            <label for="id_category">Lo???i s???n ph???m</label>
                            <select class="form-control" id="id_category">
                            <?php
                            $category_array = get_category();
                            foreach ($category_array as $key => $value) {
                                echo '<option value = "' . $value['id_category'] . '">' . $value['name'] . '</option>';
                            };
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">M?? t??? s???n ph???m</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inital_price">Gi??</label>
                            <input type="number" class="form-control" id="inital_price" placeholder="Gi??">
                        </div>
                        <div class="form-group">
                            <label for="sale_off">Gi???m gi??</label>
                            <input type="number" class="form-control" id="sale_off" placeholder="% gi???m" >
                        </div>
                        <div class="form-group">
                            <label for="sell_quantity">S??? l?????ng b??n ra</label>
                            <input type="number" class="form-control" id="sell_quantity" placeholder="S??? l?????ng">
                        </div>
                        <div class="form-group">
                            <label for="guarantee">b???o h??nh</label>
                            <select class="form-control" id="guarantee">
                            <option>1 th??ng</option>
                            <option>3 th??ng</option>
                            <option>6 th??ng</option>
                            <option>1 n??m</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">H??nh ???nh minh h???a</label>
                            <input type="file" class="form-control-file" id="image" name= "image" multiple>
                        </div>
                    </form>
                    `,
                    function() {

                        let url = '../admin/api/product/product_api.php'
                        let formProduct = document.querySelector('#form_product')
                        // formProduct.addEventListener('submit',function(e){
                        //     e.preventDefault();
                        let formData = new FormData();
                        let product_name = document.querySelector('#product_name').value;
                        let id_category = document.querySelector('#id_category').value;
                        let description = document.querySelector('#description').value;
                        let inital_price = document.querySelector('#inital_price').value;
                        let sale_off = document.querySelector('#sale_off').value;
                        let sell_quantity = document.querySelector('#sell_quantity').value;
                        let guarantee = document.querySelector('#guarantee').value;
                        let image = document.querySelector('#image');
                        let totalImages = image.files.length;
                        // console.log(totalImages);
                        // console.log({image});
                        formData.append('product_name', product_name)
                        formData.append('id_category', id_category)
                        formData.append('description', description)
                        formData.append('inital_price', inital_price)
                        formData.append('sale_off', sale_off)
                        formData.append('sell_quantity', sell_quantity)
                        formData.append('guarantee', guarantee)
                        for (var index = 0; index < totalImages; index++) {
                            formData.append("image", image.files[index]);
                        }
                        // formData.append('image', image.files[0])
                        // console.log({formData})
                        $.ajax({
                            url,
                            method: 'POST',
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            data: formData
                        }).done(response => {
                            console.log(response);
                            if (!response.status) {
                                toastr.error(response.message);
                            } else {
                                toastr.success(response.message);
                                // window.location.href = response.redirect;
                                // window.location.reload();
                            }
                        });
                        // })
                    },
                    function() {
                        alertify.error('Cancel');
                    }
                );
            };

            function editProduct(spanElement) {
                tbodyElement = spanElement.parentElement.parentElement;
                tdElement = tbodyElement.children;
                alertify.confirm(`
                    <form id = "form_product" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_name">T??n s???n ph???m</label>
                            <input type="text" class="form-control" id="product_name" placeholder="T??n s???n ph???m" value ="${tdElement[0].innerHTML}">
                            <input type="hidden" class="form-control" id="old_product_name" value ="${tdElement[0].innerHTML}">
                        </div>
                        <div class="form-group">
                            <label for="id_category_edit">Lo???i s???n ph???m</label>
                            <select class="form-control" id="id_category_edit">
                            <?php
                            $category_array = get_category();
                            foreach ($category_array as $key => $value) {
                                echo '<option value = "' . $value['id_category'] . '">' . $value['name'] . '</option>';
                            };
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">M?? t??? s???n ph???m</label>
                            <textarea class="form-control" id="description" rows="3">${tdElement[2].innerHTML}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inital_price">Gi??</label>
                            <input type="number" class="form-control" id="inital_price" placeholder="Gi??" value = "${tdElement[3].innerHTML}">
                        </div>
                        <div class="form-group">
                            <label for="sale_off">Gi???m gi??</label>
                            <input type="number" class="form-control" id="sale_off" placeholder="Gi?? gi???m" value = "${tdElement[4].innerHTML}">
                        </div>
                        <div class="form-group">
                            <label for="sell_quantity">S??? l?????ng b??n ra</label>
                            <input type="number" class="form-control" id="sell_quantity" placeholder="S??? l?????ng" value ="${tdElement[5].innerHTML}">
                        </div>
                        <div class="form-group">
                            <label for="guarantee">b???o h??nh</label>
                            <select class="form-control" id="guarantee">
                            <option>1 th??ng</option>
                            <option>3 th??ng</option>
                            <option>6 th??ng</option>
                            <option>1 n??m</option>
                            <option selected>${tdElement[6].innerHTML}</option>
                            </select>
                        </div>
                      
                    </form>
                `,
                    function() {
                        let url = '../admin/api/product/product_edit_api.php';
                        let _product_name = document.querySelector('#product_name').value;
                        let _id_category_edit = document.querySelector('#id_category_edit').value
                        let old_product_name = document.querySelector('#old_product_name').value
                        let _description = document.querySelector('#description').value;
                        let _inital_price = document.querySelector('#inital_price').value;
                        let _sale_off = document.querySelector('#sale_off').value;
                        let _sell_quantity = document.querySelector('#sell_quantity').value;
                        let _guarantee = document.querySelector('#guarantee').value;
                        console.log({
                            _product_name,
                            _id_category_edit,
                            old_product_name,
                            _description,
                            _inital_price,
                            _sale_off,
                            _sell_quantity,
                            _guarantee
                        })

                        $.ajax({
                            url,
                            method: 'POST',
                            data: {
                                "old_product_name": old_product_name.trim(),
                                "product_name": _product_name.trim(),
                                "id_category": _id_category_edit.trim(),
                                "description": _description.trim(),
                                "inital_price": _inital_price.trim(),
                                "sale_off": _sale_off.trim(),
                                "sell_quantity": _sell_quantity.trim(),
                                "guarantee": _guarantee.trim()
                            }
                        }).done(response => {
                            console.log({
                                response
                            });
                            if (!response.status) {
                                toastr.error(response.message);
                            } else {
                                toastr.success(response.message);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        });
                    },
                    function() {
                        alertify.error('Cancel');
                    }
                );
            };

            function deleteProduct(id) {
                alertify.confirm(`B???n c?? ch???c mu???n x??a s???n ph???m ?`,
                    function() {
                        let url = '../admin/api/product/product_remove_api.php';
                        $.ajax({
                            url,
                            method: 'POST',
                            data: {
                                id
                            }
                        }).done(response => {
                            console.log(response);
                            if (!response.status) {
                                toastr.error(response.message);
                            } else {
                                toastr.success(response.message);
                                window.location.reload();
                            }
                        }).fail((a, b, c) => {
                            console.log("Failed!");
                        });
                    },
                    function() {
                        alertify.error('Cancel');
                    }
                );
            };
        </script>
        <?php
    }

    // ===================================================================================
    // -----------------------------------------------------------------------------------
    // Trang T??i kho???n 
    else if (isset($_GET['page']) && $_GET['page'] == 'accounts') {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
        ?>
            <div class="row table-content">
                <div class="col-md-12 mb-3">
                    <div class="card pt-60">
                        <!-- <div class="card-header">
                    </div> -->
                        <div class="card-body">
                            <div class="">
                                <div class="my-2 d-flex">
                                    <form class="d-flex ms-auto my-3 my-lg-0">
                                        <div class="input-group">
                                            <input class="form-control" type="search" placeholder="B???n mu???n t??m g???" aria-label="Search" />
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <table id="" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>H??? t??n</th>
                                            <th>Email</th>
                                            <th>S??? ??i???n tho???i</th>
                                            <th>?????a ch???</th>
                                        </tr>
                                    </thead>
                                    <tbody id="customer-account-list">
                                        <!-- <tr>
                                        <td>Nguy???n Th??? Tr?????ng</td>
                                        <td>nguyenthetruong100621@gmail.com</td>
                                        <td>Nh??n vi??n b??n h??ng</td>
                                    </tr> -->
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    // Trang Qu???n l?? nh??n vi??n
    else if (isset($_GET['page']) && $_GET['page'] == 'employees') {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 0) { ?>
            <div class="row table-content">
                <div class="col-md-12 mb-3">
                    <div class="card pt-60">
                        <!-- <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data Table
                        </div> -->
                        <div class="card-body">
                            <div class="">
                                <div class="my-2 d-flex">
                                    <form class="d-flex ms-auto my-3 my-lg-0">
                                        <div class="input-group">
                                            <input class="form-control" type="search" placeholder="B???n mu???n t??m g???" aria-label="Search" />
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <button data-bs-toggle="modal" data-bs-target="#add-employee-modal" class="btn btn-primary ms-2">Th??m nh??n vi??n</button>
                                </div>
                                <table id="" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>H??? t??n</th>
                                            <th>Email</th>
                                            <th>Ch???c v???</th>
                                            <th>Thao t??c</th>
                                        </tr>
                                    </thead>
                                    <tbody id="employee-account-list">
                                        <!-- <tr>
                                            <td>Nguy???n Th??? Tr?????ng</td>
                                            <td>nguyenthetruong100621@gmail.com</td>
                                            <td>Nh??n vi??n b??n h??ng</td>
                                        </tr> -->
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    // Trang Qu???n l?? khuy???n m??i
    else if (isset($_GET['page']) && $_GET['page'] == 'promotions') {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
        ?>
            <div class="row table-content">
                <div class="col-md-12 mb-3">
                    <div class="card pt-60">
                        <!-- <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data Table
                        </div> -->
                        <div class="card-body">
                            <div class="">
                                <div class="my-2 d-flex">
                                    <form class="d-flex ms-auto my-3 my-lg-0">
                                        <div class="input-group">
                                            <input class="form-control" type="search" placeholder="B???n mu???n t??m g???" aria-label="Search" />
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <button onclick="bindCategoryDataToModal();" data-bs-toggle="modal" data-bs-target="#add-promotion-modal" class="btn btn-primary ms-2">Th??m khuy???n m??i</button>
                                </div>
                                <table id="" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>S???n ph???m</th>
                                            <th>Danh m???c</th>
                                            <th>Khuy???n m??i</th>
                                            <th>H???n khuy???n m??i</th>
                                        </tr>
                                    </thead>
                                    <tbody id="promotion-list">
                                        <!-- <tr>
                                            <td>Nguy???n Th??? Tr?????ng</td>
                                            <td>nguyenthetruong100621@gmail.com</td>
                                            <td>Nh??n vi??n b??n h??ng</td>
                                        </tr> -->
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    // Trang Qu???n l?? don hang
    else if (isset($_GET['page']) && $_GET['page'] == 'orders') {
        if (isset($_SESSION['role']) && ($_SESSION['role'] == 0 || $_SESSION['role'] == 2)) {
        ?>
            <div class="row table-content">
                <div class="col-md-12 mb-3">
                    <div class="card pt-60">
                        <!-- <div class="card-header">
                                <span><i class="bi bi-table me-2"></i></span> Data Table
                            </div> -->
                        <div class="card-body">
                            <div class="">
                                <div class="my-2 d-flex">
                                    <form class="d-flex ms-auto my-3 my-lg-0">
                                        <div class="input-group">
                                            <input class="form-control" type="search" placeholder="B???n mu???n t??m g???" aria-label="Search" />
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <table id="" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>M?? ????n h??ng</th>
                                            <th>Tr???ng th??i</th>
                                            <th>Thao t??c</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("../conf/db.php");

                                        $conn = open_database();
                                        $sql = "SELECT * FROM `order`";
                                        $result = $conn->query($sql);

                                        $orders = array();
                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['status'] == 0) {
                                                $orders[] = $row;
                                            }
                                        }
                                        foreach ($orders as $value) {
                                            $id_order = $value['id_order'];
                                            $status = (int)$value['status'];
                                            $id_order = $value['id_order'];
                                            if ($status == 0) {
                                                $statusStr = "????n h??ng ch??a duy???t";
                                            }
                                            if ($status == 1) {
                                                $statusStr = "????n h??ng ???? duy???t";
                                            }
                                            if ($status == 2) {
                                                $statusStr = "????n h??ng ???? t??? ch???i";
                                            }
                                            echo "<tr data-toggle='modal' data-target='.bd-example-modal-lg' style='cursor: pointer;' onclick='detailOrder($id_order)' id='tr_$id_order'>";
                                            echo "<td>$id_order</td>";
                                            echo "<td>$statusStr</td>";

                                            echo "<td>  
    
                                                <button onclick='tinOrder($id_order, 1)' class='btn btn-outline-primary'>Duy???t</button>
                                                <button onclick='tinOrder($id_order, 2)' class='btn btn-outline-danger'>T??? ch???i</button>
    
                                                    </td>";

                                            echo "</tr>";
                                        }
                                        ?>
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">????n h??ng</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Product name</th>
                                                                    <th>Price</th>
                                                                    <th>quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="orderDetail">

                                                                <tr class="total">
                                                                    <th scope="row"></th>
                                                                    <td>Total</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    // Trang t???ng quan
    else {
        ?>
        <main class="mt-5 pt-3">
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <h4>Dashboard</h4>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-header">Th???ng k?? t??nh tr???ng ????n h??ng</div>
                            <div class="card-body d-flex flex-column justify-content-center">
                                <div class="mb-3" id="oder-status-0">Ch??a duy???t: <span id="num-of-not-approved-orders">0</span></div>
                                <div id="oder-status-0">???? duy???t: <span id="num-of-approved-orders">0</span></div>
                            </div>
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card bg-secondary text-white h-100">
                            <div class="card-header">Th???ng k?? s???n ph???m ???? b??n</div>
                            <div class="card-body py-5">S??? l?????ng s???n ph???m ???? b??n: <span id="num-of-product-sold">0</span></div>
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card bg-success text-white h-100">
                            <div class="card-header">Th???ng k?? doanh thu</div>
                            <div class="card-body py-5">T???ng doanh thu: <span id="num-of-total-sales"></span></div>
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header">
                                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                                Area Chart Example
                            </div>
                            <div class="card-body">
                                <canvas class="chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header">
                                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                                Area Chart Example
                            </div>
                            <div class="card-body">
                                <canvas class="chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>
            </div>
        </main>

        <!-- ############### MODAL ############# -->

        <!-- --------------------------------------------------------------------------------------- -->
        <!-- ############### NH??N VI??N ############# -->
        <!-- Th??m nh??n vi??n modal -->
        <div class="modal fade" id="add-employee-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??m nh??n vi??n m???i</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="modal-add-employee-name" placeholder="Enter email" name="modal-add-employee-name">
                                    <label for="modal-add-employee-name">H??? t??n</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-add-employee-email" name="modal-add-employee-email" type="email" class="form-control" placeholder="Nh???p email">
                                    <label for="modal-add-employee-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ms-0">
                            <div class="col d-flex align-items-center px-0">
                                <div class="form-check form-check-inline p-0">
                                    <div class="d-flex">
                                        <label class="control-label" for="modal-add-employee-sex">Gi???i t??nh:</label>
                                        <div class="">
                                            <label class="radio-inline mx-3 mb-0"><input id="modal-add-employee-male" class="me-2" type="radio" name="modal-add-employee-sex" value="1">Nam</label>
                                            <label class="radio-inline mb-0"><input id="modal-add-employee-female" class="me-2" type="radio" name="modal-add-employee-sex" value="0">N???</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3 ml-6">
                                    <select name="modal-add-employee-type" class="form-control form-select" id="modal-add-employee-type">
                                        <option>1 - Nh??n vi??n kho</option>
                                        <option>2 - Nh??n vi??n b??n h??ng</option>
                                    </select>
                                    <label for="modal-add-employee-type">Ch???c v???</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="date" name="modal-add-employee-birthday" id="modal-add-employee-birthday" class="form-control">
                                    <label for="modal-add-employee-birthday">Ng??y sinh (MM/dd/yyyy)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-add-employee-phone" name="modal-add-employee-phone" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-add-employee-phone">S??? ??i???n tho???i</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-add-employee-address" name="modal-add-employee-address" type="text" class="form-control" placeholder="Nh???p ?????a ch???">
                                    <label for="modal-add-employee-address">?????a ch???</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-add-employee-salary" name="modal-add-employee-salary" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-add-employee-salary">L????ng</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div id="add-employee-error-mess" class="text-center alert-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">H???y b???</button>
                        <button onclick=" addEmployeeAccount();" type="button" class="btn btn-primary">Th??m</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Th??ng b??o th??m nh??n vi??n th??nh c??ng modal -->
        <div class="modal fade" id="add-employee-success-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="add-model-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??m nh??n vi??n th??nh c??ng</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-footer text-center">
                        <button onclick="refreshPage();" data-bs-dismiss="modal" type="button" class="btn btn-success">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ch???nh s???a th??ng tin nh??n vi??n modal -->
        <div class="modal fade" data-bs-backdrop="static" id="edit-employee-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ch???nh s???a th??ng tin nh??n vi??n</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="modal-edit-employee-name" placeholder="Enter email" name="modal-edit-employee-name">
                                    <label for="modal-edit-employee-name">H??? t??n</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-edit-employee-email" name="modal-edit-employee-email" type="email" class="form-control" placeholder="Nh???p email">
                                    <label for="modal-edit-employee-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ms-0">
                            <div class="col d-flex align-items-center px-0">
                                <div class="form-check form-check-inline p-0">
                                    <div class="d-flex">
                                        <label class="control-label" for="modal-edit-employee-sex">Gi???i t??nh:</label>
                                        <div class="">
                                            <label class="radio-inline mx-3 mb-0"><input id="modal-edit-employee-male" class="me-2" type="radio" name="modal-edit-employee-sex" value="1">Nam</label>
                                            <label class="radio-inline mb-0"><input id="modal-edit-employee-female" class="me-2" type="radio" name="modal-edit-employee-sex" value="0">N???</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3 ml-6">
                                    <select name="modal-edit-employee-type" class="form-control form-select" id="modal-edit-employee-type">
                                        <option>1 - Nh??n vi??n kho</option>
                                        <option>2 - Nh??n vi??n b??n h??ng</option>
                                    </select>
                                    <label for="modal-edit-employee-type">Ch???c v???</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="date" name="modal-edit-employee-birthday" id="modal-edit-employee-birthday" class="form-control">
                                    <label for="modal-edit-employee-birthday">Ng??y sinh (MM/dd/yyyy)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-edit-employee-phone" name="modal-edit-employee-phone" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-edit-employee-phone">S??? ??i???n tho???i</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-edit-employee-address" name="modal-edit-employee-address" type="text" class="form-control" placeholder="Nh???p ?????a ch???">
                                    <label for="modal-edit-employee-address">?????a ch???</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input id="modal-edit-employee-salary" name="modal-edit-employee-salary" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-edit-employee-salary">L????ng</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div id="edit-employee-error-mess" class="text-center alert-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">H???y b???</button>
                        <button onclick="verifyEditEmployeeInfo();" id="btn-edit-employee" type="button" class="btn btn-primary">Ch???nh s???a</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- X??c nh???n ch???nh s???a th??ng tin nh??n vi??n modal -->
        <div class="modal fade" id="confirm-edit-employee-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">X??c nh???n ch???nh s???a th??ng tin nh??n vi??n</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">B???n c?? ch???c mu???n ch???nh s???a th??ng tin c???a nh??n vi??n <strong id="confirm-edit-employee-modal-name"></strong> kh??ng?</div>
                    <div class="modal-footer text-center">
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger">H???y b???</button>
                        <button id="btn-confirm-edit-employee" onclick="sendEditEmployeeRequest(this);" employee-id="0" data-bs-dismiss="modal" type="button" class="btn btn-primary">?????ng ??</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Xem th??ng tin nh??n vi??n chi ti???t modal -->
        <div class="modal fade" id="view-detail-employee-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??ng tin chi ti???t</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled type="text" class="form-control" id="modal-view-employee-detail-name" placeholder="Enter email" name="modal-view-employee-detail-name">
                                    <label for="modal-view-employee-detail-name">H??? t??n</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-employee-detail-email" name="modal-view-employee-detail-email" type="email" class="form-control" placeholder="Nh???p email">
                                    <label for="modal-view-employee-detail-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ms-0">
                            <div class="col d-flex align-items-center px-0">
                                <div class="form-check form-check-inline p-0">
                                    <div class="d-flex">
                                        <label class="control-label" for="modal-view-employee-detail-sex">Gi???i t??nh:</label>
                                        <div class="">
                                            <label class="radio-inline mx-3 mb-0"><input disabled id="modal-view-employee-detail-male" class="me-2" type="radio" name="modal-view-employee-detail-sex" value="1">Nam</label>
                                            <label class="radio-inline mb-0"><input disabled id="modal-view-employee-detail-female" class="me-2" type="radio" name="modal-view-employee-detail-sex" value="0">N???</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3 ml-6">
                                    <select disabled name="modal-view-employee-detail-type" class="form-control form-select" id="modal-view-employee-detail-type">
                                        <option>1 - Nh??n vi??n kho</option>
                                        <option>2 - Nh??n vi??n b??n h??ng</option>
                                    </select>
                                    <label for="modal-view-employee-detail-type">Ch???c v???</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled type="date" name="modal-view-employee-detail-birthday" id="modal-view-employee-detail-birthday" class="form-control">
                                    <label for="modal-view-employee-detail-birthday">Ng??y sinh (MM/dd/yyyy)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-employee-detail-phone" name="modal-view-employee-detail-phone" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-view-employee-detail-phone">S??? ??i???n tho???i</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-employee-detail-address" name="modal-view-employee-detail-address" type="text" class="form-control" placeholder="Nh???p ?????a ch???">
                                    <label for="modal-view-employee-detail-address">?????a ch???</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-employee-detail-salary" name="modal-view-employee-detail-salary" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-view-employee-detail-salary">L????ng</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- X??c nh???n x??a th??ng tin nh??n vi??n modal -->
        <div class="modal fade" id="confirm-delete-employee-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">X??c nh???n x??a nh??n vi??n</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">B???n c?? ch???c mu???n x??a nh??n vi??n <strong id="confirm-delete-employee-modal-name"></strong> kh??ng?</div>
                    <div class="modal-footer text-center">
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger">H???y b???</button>
                        <button id="btn-confirm-delete-employee" onclick="sendDeleteEmployeeRequest(this);" data-bs-dismiss="modal" type="button" class="btn btn-primary">?????ng ??</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- --------------------------------------------------------------------------------- -->
        <!-- ############### T??I KHO???N ############# -->
        <!-- Xem th??ng tin chi ti???t c???a kh??ch h??ng modal -->
        <div class="modal fade" id="view-detail-customer-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??ng tin chi ti???t</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled type="text" class="form-control" id="modal-view-customer-detail-name" placeholder="Enter email" name="modal-view-customer-detail-name">
                                    <label for="modal-view-customer-detail-name">H??? t??n</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-customer-detail-email" name="modal-view-customer-detail-email" type="email" class="form-control" placeholder="Nh???p email">
                                    <label for="modal-view-customer-detail-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ms-0">
                            <div class="col d-flex align-items-center px-0">
                                <div class="form-check form-check-inline p-0">
                                    <div class="d-flex">
                                        <label class="control-label" for="modal-view-customer-detail-sex">Gi???i t??nh:</label>
                                        <div class="">
                                            <label class="radio-inline mx-3 mb-0"><input disabled id="modal-view-customer-detail-male" class="me-2" type="radio" name="modal-view-customer-detail-sex" value="1">Nam</label>
                                            <label class="radio-inline mb-0"><input disabled id="modal-view-customer-detail-female" class="me-2" type="radio" name="modal-view-customer-detail-sex" value="0">N???</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled type="date" name="modal-view-customer-detail-birthday" id="modal-view-customer-detail-birthday" class="form-control">
                                    <label for="modal-view-customer-detail-birthday">Ng??y sinh (MM/dd/yyyy)</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-customer-detail-address" name="modal-view-customer-detail-address" type="text" class="form-control" placeholder="Nh???p ?????a ch???">
                                    <label for="modal-view-customer-detail-address">?????a ch???</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input disabled id="modal-view-customer-detail-phone" name="modal-view-customer-detail-phone" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                                    <label for="modal-view-customer-detail-phone">S??? ??i???n tho???i</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------------------------------------------------------- -->
        <!-- ############### KHUY???N M??I ############# -->
        <!-- Th??m khuy???n m??i modal -->
        <div class="modal fade" id="add-promotion-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??m khuy???n m??i</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating ms-0 mb-3 mt-3 ml-6">
                            <select changed="0" onchange="getCorrespondingProduct(this)" name="modal-add-promotion-category-name" class="form-control form-select" id="modal-add-promotion-category-name">
                            </select>
                            <label for="modal-add-promotion-category-name">Danh m???c</label>
                        </div>
                        <div class="form-floating ms-0 mb-3 mt-3 ml-6">
                            <select onchange="setProductIdAttribute(this);" name="modal-add-promotion-product-name" class="form-control form-select" id="modal-add-promotion-product-name">
                            </select>
                            <label for="modal-add-promotion-product-name">S???n ph???m</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input id="modal-add-promotion-quantity" name="modal-add-promotion-quantity" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                            <label for="modal-add-promotion-quantity">Khuy???n m??i (%)</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="date" name="modal-add-promotion-period" id="modal-add-promotion-period" class="form-control">
                            <label for="modal-add-promotion-period">H???n khuy???n m??i (mm/dd/yyyy)</label>
                        </div>
                        <div class="form-group">
                            <div id="add-promotion-error-mess" class="text-center alert-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">H???y b???</button>
                        <button onclick=" addPromotion();" type="button" class="btn btn-primary">Th??m</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Th??ng b??o th??m khuy???n m??i th??nh c??ng modal -->
        <div class="modal fade" id="add-promotion-success-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="add-model-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??m khuy???n m??i th??nh c??ng</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-footer text-center">
                        <button onclick="refreshPage();" data-bs-dismiss="modal" type="button" class="btn btn-success">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Xem th??ng tin khuy???n m??i chi ti???t modal -->
        <div class="modal fade" id="view-promotion-detail-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Th??ng tin khuy???n m??i</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating ms-0 mb-3 mt-3 ml-6">
                            <input disabled class="form-control" type="text" name="modal-view-promotion-detail-product-name" id="modal-view-promotion-detail-product-name">
                            <label for="modal-view-promotion-detail-product-name">S???n ph???m</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input id="modal-view-promotion-detail-quantity" name="modal-view-promotion-detail-quantity" type="number" class="form-control" placeholder="Nh???p s??? ??i???n tho???i">
                            <label for="modal-view-promotion-detail-quantity">Khuy???n m??i (%)</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="date" name="modal-view-promotion-detail-period" id="modal-view-promotion-detail-period" class="form-control">
                            <label for="modal-view-promotion-detail-period">H???n khuy???n m??i (mm/dd/yyyy)</label>
                        </div>
                        <div class="form-group">
                            <div id="edit-promotion-error-mess" class="text-center alert-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="validateEditPromotionInput();" type="button" class="btn btn-primary">Ch???nh s???a</button>
                        <button data-bs-toggle="modal" data-bs-target="#confirm-delete-promotion-modal" type="button" class="btn btn-danger">X??a</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- X??c nh???n ch???nh s???a th??ng tin khuy???n m??i modal -->
        <div class="modal fade" id="confirm-edit-promotion-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">X??c nh???n ch???nh s???a th??ng tin khuy???n m??i</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">B???n c?? ch???c mu???n ch???nh s???a th??ng tin khuy???n m??i c???a s???n ph???m <strong id="confirm-edit-promotion-modal-name"></strong> kh??ng?</div>
                    <div class="modal-footer text-center">
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger">H???y b???</button>
                        <button id="btn-confirm-edit-promotion" onclick="sendEditPomotionRequest(this);" data-bs-dismiss="modal" type="button" class="btn btn-primary">?????ng ??</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- X??c nh???n x??a th??ng tin khuy???n m??i modal -->
        <div class="modal fade" id="confirm-delete-promotion-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">X??c nh???n x??a nh??n vi??n</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">B???n c?? ch???c mu???n x??a khuy???n m??i c???a s???n ph???m <strong id="confirm-delete-promotion-modal-name"></strong> kh??ng?</div>
                    <div class="modal-footer text-center">
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger">H???y b???</button>
                        <button id="btn-confirm-delete-promotion" onclick="sendDeletePromotionRequest(this);" data-bs-dismiss="modal" type="button" class="btn btn-primary">?????ng ??</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
        <script src="./js/jquery-3.5.1.js"></script>
        <script src="./js/jquery.dataTables.min.js"></script>
        <script src="./js/dataTables.bootstrap5.min.js"></script>
        <script src="./js/script.js"></script>
        <script src="./js/employee.js"></script>
        <script src="./js/customer.js"></script>
        <script src="./js/promotion.js"></script>
        <script src="./js/statistical.js"></script>

        <script src="./js/tin_order.js"></script>
</body>