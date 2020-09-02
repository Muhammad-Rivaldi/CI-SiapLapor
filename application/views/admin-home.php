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
                    <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal" type="submit">Keluar</button>
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
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
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
                    </ul>
                    
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                </div>
                </nav>
                <!--  -->

                <!-- konten -->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>

                    <!-- tampil hitung data pengaduan -->
                    <div class="container" style="margin-left: 5%;margin-top: 5%;">
                        <div class="row">
                            <div class="col">
                                <a href="<?php echo site_url('test/pengaduanBaru')?>"><button type="button" class="btn btn-danger btn-lg" style="width: 100%;"><?php echo $hasil1;?><br>pengaduan baru</button></a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm">
                                <a href="<?php echo site_url('test/pengaduanProses')?>"><button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><?php echo $hasil2;?><br>pengaduan proses</button></a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm">
                                <a href=""><button type="button" class="btn btn-success btn-lg" style="width: 100%;"><?php echo $hasil3;?><br>pengaduan selesai</button></a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
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
                        <a href="<?php echo site_url('test/logout')?>"><button type="button" class="btn btn-primary">Ya</button></a> 
                    </div>
                </div>
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