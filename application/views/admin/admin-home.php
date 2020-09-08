<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--  -->

    <!-- CDN bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--  -->

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="<?php echo base_url('assets/tampilan.json') ?>">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <!--  -->

    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/847ba36c18.js" crossorigin="anonymous"></script>
    <!--  -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/tampilan.css') ?>" rel="stylesheet">

    <title>SiapLapor!-admin</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
        <a class="navbar-brand bg-light col-md-3 col-lg-2 mr-0 px-3" href="">
            <img src="<?php echo base_url('assets/L!.png') ?>" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
            <img src="<?php echo base_url('assets/SiapLapor!.png') ?>" width="95" height="20" class="d-inline-block align-bottom ml-2" alt="">
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-light w-100" type="text" style="font-size: large;" value="<?php echo $this->session->userdata('nama_petugas') ?> | <?php echo $this->session->userdata('level') ?>" disabled aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" type="button">Keluar</button>
            </li>
        </ul>
    </nav>
    <!--  -->

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item border-bottom">
                            <a class="nav-link active" href="<?php echo site_url('test/admin') ?>">
                                <i class="fa fa-home"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                            <span>Pengaduan</span>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanBaru') ?>">
                                <i class="fa fa-list"></i>
                                baru
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanProses') ?>">
                                <i class="fa fa-clipboard"></i>
                                proses
                            </a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanSelesai') ?>">
                                <i class="fa fa-check"></i>
                                selesai
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                            <span>Tanggapan</span>
                        </h6>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo site_url('test/tanggapan') ?>">
                                <i class="fas fa-reply  "></i>
                                tanggapan
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                            <span>Masyarakat</span>
                        </h6>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanBaru') ?>">
                                <i class="fa fa-user"></i>
                                masyarakat
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                            <span>Petugas</span>
                        </h6>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanBaru') ?>">
                                <i class="fas fa-user-shield"></i>
                                petugas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--  -->

            <!-- konten -->
            <!-- data dashboard -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- tampil hitung data pengaduan -->
                <div class="container" style="margin-left: 5%;margin-top: 2%;">
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo site_url('test/pengaduanBaru') ?>"><button type="button" class="btn btn-danger btn-lg" style="width: 100%;"><?php echo $hasil1; ?><br>pengaduan baru</button></a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm">
                            <a href="<?php echo site_url('test/pengaduanProses') ?>"><button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><?php echo $hasil2; ?><br>pengaduan proses</button></a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm">
                            <a href="<?php echo site_url('test/pengaduanSelesai') ?>"><button type="button" class="btn btn-success btn-lg" style="width: 100%;"><?php echo $hasil3; ?><br>pengaduan selesai</button></a>
                        </div>
                    </div>
                </div>
            </main>

            <!-- data pengaduan -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Semua Pengaduan</h1>
                </div>

                <!-- tampil data semua pengaduan -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pegaduan</th>
                                <th scope="col">Tanggal pengaduan</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Isi Laporan</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengaduan as $users) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $users->id_pengaduan ?></td>
                                    <td><?php echo $users->tgl_pengaduan ?></td>
                                    <td><?php echo $users->nik ?></td>
                                    <td><?php echo $users->isi_laporan ?></td>
                                    <td><button class="btn" data-toggle="modal" data-target="#gambar"><img src="<?php echo base_url('assets/berkas/') . $users->foto ?>" class="img-thumbnail" style="width: 20%;"></button></td>
                                    <td><?php echo $users->status ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!--  -->

    <!-- Modal untuk exit-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</body>

</html>