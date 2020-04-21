<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="border-bottom text-center pb-4">
                    <img src="<?php echo base_url('assets/img/user/profile/' . $data_user_tmp->profil) ?>" alt="profile" class="img-responsive rounded">
                    <div class="mb-3"><br>
                        <h4>
                            <?php echo $data_user_tmp->nama_lengkap; ?>
                        </h4>
                        <div class="d-flex align-items-center justify-content-center">
                            <h5 class="mb-0 mr-2 text-muted">
                                <?php
                                echo "<div class='small'>" . $data_user_tmp->about . "</div>";
                                ?>
                            </h5>
                        </div>     
                    </div>
                    <p class="w-75 mx-auto mb-3">
                        <?php
                        if ($this->session->flashdata('pesan_lampiran')) { // Jika ada
                            echo "
                          <div class='alert alert-info alert-dismissible'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                            . $this->session->flashdata('pesan_lampiran') . "</div>";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                    <div class="text-center mt-4 mt-md-0">
                        <?php
                        if ($data_user_tmp->user_id == $user_id) {
                            echo"
                      <a href='#' data-toggle='modal' data-target='#settingUserModal'>
                      <button class='btn btn-outline-secondary'><i class='fas fa-fw fa-user-edit'></i> Setting</button></a>
                      <a href='#' data-toggle='modal' data-target='#gantiPasswordModal'>
                      <button class='btn btn-outline-secondary'><i class='fas fa-fw fa-user-edit'></i> Ganti Password</button></a>
                      ";
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="profile-feed">   
                    <?php if ($data_user_tmp->user_id == $user_id) { ?>
                        <div class="text-primary">
                            <i class="fas fa-fw fa-lock"></i> Semua identitas yang bersifat rahasia dan tidak akan dipublikasikan.
                        </div>
                    <?php } ?>
                    <!-- DATA INFORMASI -->                   
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                <i class="fas fa-fw fa-user"></i>
                                Joined
                            </span>
                            <span class="float-right text-muted">
                                <?php echo $data_user_tmp->joined ?>
                            </span>
                        </p>
                        <?php
                        if ($data_user_tmp->user_id == $user_id || $data_user_tmp->level != KASATPEL || $data_user_tmp->level == PETUGAS) {
                            echo"    
                        
                    <p class='clearfix'>
                      <span class='float-left'>
                        <i class='fas fa-fw fa-phone'></i>
                        No. HP
                      </span>
                      <span class='float-right text-muted'>
                       " . $data_user_tmp->nomor_hp . "
                      </span>
                    </p>
                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-calendar'></i>
                      Tempat dan Tanggal Lahir
                    </span>
                    <span class='float-right text-muted'>" .
                            $data_user_tmp->tempat_lahir . ", " . $data_user_tmp->tanggal_lahir . "
                    </span>
                    </p>

                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-male'></i>
                      Jenis Kelamin
                    </span>
                    <span class='float-right text-muted'>";
                            if ($data_user_tmp->jenis_kelamin == "L") {
                                $jk = "<i class='fas text-primary fa-fw fa-mars'></i> Laki-laki";
                            } elseif ($data_user_tmp->jenis_kelamin == "P") {
                                $jk = "<i class='fas text-danger fa-fw fa-venus'></i> Perempuan";
                            } else {
                                $jk = "-";
                            }
                            echo $jk . "
                    </span>
                    </p>
                    ";
                            ?>
                            <p class="clearfix">
                                <span class="float-left">
                                    <i class="fas fa-fw fa-map-marker"></i>
                                    Alamat
                                </span>
                                <span class="float-right text-muted">
                                    <?php echo $data_user_tmp->alamat ?>
                                </span>
                            </p>
                            <?php
                        }
                        ?>                  
                    </div>
                    <!-- END DATA INFORMASI -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ganti Password -->
<div class="modal fade" id="gantiPasswordModal" tabindex="-1" role="dialog" ia-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Ganti Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updatePassword" method="PUT" action="<?php echo base_url('services/users/change_password') ?>">
                    <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-group">
                            <input type="password" name="password_lama" class="form-control" placeholder="Password Lama" value="">    
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_baru" class="form-control" placeholder="Password Baru" value="">    
                        </div>
                        <div class="form-group">
                            <input type="password" name="ulangi_password_baru" class="form-control"  placeholder="Ulangi Password Baru" value="">    
                        </div>
                        <div class="modal-footer">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mb-2 btn-save">Ganti Password</button>
                            </div>
                        </div>   
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>

<!-- Setting User -->
<div class="modal fade" id="settingUserModal" tabindex="-1" role="dialog" ia-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Identitas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateIdentitas" method="POST" action="<?php echo base_url('services/users/update_identitas') ?>">
                    <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-group">
                            <input type="text" name="nik" class="form-control" readonly id="nominal_topup" placeholder="NIK" value="<?= $data_user->nik ?>">    
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama_lengkap" class="form-control" readonly id="nominal_topup" placeholder="Nama Lengkap" value="<?= $data_user->nama_lengkap ?>">    
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" readonly id="nominal_topup" placeholder="Email" value="<?= $data_user->email ?>">    
                        </div>
                        <div class="form-group">
                            <input type="number" name="nomor_hp" class="form-control" id="nomor_hp" placeholder="Nomor HP" value="<?= $data_user->nomor_hp ?>">    
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name='tempat_lahir' class="form-control form-control-user" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $data_user->tempat_lahir ?>" required >
                            </div>
                            <div class="col-sm-6">
                                <input type="date" name='tanggal_lahir' value="2003-01-01" max="2003-01-01" class="form-control form-control-user" id="tanggal_lahir" placeholder="Tanggal Lahir" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                <option value="">Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="alamat" placeholder="Alamat lengkap" required ><?= $data_user->alamat ?></textarea>
                        </div>
                        
                        <hr>
                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="about" placeholder="About me" required ><?= $data_user->about ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mb-2 btn-save-identitas">Update Data</button>
                            </div>
                        </div>   
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>

<script>
    $("#updatePassword").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                beforeSubmit: function () {
                    if (!confirm("Update Password?")) {
                        return false;
                    }
                    $(".btn-save").attr('disabled', 'disabled')
                            .html('<i class="fa fa-spin fa-spinner"></i> Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $('.form-control').val('');
                        $('#gantiPasswordModal').modal('hide');
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
                    $(".btn-save").removeAttr('disabled').html(' User');


                }
            });
        }
    });
    
    $("#updateIdentitas").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                beforeSubmit: function () {
                    if (!confirm("Update Identitas?")) {
                        return false;
                    }
                    $(".btn-save-identitas").attr('disabled', 'disabled')
                            .html('<i class="fa fa-spin fa-spinner"></i> Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $('.form-control').val('');
                        $('#settingUserModal').modal('hide');
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
                    $(".btn-save").removeAttr('disabled').html(' User');


                }
            });
        }
    });
    
</script>