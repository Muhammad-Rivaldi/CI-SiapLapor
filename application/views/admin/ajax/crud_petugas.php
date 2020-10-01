<script>
    $(document).ready(function() {
        // add btn modal
        $('.addbtn').on('click', function() {
            $('#addModal').modal('show');
        });

        // $('#petugas').on('click','.editbtn', function() {
        //     $('#editModal').modal('show');
        // });

        // READ DATA
        // ini adalah fungsi untuk memunculkan data di datatable
            // var data_petugas = $('#petugas').DataTable({
            //     "processing": true,
            //     "ajax": "<?= base_url("ajax_controller/data_petugas") ?>",
            //     "data": [],
            // });
        listUsers();
        $('#petugas').dataTable({
            "bPaginate": true,
            "bInfo": true,
            "bFilter": true,
            "bLengthChange": true,
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
                        html += '<tr id="' + data[i].id_petugas + '">' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].id_petugas + '</td>' +
                            '<td>' + data[i].nama_petugas + '</td>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].password + '</td>' +
                            '<td>' + data[i].telp + '</td>' +
                            '<td>' + data[i].level + '</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-primary btn-sm btn-icon-split editbtn" name="editbtn" data-toggle="modal" data-target="editModal" data-id="' + data[i].id_petugas + '" style="padding-right: 6%;"><span class="icon text-white"><i class="fas fa-edit"></i> edit</span></button>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id_petugas + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#data_petugas').html(html);
                }
            });
        }

        // ADD DATA
        // Tambah barang
        $(document).on('submit', '#inputpetugas', function(event) {
            event.preventDefault();
            var petugas_nama = $('#nmptgs').val();
            var petugas_username = $('#usrnm').val();
            var petugas_password = $('#pwptgs').val();
            var petugas_telpon = $('#nhpptgs').val();
            var petugas_level = $('#rlptgs').val();

            if (petugas_nama != '' && petugas_username != '' && petugas_password != '' && petugas_telpon != '' && petugas_level != '') {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax_controller/insert_petugas") ?>",
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
                        $('#inputpetugas')[0].reset();
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

        // EDIT DATA
        // Get id petugas
		$('#petugas').on('click', '.editbtn', function() {
			// console.log("lsadjlaskdjaskldj")
			var id_petugas = $(this).attr("id");
			$.ajax({
				url: "<?= base_url("ajax_controller/get_petugas") ?>",
				type: "post",
				data: {
					id_petugas: id_petugas
				},
				dataType: "JSON",
				success: function(data) {
					$('#editModal').modal('show');
					$('#namapetugas').val(data.nama_petugas);
					$('#usernamepetugas').val(data.harga_awal);
					$('#passwordpetugas').val(data.deskripsi_barang);
					$('#telppetugas').val(data.kategori_barang);
					$('#rolepetugas').val(data.status);
					$('#idpetugas').val(id_petugas);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.responseText);
				}
			});
		});
    });
</script>