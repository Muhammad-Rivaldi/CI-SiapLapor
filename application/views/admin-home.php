<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!--  -->

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
        <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
        <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">
        <!--  -->

        <!-- font awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
        <link href="<?php echo base_url('assets/tampilan.css')?>" rel="stylesheet">

        <title>SiapLapor!-admin</title>
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
            <a class="navbar-brand bg-light col-md-3 col-lg-2 mr-0 px-3" href="#">
                <img src="<?php echo base_url('assets/L!.png')?>" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
                <img src="<?php echo base_url('assets/SiapLapor!.png')?>" width="95" height="20" class="d-inline-block align-bottom ml-2" alt="">
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-light w-100" type="text" style="font-size: large;" value="<?php echo $this->session->userdata('nama_petugas')?> | <?php echo $this->session->userdata('level')?>" disabled aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a href="<?php echo site_url('test/logout')?>"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Keluar</button></a>
                </li>
            </ul>
        </nav>
        <!--  -->

        <div class="container-fluid">
            <!-- sidebar -->
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item border-bottom">
                            <a class="nav-link active" href="<?php echo site_url('test/admin')?>">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Pengaduan</span>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanBaru')?>">
                            <span data-feather="list"></span>
                            baru
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanProses')?>">
                            <span data-feather="clipboard"></span>
                            proses
                            </a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo site_url('test/pengaduanSelesai')?>">
                            <span data-feather="check"></span>
                            selesai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                            </a>
                        </li>
                    </ul>
                    
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Year-end sale
                        </a>
                    </li>
                    </ul>
                </div>
                </nav>
                <!--  -->

                <!-- konten -->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <!-- <div class="btn-group mr-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <span data-feather="calendar"></span>
                                This week
                            </button> -->
                        </div>
                    </div>

                    <!-- tampil hitung data pengaduan -->
                    <div class="container" style="margin-left: 5%;margin-top: 5%;">
                        <div class="row">
                            <div class="col">
                                <a href="<?php echo site_url('test/pengaduanBaru')?>"><button type="button" class="btn btn-danger btn-lg" style="width: 100%;"><?php echo $hasil;?><br>pengaduan baru</button></a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm">
                                <a href=""><button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><?php echo $hasil;?><br>pengaduan proses</button></a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm">
                                <a href=""><button type="button" class="btn btn-success btn-lg" style="width: 100%;"><?php echo $hasil;?><br>pengaduan selesai</button></a>
                            </div>
                        </div>
                    </div>

                    <!-- <h2>Section title</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
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
                                    $no=1;
                                        foreach ($hasil as $users) {
                                            if($users->status == "0"){
                                ?>
                                        <tr>
                                            <td><?php echo $no++ ;?></td>
                                            <td><?php echo $users->id_pengaduan ?></td>
                                            <td><?php echo $users->tgl_pengaduan ?></td>
                                            <td><?php echo $users->nik ?></td>
                                            <td><?php echo $users->isi_laporan ?></td>
                                            <td><button class="btn" data-toggle="modal" data-target="#gambar"><img src="<?php echo base_url('assets/berkas/').$users->foto?>" class="img-thumbnail" style="width: 20%;"></button></td>
                                            <td><?php echo $users->status ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></button>
                                                <?php echo anchor('test/editData/'.$users->id_pengaduan,'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>')?> 
                                            </td>
                                        </tr>
                                <?php 
                                    } }
                                ?>
                            </tbody>
                        </table>
                    </div> -->
                </main>
            </div>
        </div>
        <!--  -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="<?php echo base_url('assets/tampilan.js')?>"></script>
    </body>
</html>