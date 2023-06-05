// Tampilkan Tabel
$(document).ready(function () {
    show_table();
});

//Datatables
function show_table() {
    table = $('#tabelbarang').DataTable({
        "bDestroy": true,
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "order": [],
        "ajax": {
            "url": domain + "master_barang/list_barang",
            "type": "POST",
            "data": {},
        },
        "initComplete": function (settings, json) { },
        "columnDefs": [{
            "targets": [0],
            "className": "dt-center",
            "targets": "_all",
            "orderable": false,
        },],
        "aLengthMenu": [
            [5, 25, 50, 100, -1],
            [5, 25, 50, 100, "All"]
        ],
        "iDisplayLength": 5,
    });
}

//Tambah Barang
$("#formbarang").submit(function (e) {
    event.preventDefault();
    const nama_barang = $("#nama_barang").val();
    const stok_barang = $("#stok_barang").val();
    const harga_beli = $("#harga_beli").val();
    const harga_jual = $("#harga_jual").val();
    if (nama_barang.length == 0 || stok_barang.length == 0 || harga_beli.length == 0 || harga_jual.length == 0) { } else {
        let formData = new FormData($('#formbarang')[0]);
        $.ajax({
            type: 'POST',
            url: domain + "master_barang/simpan_barang",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                json = JSON.parse(result);
                Swal.fire({
                    icon: json.status,
                    text: json.message,
                    timer: 1500,
                });
                show_table();
                $("#nama_barang").val("");
                $("#stok_barang").val("");
                $("#harga_beli").val("");
                $("#harga_jual").val("");
                $("#foto_barang").val("");
                $('#tambah_barang').modal("hide");
            }
        });
    }
});


//Hapus Barang
$(document).delegate('.hapusbarang', 'click', function () {
    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data yang telah dihapus tidak dapat dikembalikan !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
    })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
                const id = $(this).attr('idbarang');
                const file = $(this).attr('file');
                $.ajax({
                    method: 'post',
                    url: domain + "master_barang/hapus_barang",
                    data: {
                        id: id,
                        file: file,
                    },
                    success: function (result) {
                        json = JSON.parse(result);
                        Swal.fire({
                            icon: json.status,
                            text: json.message,
                            timer: 1500,
                        });
                        show_table();
                    }
                });
            }

        });
});

// Tampilan Edit Barang
$(document).ready(function () {
    $(document).delegate('.edit', 'click', function () {
        var id = $(this).attr("idbarang");
        $.ajax({
            url: domain + "master_barang/detail_barang",
            method: 'post',
            data: {
                id: id,
            },
            success: function (result) {
                json = JSON.parse(result);
                $('#id').val(json.id_barang);
                $('#edit_nama_barang').val(json.nama_barang);
                $('#edit_stok_barang').val(json.stok);
                $('#edit_harga_beli').val(json.harga_beli);
                $('#edit_harga_jual').val(json.harga_jual);
                $("#edit_foto_barang_old").val(json.foto_barang);
                $('#edit_barang').modal("show");
            }
        });
    });
});

//Edit Barang
$("#formedit").submit(function (e) {
    event.preventDefault();
    const nama_barang = $("#edit_nama_barang").val();
    const stok_barang = $("#edit_stok_barang").val();
    const harga_beli = $("#edit_harga_beli").val();
    const harga_jual = $("#edit_harga_jual").val();
    if (nama_barang.length == 0 || stok_barang.length == 0 || harga_beli.length == 0 || harga_jual.length == 0) { } else {
        let formData = new FormData($('#formedit')[0]);
        $.ajax({
            type: 'POST',
            url: domain + "master_barang/edit_barang",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                json = JSON.parse(result);
                Swal.fire({
                    icon: json.status,
                    text: json.message,
                    timer: 1500,
                });
                $('#edit_barang').modal("hide");
                show_table();
            }
        });
    }
});

// Detail Barang
$(document).ready(function () {
    $(document).delegate('.details', 'click', function () {
        var id = $(this).attr("idbarang");
        $.ajax({
            url: domain + "master_barang/detail_barang",
            method: 'post',
            data: {
                id: id,
            },
            success: function (result) {
                json = JSON.parse(result);
                $("#detail_foto").html("<img class='card-img img-fluid-xs' src='" + domain + "storage/barang/" + json.foto_barang + "' alt='Logo'>");
                $('#detail_nama').html(json.nama_barang);
                $('#detail_stok').html("Stok : " + json.stok);
                $('#detail_beli').html("Harga Beli : Rp " + number_format(json.harga_beli));
                $('#detail_jual').html("Harga Jual : Rp " + number_format(json.harga_jual));
                $('#detail_barang').modal("show");
            }
        });
    });
});

//Format Angka
function number_format(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}