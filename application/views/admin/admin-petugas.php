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
    <!-- end navbar -->

    <!-- kontainer -->
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php $this->load->view('admin/sidebar-admin'); ?>
            <!-- end sidebar -->

            <!-- konten -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Petugas</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a href="<?php echo site_url('test/exportToPdf') ?>"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-file"></i> export .pdf</button></a>
                            <a href="<?php echo site_url('test/exportToExcel') ?>"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-file"></i> export .xls</button></a>
                        </div>
                    </div>
                </div>

                <!-- button add data -->
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm addbtn"><i class="fas fa-plus fa-sm text-white"></i> petugas</a>

                <!-- tampil data petugas -->
                <div class="table-responsive">
                    <table class="table table-bordered text-center" cellspacing="0" width="100%" id="petugas">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Id Petugas</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>telpon</th>
                                <th>level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="data_petugas">
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- end kontainer -->

    <!-- partial modals -->
    <?php $this->load->view('admin/modal/modal'); ?>
    <!-- end partial modals -->

    <!-- partial js -->
    <?php $this->load->view('admin/link/link_js'); ?>
    <!-- end partial js -->
</body>

<!-- script ajax -->
<?php $this->load->view('admin/ajax/crud_petugas'); ?>
<!-- end script ajax -->

</html>