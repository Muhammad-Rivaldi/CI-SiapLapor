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
        } label,h1 {
            text-transform: uppercase;
            font-weight: bold;
        } h1,h3 {
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
            <img src="<?php echo base_url('assets/L!.png')?>" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
            <img src="<?php echo base_url('assets/SiapLapor!.png')?>" width="95" height="20" class="d-inline-block align-bottom ml-2" alt="">
        </a>
        <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal" type="submit">Keluar</button>
    </nav>

    <!-- isi -->
    <div class="container mt-3" align="center">
        <span><i class="fas fa-user-circle" style="width: 100px;height: 100px;border-radius: 50%;"></i></span>
        <h1><?php echo $this->session->userdata('nama') ?></h1>
        <h3>user</h3>
    </div>
    <br>
    <hr>
    <br>
    <h1>ajukan pengaduan disini</h1><br>

    <div class="container"> 
            <?php echo form_open_multipart('test/simpan_to_pengaduan');?>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="#">nik</label>
                            <input type="text" name="nik" id="nik" value="<?php echo $this->session->userdata('nik')?>" disabled autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="#">foto</label>
                            <input type="file" name="foto" class="form-control-file">
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
            <?php echo form_close()?>
    </div>
    <br>
    <hr>
    <br>
    <h1>pengaduan saya</h1><br>
    
    
    <!-- Modal -->
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
</body>
</html>