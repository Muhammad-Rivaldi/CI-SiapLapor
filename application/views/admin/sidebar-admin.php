<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item border-bottom <?php echo $this->uri->segment(2) == 'admin' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/admin') ?>">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                <span>Pengaduan</span>
            </h6>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'pengaduanBaru' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/pengaduanBaru') ?>">
                    <i class="fa fa-list"></i>
                    baru
                </a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'pengaduanProses' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/pengaduanProses') ?>">
                    <i class="fa fa-clipboard"></i>
                    proses
                </a>
            </li>
            <li class="nav-item border-bottom <?php echo $this->uri->segment(2) == 'pengaduanSelesai' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/pengaduanSelesai') ?>">
                    <i class="fa fa-check"></i>
                    selesai
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                <span>Tanggapan</span>
            </h6>
            <li class="nav-item border-bottom <?php echo $this->uri->segment(2) == 'tanggapan' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/tanggapan') ?>">
                    <i class="fas fa-reply  "></i>
                    tanggapan
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                <span>Masyarakat</span>
            </h6>
            <li class="nav-item border-bottom <?php echo $this->uri->segment(2) == 'masyarakat' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('test/masyarakat') ?>">
                    <i class="fa fa-user"></i>
                    masyarakat
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                <span>Petugas</span>
            </h6>
            <li class="nav-item border-bottom <?php echo $this->uri->segment(2) == 'petugas' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('ajax_controller/petugas') ?>">
                    <i class="fas fa-user-shield"></i>
                    petugas
                </a>
            </li>
        </ul>
    </div>
</nav>