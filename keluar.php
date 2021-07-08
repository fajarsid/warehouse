<?php
  require 'function.php';  
  require 'validasi.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Administator</title>
    <!-- Modal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- AKhir Modal -->

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- partial:index.partial.html -->
    <nav class="navigation">
        <ul>
            <li class="list">
                <a href="index.php">
                    <span class="icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="list">
                <a href="masuk.php">
                    <span class="icon">
                        <i class="fas fa-database"></i>
                    </span>
                    <span class="title">Barang Masuk</span>
                </a>
            </li>
            <li class="list active">
                <a href="keluar.php">
                    <span class="icon">
                        <i class="fas fa-calendar-times"></i>
                    </span>
                    <span class="title">Barang Keluar</span>
                </a>
            </li>
            <li class="list">
                <a href="exit.php">
                    <span class="icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="check">
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h3 class="panel-title">List Data Barang</h3>
                                </div>
                                <div class="col col-xs-6 text-right">
                                    <a href="#"><button type="button" class="btn btn-sm btn-primary btn-create"><i
                                                class="fas fa-plus-square"></i> Tambah
                                            Data Keluar</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th><em class="fa fa-cog"></em></th>
                                        <th class="hidden-xs">NO</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Good Quality</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $ambilsemuadata = mysqli_query($connect, "SELECT * FROM keluar k, masuk s WHERE s.idmasuk = k.idmasuk");
                                        $i = 1;
                                        while($data = mysqli_fetch_array($ambilsemuadata)){
                                            $idk =$data ['idkeluar'];
                                            $idm = $data ['idmasuk'];
                                            $namabarang = $data['namabarang'];
                                            $jenis = $data['jenis'];
                                            $jumlah = $data['jumlah'];
                                            $jumlah_reject = $data['jumlah_reject'];
                                            $bagus = $data['bagus'];
                                            $tanggal = $data['tanggal'];

                                        ?>
                                    <tr>
                                        <td align="center">
                                            <a class="btn btn-warning">
                                                <span class="actionCust"> <i class="fas fa-pencil-alt"
                                                        data-toggle="modal" data-target="#edit<?=$idm;?>"></i></span>
                                            </a>
                                            <a class="btn btn-danger"> <span class="actionCust"><i class="fas fa-trash"
                                                        data-toggle="modal"
                                                        data-target="#delete<?=$idm;?>"></i></span></a>
                                        </td>
                                        <td><?=$i++;?></td>
                                        <td><?=$namabarang;?></td>
                                        <td><?=$jenis;?></td>
                                        <td><?=$jumlah;?></td>
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

                                                        <select name="jenis" class="form-control" value="<?=$jenis;?>">
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
                                                        <input type="number" name="jumlah_reject" class="form-control"
                                                            value="<?=$jumlah_reject;?>" required />
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
                                                        Apakah Anda yakin ingin menghapus Anggota atas nama
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
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col col-xs-4">Page 1 of 5
                                </div>
                                <div class="col col-xs-8">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                    <ul class="pagination visible-xs pull-right">
                                        <li><a href="#">«</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <script>
    const list = document.querySelectorAll(".list");
    const checkBox = document.querySelector(".checkbox");

    function makeLinkActive() {
        list.forEach((item) => {
            item.classList.remove("active");
            this.classList.add("active");
        });
    }
    list.forEach((item) => {
        item.addEventListener("click", makeLinkActive);
    });

    // let body = document.body;

    // checkBox.addEventListener("change", () => {
    //     document.body.classList.toggle("dark__theme");
    // });
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