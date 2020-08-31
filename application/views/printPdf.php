<!-- tampil data pengaduan baru -->
<div class="table-responsive">
    <table class="table table-striped table-sm text-center" border="1">
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
                    <td><img src="<?php echo base_url('assets/berkas/') . $users->foto ?>" class="img-thumbnail" style="width: 30%;"></td>
                    <td><?php echo $users->status ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>