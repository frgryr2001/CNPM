<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/icon.css">
    <title>Lịch sử mua hàng</title>
    <style>
        /* @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700); */

        /* body {
            font-family: 'Calibri', sans-serif !important;
            
        } */
        .mb-10 {
            margin-bottom: 10px
        }

        .mt-100 {
            margin-top: 100px
        }

        .modal-content {
            border-radius: 1px
        }

        .modal-header {
            border-bottom: 1px solid #ffffff
        }

        .btn:focus {
            box-shadow: 0 0 0 0.2rem rgb(255, 255, 255)
        }

        .close:focus {
            box-shadow: 0 0 0 0.2rem rgb(255, 255, 255)
        }

        .btn.btn-out {
            outline: 1px solid #fff;
            outline-offset: -5px
        }

        .btn {
            border-radius: 2px;
            text-transform: capitalize;
            font-size: 15px;
            padding: 10px 19px;
            cursor: pointer;
            color: #fff
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgb(255, 255, 255)
        }

        .form-control {
            border-radius: 1px !important
        }
    </style>
</head>

<body>
    <?php include('./inc/header.php') ?>
    <div class="container">
        <div class="row justify-content-center mt-3 bg-light p-3">
            <h4>LỊCH SỬ MUA HÀNG</h4>

        </div>
        <div class="row">
            <table class="table table-hover table-bordered mt-4 text-center">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Đánh giá sản phẩm</th>
                    </tr>
                </thead>
                <tbody id="rowBody">
                    <tr data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer;" >
                        <th scope="row">
                            <img src="./assets/img/product/laptop1.webp" alt="" width="50%">
                        </th>
                        <td>lê hoàng nhân</td>
                        <td>020402340</td>
                        <td>TP.HCM</td>
                        <td>11/11/1123</td>
                        <td class="text-primary">
                            <div class="container d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-md-6"> <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Review</button></div>
                                </div>
                            </div>
                           
                        </td>
                    </tr>

                </tbody>
                <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Đánh giá sản phẩm</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div style="display:inline-block;" id="rateYo"></div>
                                            <input type="hidden" name="rating" id="rating_input" />
                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                            <button class="btn btn-out btn-primary btn-square" data-dismiss="modal" id="review">Save Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </table>
        </div>
    </div>
</body>
<script>
   
    $(document).ready(function() {
        $.ajax({
            url: "./api/historyAPI.php",
            success: function(result) {
                let data = JSON.parse(result);
                const dataArray = data.data;
                let html = dataArray.map((e) => {
                    return ` 
                    <tr data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer;" >
                        <th scope="row">
                            <img src="./assets/img/product/${e.image}" alt="" width="50%">
                        </th>
                        <td>${e.product_name}</td>
                        <td>${e.inital_price}</td>
                        <td>${e.qty}</td>
                        <td>${e.time}</td>
                        <td class="text-primary">
                            <div class="container d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-md-6"> <button type="button" id="off_btn" class="btn btn-danger btn-lg" data-toggle="modal"  onclick="loadData(${e.id});" data-target="#myModal">Review</button></div>
                                </div>
                            </div>
                            
                        </td>
                    </tr>`
                    
                });
                document.getElementById('rowBody').innerHTML = html.join("")
            }
        });
    
    });
    function loadData(id) {
        
        $(function() {
            $("#rateYo").rateYo({
                onSet: function(rating, rateYoInstance) {
                    rating = Math.ceil(rating);
                    $('#rating_input').val(rating); //setting up rating value to hidden field
                    
                    document.getElementById('review').addEventListener('click', () => {
                        var formData = { id: id, rate: rating };
                        $.ajax({
                            url: "./api/updateRate.php",
                            type: "POST",
                            data: formData,
                            success: function (res) {
                                alert('Cám ơn bạn đã đánh giá sản phẩm');
                            },
                        });
                    })
                }
            });
        });
    }
</script>

</html>