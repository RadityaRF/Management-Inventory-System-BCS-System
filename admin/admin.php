<?php 
require 'function.php';
require 'cek.php';

$username = $_SESSION['uname'];
$role = $_SESSION['role'];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ROAD KOFFIE INVENTORY</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">RK INVENTORY</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Stock Persediaan
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Stock Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Stock Keluar
                            </a> 
                            <div class="sb-sidenav-menu-heading">Opsi</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Kelola Hak Akses
                            </a> 
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="medium">Logged in as : <?=$username;?></div>
                        <div class="medium">Role in as : <?=$role;?></div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Kelola Akses</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Akses
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="showtable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>User Akses</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            $ambilsemuadataadmin = mysqli_query($conn, "select * from akses");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadataadmin)){
                                                $uname = $data['username'];
                                                $id = $data['id'];
                                                $psw = $data['password'];
                                                $role = $data['role'];
                                        ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$uname;?></td>
                                                <td><?=$role;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id;?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$id;?>">
                                                        Delete
                                                    </button>
                                                </td>    
                                            </tr>

                                            <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$id;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Akses</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="usernamebaru" value="<?=$uname;?>" class="form-control" placeholder="Username" required>
                                                        <br>
                                                        <input type="password" name="passwordbaru"  value="<?=$psw;?>" class="form-control" placeholder="Password" >
                                                        <br>
                                                        <input type="text" name="rolebaru"  value="<?=$role;?>" class="form-control" placeholder="Role" >
                                                        <br>                                 
                                                        <input type="hidden" name="id" value="<?=$id;?>">
                                                        <button type="submit" class="btn btn-primary" name="updateadmin">Submit</button>
                                                    </div>
                                                </form>   
                                            </div>
                                            </div>
                                        </div>

                                         <!-- Delete Modal -->
                                         <div class="modal fade" id="delete<?=$id;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Akses?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                       Apakah Anda Yakin Menghapus <?=$uname;?>?
                                                       <input type="hidden" name="id" value="<?=$id;?>">
                                                        <br>                   
                                                        <br>                             
                                                        <button type="submit" class="btn btn-danger" name="hapusadmin">Hapus</button>
                                                    </div>
                                                </form>   
                                            </div>
                                            </div>
                                            </div>

                                        <?php
                                            };
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script>
            $(document).ready(function(){
                $('#showtable').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                });
            });
        </script>
    </body>

     <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Akses</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="uname" placeholder="Username" class="form-control" required>
                    <br>
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                    <br>
                    <input type="text" name="role" placeholder="Role" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="addadmin">Submit</button>
                </div>
            </form>
            
           
            
        </div>
        </div>
    </div>

</html>
