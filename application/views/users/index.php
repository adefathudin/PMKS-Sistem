<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="m-0 text-primary">List Users</div>
    </div>
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-member-tab" data-toggle="tab" href="#nav-petugas" role="tab" aria-controls="nav-member" aria-selected="false"><i class="fa fa-user-nurse"></i> Petugas</a>
                <a class="nav-item nav-link" id="nav-member-tab" data-toggle="tab" href="#nav-pelapor" role="tab" aria-controls="nav-member" aria-selected="false"><i class="fa fa-user-edit"></i> Pelapor</a>
                <a class="nav-item nav-link <?php if ($data_user->level != KASATPEL) echo "disabled"; ?>" id="nav-member-tab" data-toggle="modal" href="#" data-target="#buatUser" role="tab" aria-controls="nav-member" aria-selected="false"><i class="fa fa-user-plus"></i> Create User</a>
            </div>
        </nav>
        <br>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade" id="nav-petugas" role="tabpanel" aria-labelledby="nav-admin-tab">      
                <div class="table-responsive table-striped table-bordered">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>RT/RW</th>
                            </tr>
                        </thead>          
                        <tbody id="list-petugas"> 

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-pelapor" role="tabpanel" aria-labelledby="nav-admin-tab">      
                <div class="table-responsive table-striped table-bordered">
                    <table class="table" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>RT/RW</th>
                            </tr>
                        </thead>          
                        <tbody id="list-pelapor"> 

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>


<!-- Create Group Modal-->

<div class="modal fade" id="buatUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="frmCreateNewUser" method="POST" action="<?php echo base_url('services/users/create_user') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah User
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group mx-sm-3 mb-2">

                        <div class="form-group">
                            <select class="form-control level" name="level">
                                <option value="">Jenis User</option>
                                <option value="petugas">Petugas</option>
                                <option value="pelapor">Pelapor</option>
                            </select>            
                        </div>

                        <div class="form-group">
                            <input type="number" name="nik" class="form-control" placeholder="NIK">    
                        </div>

                        <div class="form-group">
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">    
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="e-mail">    
                        </div>
                        <div class="form-row rt-rw">
                            <div class="form-group col-md-6">
                                <select class="form-control" name="rt">
                                    <option value="">RT</option>
                                    <?php
                                    for ($i = 1; $i <= 17; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>  
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="rw">
                                    <option value="">RW</option>
                                    <?php
                                    for ($i = 1; $i <= 11; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right"> 
                            <button type="submit" class="btn btn-primary mb-2 btn-save"><i class="fa fa-user-plus"></i> Tambah User</button>
                    </div>
                </div> 
            </form>     
        </div>
    </div>
</div>

<script>

   
    $("#frmCreateNewUser").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                beforeSubmit: function () {
                    if (!confirm("Simpan User?")){
                        return false;
                    }
                    $(".btn-save").attr('disabled', 'disabled')
                            .html('<i class="fa fa-spin fa-spinner"></i> Processing ...');
                },
                success: function (data) {
                    if (data.status) {                           
                        list_petugas();
                        list_pelapor();
                        $('.form-control').val('');
                        $('#buatUser').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: ''+data.message+'',
                            showConfirmButton: false,
                            timer: 1300
                      })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: ''+data.message+'',
                            showConfirmButton: false,
                            timer: 1300
                      })
                    }
                    $(".btn-save").removeAttr('disabled').html('<i class="fa fa-user-plus"></i> Tambah User');


                }
            });
        }
    });
    
    list_petugas();
    list_pelapor();
    function list_petugas() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/users/list_petugas',
            data: {level: "petugas"},
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                for (i = 0; i < data.item.length; i++) {
                    html += '<tr>' +
                            '<td><button class="btn btn-danger delete-user" data-user="' + data.item[i].id + '" <?php if ($data_user->level != KASATPEL) echo "disabled"; ?> ><i class="fa fa-trash"></i> Delete</button></td>' +
                            '<td>' + data.item[i].nik + '</td>' +
                            '<td>' +
                            '<a href="<?= base_url() ?>user/' + data.item[i].user_id + '">' +
                            '<img src="<?= base_url() ?>assets/img/user/profile/' + data.item[i].profil + '" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> ' + data.item[i].nama_lengkap +
                            '</a></td>' +
                            '<td>' + data.item[i].nomor_hp + '</td>' +
                            '<td>' + data.item[i].alamat + '</td>' +
                            '<td>' + data.item[i].rt + '/' + data.item[i].rw + '</td>' +
                            '</tr>';
                }

                $('#list-petugas').html(html);
            } else {
                alert(data.message);
            }
        });
    }
    ;
    function list_pelapor() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/users/list_pelapor',
            data: {level: "pelapor"},
            dataType: 'json'
        }).then(function (data) {
            if (data.status) {

                var html = '';
                var i;
                for (i = 0; i < data.item.length; i++) {
                    html += '<tr>' +
                            '<td><button class="btn btn-danger delete-user" data-user="' + data.item[i].id + '" <?php if ($data_user->level != KASATPEL) echo "disabled"; ?> ><i class="fa fa-trash"></i> Delete</button></td>' +
                            '<td>' + data.item[i].nik + '</td>' +
                            '<td>' +
                            '<a href="<?= base_url() ?>user/' + data.item[i].user_id + '">' +
                            '<img src="<?= base_url() ?>assets/img/user/profile/' + data.item[i].profil + '" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> ' + data.item[i].nama_lengkap +
                            '</a></td>' +
                            '<td>' + data.item[i].nomor_hp + '</td>' +
                            '<td>' + data.item[i].alamat + '</td>' +
                            '<td>' + data.item[i].rt + '/' + data.item[i].rw + '</td>' +
                            '</tr>';
                }

                $('#list-pelapor').html(html);
            } else {
                alert(data.message);
            }
        });
    }
    ;
    
    
    $(document).on('click', '.delete-user', function () {
        if (!confirm("Delete user?")) {
            return false;
        }
        var id = $(this).attr('data-user');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("services/users/delete_user") ?>',
            data: {id: id}
        }).then(function (data) {
            if (data.status) {

                list_petugas();
                list_pelapor();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: ''+data.message+'',
                    showConfirmButton: false,
                    timer: 1300
                })
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    text: ''+data.message+'',
                    showConfirmButton: false,
                    timer: 1300
                })
            }
        });
    });
    
    $("#frmCreateNewUser").on('change', '.level', function () {
        if ($('.level').val() == 'petugas') {
            $('.rt-rw').hide()
        } else {
            $('.rt-rw').show()
        }
    })

</script>
