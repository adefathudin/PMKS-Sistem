<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">


    <div class="col-xl-9 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">Laporan Per Tanggal Periode <?= date('F Y') ?></div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="chartByJenis"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Donut Chart -->
    <div class="col-xl-3 col-lg-6">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">Total Laporan</div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="chartPerBulan"></canvas>
                </div>
            </div>
        </div>

        <!--              <div class="card shadow mb-4">
                         Card Header - Dropdown 
                        <div class="card-header py-3">
                          <div class="m-0 font-weight-bold text-primary">Donut Chart</div>
                        </div>
                         Card Body 
                        <div class="card-body">
                          <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                          </div>
                          <hr>
                          Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
                        </div>
                      </div>-->
    </div>
</div>



<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>


<script>
    list_semua_laporan();
    list_laporan_verifikasi();
    list_laporan_proses();
    list_laporan_follow_up();
    list_laporan_selesai();

    function list_semua_laporan() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/laporan/list_semua_laporan',
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                var bgstatus = '';
                var ikonstatus = '';

                for (i = 0; i < data.item.length; i++) {
                    if (data.item[i].status_laporan == '<?= VERIFIKASI ?>') {
                        bgstatus = 'danger';
                        ikonstatus = 'user-clock';
                    } else if (data.item[i].status_laporan == '<?= PROSES ?>') {
                        bgstatus = 'primary';
                        ikonstatus = 'running';
                    } else if (data.item[i].status_laporan == '<?= FOLLOW_UP ?>') {
                        bgstatus = 'primary';
                        ikonstatus = 'running';
                    } else {
                        bgstatus = 'success';
                        ikonstatus = 'users';
                    }

                    html +=
                            '<div class="frmDetailLaporan col-lg-4 col-md-6 mb-4">' +
                            '<div class="card h-70">' +
                            '<div class="card-header">' +
                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                            '<div class="small text-' + bgstatus + '"><i class="fa fa-' + ikonstatus + '"></i> ' + data.item[i].status_laporan + '</div>' +
                            '<div class="small"><i class="far fa-fw fa-clock"></i> ' + data.item[i].tanggal_lapor + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<a data-toggle="modal" href="#" class="btnDetailLaporan" data-id="' + data.item[i].id + '" data-target="#detailLaporan"><img class="card-img-top" height="150px" src="' + data.item[i].foto + '" alt=""></a>' +
                            '<div class="card-body"><span class="small"><i class="far fa-dot-circle"></i> ' + data.item[i].kategori + '</span>' +
                            '<p class="card-text font-weight-bold">' + data.item[i].nama_laporan +
                            '<div class="small">' + data.item[i].deskripsi + '</div>' +
                            '</p>' +
                            '<i class="fas fa-fw fa-map-marker-alt"></i> ' + data.item[i].lokasi +
                            '</div>' +
                            '</div>' +
                            '</div>';
                }

                $('.list-semua-laporan').html(html);
            } else {

            }
            $('.total-semua-laporan').text(data.total_semua_laporan);
        });
    }
    ;

    function list_laporan_verifikasi() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/laporan/list_laporan_verifikasi',
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                var bgstatus = '';
                var ikonstatus = '';

                for (i = 0; i < data.item.length; i++) {

                    html +=
                            '<div class="col-lg-4 col-md-6 mb-4">' +
                            '<div class="card h-70">' +
                            '<div class="card-header">' +
                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                            '<div class="small text-danger"><i class="fa fa-user-clock"></i> ' + data.item[i].status_laporan + '</div>' +
                            '<div class="small"><i class="far fa-fw fa-clock"></i> ' + data.item[i].tanggal_lapor + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<a data-toggle="modal" href="#" class="btnDetailLaporan" data-id="' + data.item[i].id + '" data-target="#detailLaporan"><img class="card-img-top" height="150px" src="' + data.item[i].foto + '" alt=""></a>' +
                            '<div class="card-body"><span class="small"><i class="far fa-dot-circle"></i> ' + data.item[i].kategori + '</span>' +
                            '<p class="card-text font-weight-bold">' + data.item[i].nama_laporan +
                            '<div class="small">' + data.item[i].deskripsi + '</div>' +
                            '</p>' +
                            '<i class="fas fa-fw fa-map-marker-alt"></i> ' + data.item[i].lokasi +
                            '</div>' +
                            '</div>' +
                            '</div>';
                }

                $('.list-laporan-verifikasi').html(html);
            } else {
            }
            $('.total-laporan-verifikasi').text(data.total_laporan_verifikasi);
        });
    }
    ;

    function list_laporan_proses() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/laporan/list_laporan_proses',
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                var bgstatus = '';
                var ikonstatus = '';

                for (i = 0; i < data.item.length; i++) {

                    html +=
                            '<div class="col-lg-4 col-md-6 mb-4">' +
                            '<div class="card h-70">' +
                            '<div class="card-header">' +
                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                            '<div class="small text-warning"><i class="fa fa-spinner"></i> ' + data.item[i].status_laporan + '</div>' +
                            '<div class="small"><i class="far fa-fw fa-clock"></i> ' + data.item[i].tanggal_lapor + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<a data-toggle="modal" href="#" class="btnDetailLaporan" data-id="' + data.item[i].id + '" data-target="#detailLaporan"><img class="card-img-top" height="150px" src="' + data.item[i].foto + '" alt=""></a>' +
                            '<div class="card-body"><span class="small"><i class="far fa-dot-circle"></i> ' + data.item[i].kategori + '</span>' +
                            '<p class="card-text font-weight-bold">' + data.item[i].nama_laporan +
                            '<div class="small">' + data.item[i].deskripsi + '</div>' +
                            '</p>' +
                            '<i class="fas fa-fw fa-map-marker-alt"></i> ' + data.item[i].lokasi +
                            '</div>' +
                            '</div>' +
                            '</div>';
                }

                $('.list-laporan-proses').html(html);
            } else {
            }
            $('.total-laporan-proses').text(data.total_laporan_proses);
        });
    }
    ;

    function list_laporan_follow_up() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/laporan/list_laporan_follow_up',
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                var bgstatus = '';
                var ikonstatus = '';

                for (i = 0; i < data.item.length; i++) {

                    html +=
                            '<div class="col-lg-4 col-md-6 mb-4">' +
                            '<div class="card h-70">' +
                            '<div class="card-header">' +
                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                            '<div class="small text-info"><i class="fa fa-running"></i> ' + data.item[i].status_laporan + '</div>' +
                            '<div class="small"><i class="far fa-fw fa-clock"></i> ' + data.item[i].tanggal_lapor + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<a data-toggle="modal" href="#" class="btnDetailLaporan" data-id="' + data.item[i].id + '" data-target="#detailLaporan"><img class="card-img-top" height="150px" src="' + data.item[i].foto + '" alt=""></a>' +
                            '<div class="card-body"><span class="small"><i class="far fa-dot-circle"></i> ' + data.item[i].kategori + '</span>' +
                            '<p class="card-text font-weight-bold">' + data.item[i].nama_laporan +
                            '<div class="small">' + data.item[i].deskripsi + '</div>' +
                            '</p>' +
                            '<i class="fas fa-fw fa-map-marker-alt"></i> ' + data.item[i].lokasi +
                            '</div>' +
                            '</div>' +
                            '</div>';
                }

                $('.list-laporan-follow-up').html(html);
            } else {
            }
            $('.total-laporan-follow-up').text(data.total_laporan_follow_up);
        });
    }
    ;


    function list_laporan_selesai() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/laporan/list_laporan_selesai',
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                var bgstatus = '';
                var ikonstatus = '';

                for (i = 0; i < data.item.length; i++) {

                    html +=
                            '<div class="col-lg-4 col-md-6 mb-4">' +
                            '<div class="card h-70">' +
                            '<div class="card-header">' +
                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                            '<div class="small text-success"><i class="fa fa-check"></i> ' + data.item[i].status_laporan + '</div>' +
                            '<div class="small"><i class="far fa-fw fa-clock"></i> ' + data.item[i].tanggal_lapor + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<a data-toggle="modal" href="#" class="btnDetailLaporan" data-id="' + data.item[i].id + '" data-target="#detailLaporan"><img class="card-img-top" height="150px" src="' + data.item[i].foto + '" alt=""></a>' +
                            '<div class="card-body"><span class="small"><i class="far fa-dot-circle"></i> ' + data.item[i].kategori + '</span>' +
                            '<p class="card-text font-weight-bold">' + data.item[i].nama_laporan +
                            '<div class="small">' + data.item[i].deskripsi + '</div>' +
                            '</p>' +
                            '<i class="fas fa-fw fa-map-marker-alt"></i> ' + data.item[i].lokasi +
                            '</div>' +
                            '</div>' +
                            '</div>';
                }

                $('.list-laporan-selesai').html(html);
            } else {
            }
            $('.total-laporan-selesai').text(data.total_laporan_selesai);
        });
    }
    ;

    $(document).on('click', '.btnDetailLaporan', function () {

        var id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/laporan/detail_laporan',
            dataType: 'json',
            data: {id: id}
        }).then(function (data) {

            if (data.status) {

                var html = '';

                $('.idLaporan').val(data.item.id);
                $('.jenisStatus').val(data.item.status_laporan);
                $('.namaLaporan').val(data.item.nama_laporan);

                var progress_status = "";
                var tindakan = "";

                $('.btnUpdateStatus').html('');
                if (data.item.status_laporan == '<?= VERIFIKASI ?>') {
                    progress_status = "25";
                    $('.idLaporan').val(data.item.id);
                    if ('<?= $data_user->level ?>' == '<?= KASATPEL ?>') {
                        $('.btnUpdateStatus').html('<button class="btn-sm btn-primary mb-2 btnUpdateStatusLaporan"> Verifikasi Laporan</button>');
                    }
                } else if (data.item.status_laporan == '<?= PROSES ?>') {
                    progress_status = "50";
                    if ('<?= $data_user->level ?>' == '<?= PETUGAS ?>') {
                        $('.btnUpdateStatus').html('<button class="btn-sm btn-primary mb-2 btnUpdateStatusLaporan"> Proses Laporan</button>');
                    }
                } else if (data.item.status_laporan == '<?= FOLLOW_UP ?>') {
                    progress_status = "75";
                    if ('<?= $data_user->level ?>' == '<?= PETUGAS ?>') {
                        tindakan = '<tr><th colspan="3" class="text-center bg-gray-300">Tindakan Laporan</th></tr>' +
                                '<tr><td colspan="3"><textarea name="tindakan" class="form-control"></textarea></td></tr>' +
                                '<tr><td colspan="3"><input type="file" name="foto_tindakan" class="form-control" accept=".png, .jpeg, .jpg,"></td></tr>';
                        $('.btnUpdateStatus').html('<button class="btn-sm btn-primary mb-2 btnUpdateStatusLaporan"> Laporan Telah Diselesaikan</button>');
                    }
                } else {
                    progress_status = "100";
                    tindakan = '<tr><th colspan="3" class="text-center bg-gray-300">Tindakan Laporan</th></tr>' +
                            '<tr><td colspan="3">' + data.item.tindakan + '</td></tr>' +
                            '<tr><td colspan="3"><img class="card-img-top" height="340px" src="' + data.item.foto_tindakan + '"></td></tr>';
                }

                $('.progressStatus').html('<div class="progress-bar" role="progressbar" style="width: ' + progress_status + '%;" aria-valuenow="' + progress_status + '" aria-valuemin="0" aria-valuemax="100">' + progress_status + '%</div>');

                html +=
                        '<tr><th colspan="3" class="text-center  bg-gray-300">Detail Laporan</th></tr>' +
                        '<tr><td>ID Laporan</td><td>:</td><td>' + data.item.id + '</td></tr>' +
                        '<tr><td>Ketogori</td><td>:</td><td>' + data.item.kategori + '</td></tr>' +
                        '<tr><td>Nama Laporan</td><td>:</td><td>' + data.item.nama_laporan + '</td></tr>' +
                        '<tr><td>Deskripsi</td><td>:</td><td>' + data.item.deskripsi + '</td></tr>' +
                        '<tr><td>Lokasi</td><td>:</td><td>' + data.item.lokasi + '</td></tr>' +
                        '<tr><td>Pelapor</td><td>:</td><td><a href="' + data.item.user_id + '">' + data.item.nama_lengkap + '</a> (' + data.item.about + ')</td></tr>' +
                        '<tr><td>Tanggal Lapor</td><td>:</td><td>' + data.item.tanggal_lapor + '</td></tr>' +
                        '<tr><td>Status</td><td>:</td><td>' + data.item.status_laporan + '</td></tr>' +
                        '<tr><td>Tanggal Verifikasi</td><td>:</td><td>' + data.item.tanggal_verifikasi + '</td></tr>' +
                        '<tr><td>Tanggal Proses</td><td>:</td><td>' + data.item.tanggal_proses + '</td></tr>' +
                        '<tr><td>Tanggal Selesai</td><td>:</td><td>' + data.item.tanggal_selesai + '</td></tr>' +
                        '<tr><td colspan="3"><img class="card-img-top" height="340px" src="' + data.item.foto + '"></td></tr>' + tindakan

                        ;

                $('.tblDetailLaporan').html(html);
            } else {
                alert(data.message);
            }
        })
    });

    $(".frmUpdateStatusLaporan").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                type: 'POST',
                url: '<?php echo base_url() ?>services/laporan/update_status_laporan',
                beforeSubmit: function () {
                    if (!confirm("Update status laporan?")) {
                        return false;
                    }
                    $(".btnUpdateStatusLaporan").attr('disabled', 'disabled')
                            .html('<i class="fa fa-spin fa-spinner"></i> Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $('#detailLaporan').modal('hide');
                        list_semua_laporan();
                        list_laporan_verifikasi();
                        list_laporan_proses();
                        list_laporan_follow_up();
                        list_laporan_selesai();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                    $(".btnUpdateStatusLaporan").removeAttr('disabled').html('Verifikasi');


                }
            });
        }
    });

    $("#formBuatLaporan").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                beforeSubmit: function () {
                    if (!confirm("Buat laporan kejadian perkara?")) {
                        return false;
                    }
                    $(".btn-save").attr('disabled', 'disabled')
                            .html('<i class="fa fa-spin fa-spinner"></i> Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        list_semua_laporan();
                        list_laporan_verifikasi();
                        list_laporan_proses();
                        list_laporan_follow_up();
                        list_laporan_selesai();
                        $('.form-control').val('');
                        $('#buatLaporan').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                    $(".btn-save").removeAttr('disabled').html('<i class="fa fa-flag"></i> Buat Laporan');


                }
            });
        }
    });

</script>

<?php $this->load->view('layout/module/_layout_chart');
?>