<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header('Location : ../login.php');
//     exit();
// }
// require_once('../conf/conf.php');
// $getAllUsers = json_decode(getAllUser())->data;

?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>

            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="/">
                <img width="260px" height="36px" style="object-fit: cover;" src="/assets/img/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Bạn muốn tìm gì?" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['name'] ?> <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                            <li>
                                <a class="dropdown-item" href="../logout.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small mt-2 fw-bold text-uppercase px-3">
                            Trang chủ
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-link-custom px-3 active">
                            <span class="me-2"><i class="fas fa-chart-line"></i></span>
                            <span>Tổng quan</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Chức năng
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-link-custom px-3">
                            <span class="me-2"><i class="icon fas fa-store"></i></span>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-link-custom px-3">
                            <span class="me-2"><i class="icon fas fa-shipping-fast"></i></span>
                            <span>Đơn hàng</span>
                        </a>
                    </li>
                    <li class="<?php if (isset($_GET['page']) && $_GET['page'] == 'user') {
                                    echo 'bg-secondary';
                                } ?>">
                        <a href="?page=user" class="nav-link nav-link-custom px-3">
                            <span class="me-2"><i class="icon fas fa-user"></i></span>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <!-- <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">Primary Card</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark h-100">
              <div class="card-body py-5">Warning Card</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Success Card</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-5">Danger Card</div>
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
        </div> -->
            <?php if (isset($_GET['page']) && $_GET['page'] == 'user') { ?>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="bi bi-table me-2"></i></span> Data Table
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead>

                                            <tr>

                                                <th style="text-align: center">Name</th>
                                                <th style="text-align: center">Username</th>
                                                <th style="text-align: center">Email</th>
                                                <th style="text-align: center">Phone</th>
                                                <th style="text-align: center">Address</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($getAllUsers as $user) { ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $user->name ?></td>
                                                    <td style="text-align: center"><?= $user->username ?></td>
                                                    <td style="text-align: center"><?= $user->email ?></td>
                                                    <td style="text-align: center"><?= $user->phone ?></td>
                                                    <td style="text-align: center"><?= $user->address ?></td>
                                                    <td style="text-align: center">
                                                        <!-- <a href="" class="btn btn-danger" data-bs-toggle="modal" data-target="#exampleModal">Delete</a> -->
                                                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $user->userId ?>">
                                                            Delete
                                                        </a>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modal-delete-<?= $user->userId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Xóa tài
                                                                            khoản</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Bạn có muốn xóa tai khoan <p style="font-weight: 700; display: inline-block;">
                                                                            <?= $user->username ?></p> ra khỏi hệ thống không?
                                                                    </div>
                                                                    <form action="./delete_User.php" method="post" enctype="multipart/form">
                                                                        <div class="modal-footer">
                                                                            <input type="hidden" name="delete_idUser" value="<?= $user->userId ?>">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                                                                            <button type="submit" class="btn btn-primary">Có</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end Modal -->
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr> -->
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</body>