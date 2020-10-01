<!doctype html>
<html lang="en">

<head>
    <!-- partial head -->
    <?php $this->load->view('admin/link/link_head'); ?>
    <!-- end partial head -->

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
        <a class="navbar-brand bg-light col-md-3 col-lg-2 mr-0 px-3" href="#">
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
            <?php $this->load->view('admin/sidebar-admin'); ?>
            <!-- end sidebar -->

            <!-- konten -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Masyarakat</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a href="<?php echo site_url('test/exportToPdf') ?>"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-file"></i> export .pdf</button></a>
                            <a href="<?php echo site_url('test/exportToExcel') ?>"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-file"></i> export .xls</button></a>
                        </div>
                    </div>
                </div>

                <!-- tampil data pengaduan baru -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">nama</th>
                                <th scope="col">username</th>
                                <th scope="col">password</th>
                                <th scope="col">telp</th>
                                <th scope="col">Modifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($masyarakat as $users) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $users->nik ?></td>
                                    <td><?php echo $users->nama ?></td>
                                    <td><?php echo $users->username ?></td>
                                    <td><?php echo $users->password ?></td>
                                    <td><?php echo $users->telp ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></button>
                                        <?php echo anchor('test/editData/' . $users->nik, '<button type="button" class="btn btn-primary"><i class="fa fa-search-plus"></i></button>') ?>
                                    </td>
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

    <!-- partial js -->
    <?php $this->load->view('admin/link/link_js'); ?>
    <!-- end partial js -->
</body>

</html>