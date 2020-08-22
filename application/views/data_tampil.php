    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SiapLapor!-tampil data</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Core theme JS (includes Bootstrap)-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    </head>
    <body>
    <div class="container mt-3">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Tanggal</th>
                <th scope="col">NIK</th>
                <th scope="col">Isi Laporan</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
                foreach ($data_pengaduan as $users) {
        ?>
                <tr>
                    <td><?php echo $no++ ;?></td>
                    <td><?php echo $users->id_pengaduan ?></td>
                    <td><?php echo $users->tgl_pengaduan ?></td>
                    <td><?php echo $users->nik ?></td>
                    <td><?php echo $users->isi_laporan ?></td>
                    <td><?php echo $users->foto ?></td>
                    <td><?php echo $users->status ?></td>
                </tr>
        <?php 
            } 
        ?>
        </tbody>
    </table>
    </div>
    </body>
    </html>