<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman user SiapLapor!</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        input[type=text] {
            border: 1px solid #ddd;
            padding: 10px;
            width: 95%;
            border-radius: 2px;
            outline: none;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        label,
        h1 {
            text-transform: uppercase;
            font-weight: bold;
        }

        h1,
        h3 {
            text-align: center;
            font-size: 30px;
        }
    </style>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Core theme JS (includes Bootstrap)-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">
            <img src="<?php echo base_url('assets/L!.png') ?>" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
            <img src="<?php echo base_url('assets/SiapLapor!.png') ?>" width="95" height="20" class="d-inline-block align-bottom ml-2" alt="">
        </a>
        <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal" type="submit">Keluar</button>
    </nav>
    <!--  -->

    <!-- konten -->
    <div class="container mt-3" align="center">
        <span><i class="fas fa-user-circle" style="width: 100px;height: 100px;border-radius: 50%;"></i></span>
        <h1><?php echo $this->session->userdata('nama_user') ?></h1>
        <h3>user</h3>
    </div>
    <br>
    <hr>
    <br>
    <h1>ajukan pengaduan disini</h1><br>

    <!-- form pengaduan disini -->
    <div class="container">
        <form action="<?php echo site_url('test/simpan_to_pengaduan') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="#">nik</label>
                        <input type="text" name="nik" id="nik" value="<?php echo $this->session->userdata('nik') ?>" disabled autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="#">lampirkan dokumentasi <p class="text-danger">*wajib</p>
                            <h6>(.jpg|.png|.gif)</h6>
                        </label>
                        <input type="file" name="foto" class="form-control-file" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">isi pengaduan</label>
                        <textarea name="isiLaporan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="kirim">kirim</button>
                </div>
            </div>
        </form>
    </div>
    <!--  -->
    <br>
    <hr>
    <br>
    <h1>pengaduan saya</h1><br>
    <!-- menampilkan pengaduan berdasarkan id user login -->
    <div class="container">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Pegaduan</th>
                    <th scope="col">Tanggal pengaduan</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Isi Laporan</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Modifikasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_pengaduan as $users) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $users->id_pengaduan ?></td>
                        <td><?php echo $users->tgl_pengaduan ?></td>
                        <td><?php echo $users->nik ?></td>
                        <td><?php echo $users->isi_laporan ?></td>
                        <td><button class="btn" data-toggle="modal" data-target="#gambar"><img src="<?php echo base_url('assets/berkas/') . $users->foto ?>" class="img-thumbnail" style="width: 30%;"></button></td>
                        <td><?php echo $users->status ?></td>
                        <?php if ($users->status == '0') { ?>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></button>
                                <?php echo anchor('test/editData/' . $users->id_pengaduan, '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>') ?>
                            </td>
                        <?php } else { ?>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" disabled><i class="fa fa-trash"></i></button>
                                <?php echo anchor('test/editData/' . $users->id_pengaduan, '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" disabled><i class="fa fa-edit"></i></button>') ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!--  -->

    <!-- Modal untuk exit-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>apakah anda ingin keluar dari situs ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                    <a href="<?php echo site_url('test/logout') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- Modal untuk preview foto pengaduan-->
    <div class="modal fade" id="gambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preview Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($users->foto = $users->id_pengaduan) { ?>
                        <img src="<?php echo base_url('assets/berkas/') . $users->foto ?>" class="img-thumbnail">
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- Modal untuk hapus data-->
    <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>apakah anda ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                    <?php echo anchor('test/hapusData/' . $users->id_pengaduan, '<button type="button" class="btn btn-danger">ya</button>') ?>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</body>

</html>