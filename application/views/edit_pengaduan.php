<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiapLapor!-edit Pengaduan</title>
    
    <style>
    body {
    font-family: "segoe UI";
    }
    .wrapper {
        background-color: #fff;
        width: 400px;
        height: 550px;
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
        <?php foreach($updateData as $edit) { ?>
            <form action="<?php echo site_url('test/updatePengaduan')?>" method="POST" enctype="multipart/form-data">
                <h1 class="text-secondary">Edit Pengaduan Disini</h1>
                <input type="hidden" name="status" value="<?php echo $edit->status ?>">
                <input type="hidden" name="id_pengaduan" value="<?php echo $edit->id_pengaduan ?>">
                <label for="#">NIK</label>
                <input type="text" name="nik" placeholder="masukan nik" autofocus="" value="<?php echo $edit->nik ?>" disabled>
                <label for="#">foto<span class="text-danger"> wajib*</span> <h6>(.jpg|.png|.gif)</h6></label>
                <input type="file" name="foto" class="form-control-file" value="<?php echo $edit->foto?>">
                <label for="exampleFormControlTextarea1">isi pengaduan</label>
                <textarea name="isiLaporan" class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $edit->isi_laporan ?>"></textarea><br>
                <div class="row">
                    <div class="col">
                        <button class="bg-secondary" type="submit">simpan</button>
                    </div>
                    <div class="col">
                    <a href="<?php echo site_url('test/users_form')?>"><button class="bg-danger" type="button">batal</button></a>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</body>
</html>