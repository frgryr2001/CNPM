<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        input[type="text"]::placeholder {
            text-align: center;
        }
    </style>
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/icon.css">

</head>


<body>
    <?php include('./inc/header.php') ?>
    <div class="container">
        <div class="row justify-content-center mt-3 bg-light p-3">
            <h4>KIỂM TRA THÔNG TIN ĐƠN HÀNG & TÌNH TRẠNG VẬN CHUYỂN</h4>

        </div>
        <div class="row">
            <table class="table table-hover table-bordered mt-4 text-center">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tình trạng vận chuyển</th>
                    </tr>
                </thead>
                <tbody id="rowBody">
                   

                </tbody>
            </table>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đơn hàng</h5>
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
                                        <td>1100$</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "./api/lookup_api.php",
            success: function(result) {
                let data = JSON.parse(result);
                const dataArray = data.data;
                let html = dataArray.map((e) => {
                    let status = '';
                    if (e.status == 0) {
                        status = 'Chờ xác nhận'
                    }
                    if (e.status == 1) {
                        status = 'Đang vận chuyển'
                    }
                    return ` 
                        <tr data-toggle="modal" data-target=".bd-example-modal-lg" onclick="viewOrder(${e.id_order})" style="cursor: pointer;">
                            <th scope="row">${e.id_order}</th>
                            <td>${e.fullname}</td>
                            <td>${e.phone}</td>
                            <td>${e.address}</td>
                            <td class="text-primary">${status}</td>
                        </tr>`
                });
                document.getElementById('rowBody').innerHTML = html.join("")
            }
        });

    });

    function viewOrder(id) {
        let url = "./api/order_detailAPI.php?id=" + id;
        $.get(url, function(data) {
            const data_new = JSON.parse(data).data;
            let total = 0;
            let html = data_new.map(e => {
                total+= e.inital_price * e.qty;
                return `<tr>
                            <th scope="row">
                                <img src="./assets/img/product/${e.image}" alt="">
                            </th>
                            <td style="vertical-align: middle;">${e.product_name}</td>
                            <td style="vertical-align: middle;">${new Intl.NumberFormat().format(e.inital_price)}VND</td>
                            <td style="vertical-align: middle;">${e.qty}</td>
                        </tr>
                        `
            });
           
           let html2 = ` <tr class="total">
                                        <th scope="row"></th>
                                        <td>Total</td>
                                        <td>${new Intl.NumberFormat().format(total)}VND</td>
                                        <td></td>
                            </tr>`
           html.push(html2)
           
            const orderDetail =document.getElementById('orderDetail');
            orderDetail.innerHTML = html.join("");
            
           
                           
            
        })


    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>