<script>
    $(document).ready(function() {
        // add btn modal
        $('.addbtn').on('click', function() {
            $('#addModal').modal('show');
        });

        // READ DATA
        // ini adalah fungsi untuk memunculkan data di datatable
        var data_petugas = $('#petugas').DataTable({
            "processing": true,
            "ajax": "<?= base_url("ajax_controller/data_petugas") ?>",
            "data": [],
        });
        
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
        $(document).on('click', '.editbtn', function(event) {
            // console.log("masuk halaman edit")
            var div = $(event.relatedTarget)
            var id_petugas = $(this).attr("id");
            $.ajax({
                url: "get_petugas",
                type: "post",
                data: {
                    id_petugas: id_petugas
                },
                dataType: "JSON",
                success: function(data) {
                    $('#editModal').modal('show');
                    $('#namapetugas').val(data.nama_petugas);
                    $('#usernamepetugas').val(data.username);
                    $('#passwordpetugas').val(data.password);
                    $('#telppetugas').val(data.telp);
                    $('#rolepetugas').val(data.level);
                    $('#idpetugas').val(id_petugas);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Edit petugas
		$(document).on('submit', '#editpetugas', function(event) {
			event.preventDefault();
            var petugas_nama = $('#namapetugas').val();
            var petugas_username = $('#usernamepetugas').val();
            var petugas_password = $('#passwordpetugas').val();
            var petugas_telpon = $('#telppetugas').val();
            var petugas_level = $('#rolepetugas').val();

            if (petugas_nama != '' && petugas_username != '' && petugas_password != '' && petugas_telpon != '' && petugas_level != '') {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax_controller/edit_petugas") ?>",
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
                            title: 'Edit Barang',
                            text: 'Anda Berhasil Mengedit Barang'
                        })
                        $('#editpetugas')[0].reset();
                        $('#editModal').modal('hide');
                        data_petugas.ajax.reload(null, false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Bother fields are required!',
                });
            }
        });
        
        // delete petugas
		$(document).on('click', '.deletebtn', function() {
			var id_petugas = $(this).attr("id");
			swal({
				title: 'Konfirmasi',
				text: "Apakah anda yakin ingin menghapus ",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Hapus',
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				cancelButtonText: 'Tidak',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: "<?= base_url('ajax_controller/hapus_petugas') ?>",
						type: "post",
						beforeSend: function() {
							swal({
								title: 'Menunggu',
								html: 'Memproses data',
								onOpen: () => {
									swal.showLoading()
								}
							})
						},
						data: {
							id_petugas: id_petugas
						},
						success: function(data) {
							swal(
								'Hapus',
								'Berhasil Terhapus',
								'success'
							)
							data_petugas.ajax.reload(null, false)
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal(
						'Batal',
						'Anda membatalkan penghapusan',
						'error'
					)
				};
			});
		});
    });
</script>