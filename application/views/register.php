<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    
    <style>
    body {
    font-family: "segoe UI";
    }
    .wrapper {
        background-color: #fff;
        width: 400px;
        height: 700px;
        margin-top: 30px;
        margin-bottom: 2%;
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
        border-radius: 4px;
    }
    input[type=text],input[type=password] {
        border: 1px solid #ddd;
        padding: 10px;
        width: 95%;
        border-radius: 2px;
        outline: none;
        margin-top: 10px;
        margin-bottom: 20px;    
    }
    label,h1 {
        text-transform: uppercase;
        font-weight: bold;
    }
    h1 {
        text-align: center;
        font-size: 30px;
    }
    button {
        border-radius: 2px;
        padding: 10px;
        width: 120px;
        border: none;
        color: #fff;
        font-weight: bold;
    }
    .error {
        background-color: #f72a68;
        width: 400px;
        height: auto;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
        border-radius: 4px;
        color: #fff;
    }
    </style>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>">

</head>
<body class="bg-light">
    <div class="container" align="center">
        <img style="margin-top: 1%;" src="<?php echo base_url('assets/SiapLapor!.png')?>" style="height: 80px;width: 280px;">
    </div>
    <div class="wrapper">
        <form action="<?php echo site_url('test/simpan_data')?>" method="POST">
            <h1 class="text-secondary">Daftar</h1>
            <label for="#">NIK</label>
            <input type="text" name="nik" placeholder="masukan nik" autofocus="">
            <label for="#">Nama Lengkap</label>
            <input type="text" name="namel" placeholder="masukan nama lengkap" autofocus="">
            <label for="#">username</label>
            <input type="text" name="username" placeholder="masukan username" autofocus="">
            <label for="#">password</label>
            <input type="password" name="pw" placeholder="masukan password">
            <label for="#">No. HP</label>
            <input type="text" name="nohp" placeholder="masukan nomor hp" autofocus="">
            <a href="#"><button class="bg-secondary" type="submit">Daftar</button></a> 
            <p style="margin-left: 40%;">sudah punya akun? <a href="<?php echo site_url('test/login')?>" class="text-dark">Masuk</a></p>
        </form>
    </div>
</body>
</html>