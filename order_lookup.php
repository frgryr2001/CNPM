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
            <form class="form-inline mt-3" action="">
                <label for="sdt" class="mr-sm-2 mb-2 font-weight-bold">Số điện thoại:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="(Bắt buộc)" id="sdt">
                <label for="mdh" class="mr-sm-2 mb-2 font-weight-bold">Mã đơn hàng:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="(Bắt buộc)" id="mdh">
                <button type="submit" class="text-center btn btn-danger mb-2 pl-4 pr-4">KIỂM TRA</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-bordered mt-4 text-center">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Sản phẩm mua</th>
                        <th scope="col">Tình trạng vận chuyển</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-toggle="modal" data-target=".bd-example-modal-lg">
                        <th scope="row">Mh001</th>
                        <td>020402340</td>
                        <td>TP.HCM</td>
                        <td>Iphone 12 pro max</td>
                        <td class="text-primary">Đang xử lí đơn hàng</td>
                    </tr>

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
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Product 1</td>
                                        <td>100$</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Product 2</td>
                                        <td>100$</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Product 3</td>
                                        <td>100$</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Product 4</td>
                                        <td>100$</td>
                                        <td>4</td>
                                    </tr>
                                    <tr class="total">
                                        <th scope="row">5</th>
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

</html>