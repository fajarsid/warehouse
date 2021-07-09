<?php
    require 'function.php';
    require 'validasi.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Administator</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">WAREHOUSE</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>

        <a class="nav-link navbar-nav ml-auto" href="exit.php">
            <div class="sb-nav-link-icon"> <i class="fas fa-sign-out-alt"></i></div>
            Exit
        </a>
        <!-- Navbar -->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            Data Barang
                        </a>
                        <a href="masuk.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="far fa-list-alt"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-external-link-square-alt"></i></div>
                            Barang Keluar
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">


                    <!-- Tabels -->
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                <i class="fas fa-plus-square"></i> Tambah Data
                            </button>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display nowrap" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th><em class="fa fa-cog"></em></th>
                                            <th class="hidden-xs">NO</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Jenis Reject</th>
                                            <th>Jumlah Reject</th>
                                            <th>Jumlah Bagus</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $databarang = mysqli_query($connect, "SELECT * FROM masuk");
                                        $i = 1;
                                        while($data = mysqli_fetch_array($databarang)){
                                            $namabarang = $data['namabarang'];
                                            $jenis = $data['jenis'];
                                            $jumlah = $data['jumlah'];
                                            $jreject = $data['jenis_reject'];
                                            $jumlah_reject = $data['jumlah_reject'];
                                            $bagus = $data['bagus'];
                                            $tanggal = $data['tanggal'];
                                            $idm = $data['idmasuk'];

                                        ?>
                                        <tr>
                                            <td align="center">
                                                <a class="btn btn-warning">
                                                    <span class="actionCust"> <i class="fas fa-pencil-alt"
                                                            data-toggle="modal"
                                                            data-target="#edit<?=$idm;?>"></i></span>
                                                </a>
                                                <a class="btn btn-danger"> <span class="actionCust"><i
                                                            class="fas fa-trash" data-toggle="modal"
                                                            data-target="#delete<?=$idm;?>"></i></span></a>
                                            </td>
                                            <td><?=$i++;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$jenis;?></td>
                                            <td><?=$jumlah;?></td>
                                            <td><?=$jreject;?></td>
                                            <td><?=$jumlah_reject;?></td>
                                            <td><?=$bagus;?></td>
                                            <td><?=$tanggal;?></td>

                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$idm;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <input type="text" name="namabarang" class="form-control"
                                                                value="<?=$namabarang;?>" required />
                                                            <br />

                                                            <select name="jenis" class="form-control"
                                                                value="<?=$jenis;?>">
                                                                <option value="">-Barang-</option>
                                                                <option value="Barang 1">Barang 1</option>
                                                                <option value="Barang 2">Barang 2</option>
                                                            </select>
                                                            <br />
                                                            <input type="number" name="jumlah" class="form-control"
                                                                value="<?=$jumlah;?>" required />
                                                            <br />
                                                            <select name="jenis_reject" class="form-control"
                                                                value="<?=$jreject;?>">
                                                                <option value="">-Jenis Reject-</option>
                                                                <option value="Reject 1">Reject 1</option>
                                                                <option value="Reject 2">Reject 2</option>
                                                            </select>
                                                            <br />
                                                            <input type="number" name="jumlah_reject"
                                                                class="form-control" value="<?=$jumlah_reject;?>"
                                                                required />
                                                            <br />
                                                            <input type="number" name="bagus" class="form-control"
                                                                value="<?=$bagus;?>" required />
                                                            <br />
                                                            <input type="date" name="tanggal" class="form-control"
                                                                value="<?=$tanggal;?>" required />
                                                            <br />
                                                            <input type="hidden" name="idmasuk" value="<?=$idm;?>" />
                                                            <button type="submit" class="btn btn-primary"
                                                                name="updatedata">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$idm;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data ?</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data
                                                            <strong><?=$namabarang;?></strong>
                                                            ?
                                                            <input type="hidden" name="idmasuk" value="<?=$idm;?>" />
                                                            <br />
                                                            <br />
                                                            <button type="submit" class="btn btn-danger"
                                                                name="hapusdata">Hapus</button>
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
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>\
    <!-- Datatabels -->
    <script>
    $(document).ready(function() {
        $("#dataTable").DataTable({
            scrollX: true,
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
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <br>
                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required />
                    <br />
                    <select name="jenis" class="form-control">
                        <option value="">-Jenis Barang-</option>
                        <option value="barang 1">Barang 1</option>
                        <option value="barang 2">Barang 2</option>
                    </select>
                    <br />
                    <input type="number" name="jumlah" placeholder="Jumlah Barang" class="form-control" required />
                    <br />
                    <select name="jenis_reject" class="form-control">
                        <option value="">-Jenis Reject-</option>
                        <option value="Reject 1">Reject 1</option>
                        <option value="Reject 2">Reject 2</option>
                    </select>
                    <br />
                    <input type="number" name="jumlah_reject" placeholder="Jumlah Reject" class="form-control"
                        required />
                    <br />
                    <input type="number" name="bagus" placeholder="Barang Bagus" class="form-control" required />
                    <br />
                    <input type="date" name="tanggal" class="form-control" required />
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="tambahbarang">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</html>