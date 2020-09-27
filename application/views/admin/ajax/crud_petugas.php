<script>
    $(document).ready(function() {
        // add btn modal
        $('.addbtn').on('click', function() {
            $('#addModal').modal('show');
        });
        
        // ini adalah fungsi untuk memunculkan data di datatable
        // var data_petugas = $('#petugas').DataTable({
        //     "processing": true,
        //     "ajax": "<?= base_url("ajax_controller/data_petugas") ?>",
        //     "data": [],
        // });
        listUsers();
        $('#dataPetugas').dataTable({
            "bPaginate": false,
            "bInfo": false,
            "bFilter": false,
            "bLengthChange": false,
            "pageLength": 5
        });

        function listUsers() {
            $.ajax({
                type: 'ajax',
                url: 'data_petugas',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].id_petugas + '</td>' +
                            '<td>' + data[i].nama_petugas + '</td>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].password + '</td>' +
                            '<td>' + data[i].telp + '</td>' +
                            '<td>' + data[i].level + '</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-primary btn-icon-split editbtn" name="editbtn" data-toggle="modal" data-id="'+data[i].id_petugas+'" style="padding-right: 6%;"><span class="icon text-white"><i class="fas fa-edit"></i> edit</span></button>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#data_petugas').html(html);
                }
            });
        }

        // ADD FUNCTION
        // Tambah barang
        $(document).on('submit', '#formtambah', function(event) {
            event.preventDefault();
            var namamakanan = $('#nmabarang').val();
            var hargamakanan = $('#hrgbarang').val();
            var kategorimakanan = $('#ktgritem').val();
            var extension = $('#user_image').val().split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image");
                $('#user_image').val('');
                return false;
            }

            if (namamakanan != '' && hargamakanan != '' && kategorimakanan != '') {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax_controller/addData") ?>",
                    beforeSend: function() {
                        swal({
                            type: 'loading',
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function() {
                        swal({
                            type: 'success',
                            title: 'Tambah Barang',
                            text: 'Anda Berhasil Menambah Barang'
                        })
                        $('#formtambah')[0].reset();
                        $('#addModal').modal('hide');
                        data_petugas.ajax.reload(null, false);
                    },
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Bother fields are required!',
                });
            }
        });
    });
</script>