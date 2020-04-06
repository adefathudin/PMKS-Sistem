<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('layout/module/_layout_dashboard'); ?>

<hr>

<!-- BATAS BARANG DAN GROUP -->
<div class="row">

    <div class="col-lg-9 mb-4">
        <!-- Area Chart -->
<!--        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Presentase Laporan</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
            </div>
        </div>-->

        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="text-center font-weight-bold">Laporan</h5>
            </div>
            
            <div class="card-body">
                <ul class="nav justify-content-center nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#semua_laporan" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-book"></i> Semua Laporan (<span class="total-semua-laporan"></span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" id="profile-tab" data-toggle="tab" href="#verifikasi" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-user-clock"></i> Verifikasi (<span class="total-laporan-verifikasi"></span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="contact-tab" data-toggle="tab" href="#proses" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-running"></i> Proses (<span class="total-laporan-proses"></span>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" id="contact-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-check"></i> Selesai (<span class="total-laporan-selesai"></span>)</a>
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
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row list-laporan-selesai"></div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <a href="<?= base_url('koperasi/grup') ?>" class="btn btn-light btn-block"><i class="fas fa-fw fa-users"></i> Lihat semua grup</a>
            </div>
        </div> 
    </div>


    <div class="col-lg-3 mb-4">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="text-center">Grup Popular</h5>
                </div>
                <div class="card-body">
                    <div class="row">

                        <?php
                        foreach ($list_grup_limit_3 as $grup) {
                            ?>
                            <div class="col-lg-12 col-md-6 mb-4">
                                <div class="card h-70">  
                                    <a href="<?= base_url('grup/' . $grup->grup_id . '/index') ?>"><img class="card-img-top" height="120px" src="<?= base_url('assets/img/grup_koperasi/' . $grup->banner) ?>" alt="">
                                    </a>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <a href="<?= base_url('grup/' . $grup->grup_id . '/index') ?>"><?= $grup->nama_grup; ?>
                                            </a>
                                        </div>
                                        <div class="small text-warning">
                                            <?php
                                            $starNumber = $grup->rate_akumulatif;
                                            for ($x = 0; $x < 5; $x++) {
                                                if (floor($starNumber) - $x >= 1) {
                                                    echo '<i class="fas fa-fw fa-star"></i>';
                                                } elseif ($starNumber - $x > 0) {
                                                    echo '<i class="fas fa-fw fa-star-half-alt"></i>';
                                                } else {
                                                    echo '<i class="far fa-fw fa-star"></i>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>

                    </div>
                </div> 
            </div>
        </div>
    </div><!--END ROW-->



    <script>
        list_semua_laporan();
        list_laporan_verifikasi();
        list_laporan_proses();
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
                    
                    $('.total-semua-laporan').text(data.total_semua_laporan);
                    
                    for (i = 0; i < data.item.length; i++) {
                        if (data.item[i].status_laporan == 'Verifikasi') {
                            bgstatus = 'danger';
                            ikonstatus = 'user-clock';
                        } else if (data.item[i].status_laporan == 'Proses') {
                            bgstatus = 'primary';
                            ikonstatus = 'running';
                        } else {
                            bgstatus = 'success';
                            ikonstatus = 'check';
                        }
                        
                        html +=  
                                '<div class="col-lg-4 col-md-6 mb-4">' +
                                    '<div class="card h-70">' +
                                        '<div class="card-header">' +
                                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                                                '<div class="small text-'+ bgstatus+ '"><i class="fa fa-'+ ikonstatus+ '"></i> '+data.item[i].status_laporan+'</div>' +
                                                '<div class="small"><i class="far fa-fw fa-clock"></i> '+data.item[i].tanggal_lapor+'</div>' +
                                            '</div>'+
                                        '</div>'+
                                        '<a href="'+data.item[i].id +'"><img class="card-img-top" height="150px" src="'+data.item[i].foto +'" alt=""></a>' +
                                        '<div class="card-body small">' +
                                            '<p class="card-text font-weight-bold">'+ data.item[i].nama_laporan +
                                                '<div>'+data.item[i].deskripsi +'</div>' +
                                            '</p>' +
                                            '<i class="fas fa-fw fa-map-marker-alt"></i> '+data.item[i].lokasi +
                                         '</div>' +
                                    '</div>' +
                                '</div>'  ;
                    }

                    $('.list-semua-laporan').html(html);
                } else {
                    alert(data.message);
                }
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
                    
                    $('.total-laporan-verifikasi').text(data.total_laporan_verifikasi);
                    
                    for (i = 0; i < data.item.length; i++) {
                        
                        html +=  
                                '<div class="col-lg-4 col-md-6 mb-4">' +
                                    '<div class="card h-70">' +
                                        '<div class="card-header">' +
                                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                                                '<div class="small text-danger"><i class="fa fa-user-clock"></i> '+data.item[i].status_laporan+'</div>' +
                                                '<div class="small"><i class="far fa-fw fa-clock"></i> '+data.item[i].tanggal_lapor+'</div>' +
                                            '</div>'+
                                        '</div>'+
                                        '<a href="'+data.item[i].id +'"><img class="card-img-top" height="150px" src="'+data.item[i].foto +'" alt=""></a>' +
                                        '<div class="card-body small">' +
                                            '<p class="card-text font-weight-bold">'+ data.item[i].nama_laporan +
                                                '<div>'+data.item[i].deskripsi +'</div>' +
                                            '</p>' +
                                            '<i class="fas fa-fw fa-map-marker-alt"></i> '+data.item[i].lokasi +
                                         '</div>' +
                                    '</div>' +
                                '</div>'  ;
                    }

                    $('.list-laporan-verifikasi').html(html);
                } else {
                    alert(data.message);
                }
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
                    
                    $('.total-laporan-proses').text(data.total_laporan_proses);
                    
                    for (i = 0; i < data.item.length; i++) {
                        
                        html +=  
                                '<div class="col-lg-4 col-md-6 mb-4">' +
                                    '<div class="card h-70">' +
                                        '<div class="card-header">' +
                                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                                                '<div class="small text-info"><i class="fa fa-running"></i> '+data.item[i].status_laporan+'</div>' +
                                                '<div class="small"><i class="far fa-fw fa-clock"></i> '+data.item[i].tanggal_lapor+'</div>' +
                                            '</div>'+
                                        '</div>'+
                                        '<a href="'+data.item[i].id +'"><img class="card-img-top" height="150px" src="'+data.item[i].foto +'" alt=""></a>' +
                                        '<div class="card-body small">' +
                                            '<p class="card-text font-weight-bold">'+ data.item[i].nama_laporan +
                                                '<div>'+data.item[i].deskripsi +'</div>' +
                                            '</p>' +
                                            '<i class="fas fa-fw fa-map-marker-alt"></i> '+data.item[i].lokasi +
                                         '</div>' +
                                    '</div>' +
                                '</div>'  ;
                    }

                    $('.list-laporan-proses').html(html);
                } else {
                    alert(data.message);
                }
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
                    
                    $('.total-laporan-selesai').text(data.total_laporan_selesai);
                    
                    for (i = 0; i < data.item.length; i++) {
                        
                        html +=  
                                '<div class="col-lg-4 col-md-6 mb-4">' +
                                    '<div class="card h-70">' +
                                        '<div class="card-header">' +
                                            '<div class="card-title d-flex flex-row align-items-center justify-content-between">' +
                                                '<div class="small text-success"><i class="fa fa-check"></i> '+data.item[i].status_laporan+'</div>' +
                                                '<div class="small"><i class="far fa-fw fa-clock"></i> '+data.item[i].tanggal_lapor+'</div>' +
                                            '</div>'+
                                        '</div>'+
                                        '<a href="'+data.item[i].id +'"><img class="card-img-top" height="150px" src="'+data.item[i].foto +'" alt=""></a>' +
                                        '<div class="card-body small">' +
                                            '<p class="card-text font-weight-bold">'+ data.item[i].nama_laporan +
                                                '<div>'+data.item[i].deskripsi +'</div>' +
                                            '</p>' +
                                            '<i class="fas fa-fw fa-map-marker-alt"></i> '+data.item[i].lokasi +
                                         '</div>' +
                                    '</div>' +
                                '</div>'  ;
                    }

                    $('.list-laporan-selesai').html(html);
                } else {
                    alert(data.message);
                }
            });
        }
        ;

    </script>
