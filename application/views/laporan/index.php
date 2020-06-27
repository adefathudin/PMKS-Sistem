<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('layout/module/_layout_dashboard');
?>

<hr>
<div class="row">

    <div class="col-lg-9 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="text-center font-weight-bold">Laporan</h5>
            </div>

            <div class="card-body">
                <ul class="nav justify-content-center nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#semua_laporan" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-book"></i> Semua Laporan (<span class="total-semua-laporan">0</span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" id="profile-tab" data-toggle="tab" href="#verifikasi" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-user-clock"></i> Verifikasi (<span class="total-laporan-verifikasi">0</span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" id="contact-tab" data-toggle="tab" href="#proses" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-spinner"></i> Proses (<span class="total-laporan-proses">0</span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="contact-tab" data-toggle="tab" href="#follow-up" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-running"></i> Follow-Up (<span class="total-laporan-follow-up">0</span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" id="contact-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-check"></i> Selesai (<span class="total-laporan-selesai">0</span>)</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent"><br>
                    <div class="tab-pane fade show active" id="semua_laporan" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row list-semua-laporan"></div>
                    </div>
                    <div class="tab-pane fade" id="verifikasi" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row list-laporan-verifikasi"></div>
                    </div>
                    <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row list-laporan-proses"></div>
                    </div>
                    <div class="tab-pane fade" id="follow-up" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row list-laporan-follow-up"></div>
                    </div>
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row list-laporan-selesai"></div>
                    </div>
                </div>
            </div>

            <div class="card-footer"></div>
        </div> 
    </div>


    <div class="col-lg-3 mb-4">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="text-center">Action</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <a class="mx-auto btn btn-primary  <?php if ($data_user->level != PELAPOR) echo "disabled"; ?> " href="#" data-toggle="modal" data-target="#buatLaporan"><i class="fa fa-plus"></i> Laporkan Kejadian</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>



    <div class="modal fade" id="buatLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Buat Laporan PMKS
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <?php
                if ($data_user->level == PELAPOR and $data_user->verifikasi != 1) {
                    echo "<div class=' modal-body text-danger'>Anda harus memverifikasi identitas terlebih dahulu! Masuk ke menu profile, lalu klik tombol setting.</div>";
                } else {
                    ?>

                    <form id="formBuatLaporan" method="POST" action="<?php echo base_url('services/laporan/create_laporan') ?>">
                        <div class="modal-body">
                            <input type="hidden" name="report_by" value="<?= $user_id ?>">
                            <div class="form-group mx-sm-3 mb-2">
                                <div class="form-group">
                                    <input type="text" name="nama_laporan" class="form-control" id="nominal_topup" placeholder="Nama Laporan">    
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="kategori">
                                        <?php
                                        foreach ($kategoris as $kategori) {
                                            echo "<option value='" . $kategori->kategori_value . "'>" . $kategori->kategori . "</option>";
                                        }
                                        ?>
                                    </select>            
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" maxlength="75" name="deskripsi" placeholder="Deskripsi Laporan"></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" maxlength="75" name="lokasi" placeholder="Lokasi"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="upload" class="form-control" accept=".png, .jpeg, .jpg,">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group text-right"> 
                                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-flag"></i> Buat Laporan</button>
                            </div>
                        </div> 
                    </form> 
                <?php } ?>
            </div>
        </div>
    </div>



    <div class="modal fade" id="detailLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-group frmUpdateStatusLaporan">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Laporan
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row  mx-sm-3 mb-2 justify-content-between">
                            <p class="text-danger"><i class="fa fa-user-clock"></i> Verifikasi</p>
                            <p class="text-warning"><i class="fa fa-spinner"></i> Proses</p>
                            <p class="text-info"><i class="fa fa-running"></i> Follow-Up</p>
                            <p class="text-success"><i class="fa fa-check"></i> Selesai</p>

                        </div>     

                        <div class="progress mx-sm-3 mb-2 progressStatus">

                        </div><br>
                        <table class="table table-striped tblDetailLaporan">

                        </table>
                    </div>

                    <div class="modal-footer">

                        <input type="hidden" name="id_laporan" class="idLaporan">
                        <input type="hidden" name="jenis_status" class="jenisStatus"> 
                        <input type="hidden" name="nama_laporan" class="namaLaporan">     

                        <div class="form-group text-right btnUpdateStatus"> 

                        </div>
                    </div>    

                </form>
            </div>
        </div>
    </div>




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
                            bgstatus = 'warning';
                            ikonstatus = 'spinner';
                        } else if (data.item[i].status_laporan == '<?= FOLLOW_UP ?>') {
                            bgstatus = 'info';
                            ikonstatus = 'running';
                        } else {
                            bgstatus = 'success';
                            ikonstatus = 'check';
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
                    if (data.item.status_laporan == "<?= VERIFIKASI ?>") {
                        progress_status = "25";
                        $('.idLaporan').val(data.item.id);
                        if ('<?= $data_user->level ?>' == '<?= KASATPEL ?>') {
                            $('.btnUpdateStatus').html('<button class="btn-sm btn-primary mb-2 btnUpdateStatusLaporan"> Verifikasi Laporan</button>');
                        }
                    } else if (data.item.status_laporan == "<?= PROSES ?>") {
                        progress_status = "50";
                        if ('<?= $data_user->level ?>' == '<?= PETUGAS ?>') {
                            $('.btnUpdateStatus').html('<button class="btn-sm btn-primary mb-2 btnUpdateStatusLaporan"> Proses Laporan</button>');
                        }
                    } else if (data.item.status_laporan == "<?= FOLLOW_UP ?>") {
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
                            '<tr><td>Pelapor</td><td>:</td><td><a href="user/' + data.item.user_id + '">' + data.item.nama_lengkap + '</a></td></tr>' +
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
