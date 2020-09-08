<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiapLapor!</title>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>">
    
    <style>
        p {
            font-size: 80px;
        }
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col" align="center" style="padding-top: 13%;">
                <img src="<?php echo base_url('assets/SiapLapor!.png')?>" style="height: 80px;width: 280px;">
                <br>
                <img src="<?php echo base_url('assets/homepic.jpg')?>" style="height: 427px;width: 401px; margin-bottom: 10%;">
            </div>
            <div class="col bg-light" style="padding-top: 18%;" align="center">
                <p style="font-size: 50px;">MELAKUKAN PENGADUAN SEKARANG LEBIH MUDAH</p>
                <a href="<?php echo site_url('test/login')?>"><button type="button" class="btn btn-dark btn-lg">Masuk</button></a>
                <a href="<?php echo site_url('test/index2')?>" class="text-decoration-none text-dark" style="margin-left: 2%;font-size: large;">Daftar</a>
            </div>
        </div>    
    </div>
</body>
</html>