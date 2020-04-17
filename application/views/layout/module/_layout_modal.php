
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Logout <i class="fas fa-fw fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Create Group Modal-->

<!-- Notifikasi Modal-->
<div class="modal fade" id="notifikasi_modal" tabindex="-1" role="dialog" aria-labelledby="judul_notifikasi_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-weight-bold" id="judul_notifikasi_modal"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <span class="small modal-header" id="tanggal_notifikasi_modal"></span>
            <div class="modal-body" id="isi_notifikasi_modal"></div>
            <div class="modal-footer" id="link_notifikasi_modal">
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
                <form id="updateIdentitas" method="POST" action="<?php echo base_url('profile/identitas/data') ?>">
                    <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-group">
                            <input type="text" name="nama_lengkap" class="form-control" id="nominal_topup" placeholder="Nama Lengkap" value="<?= $data_user->nama_lengkap ?>">    
                        </div>
                        <div class="form-group">
                            <input type="number" name="nomor_hp" class="form-control" id="nomor_hp" placeholder="Nomor HP" value="">    
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
                                <button type="submit" class="btn btn-primary mb-2">Update Data</button>
                            </div>
                        </div>   
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>


<!-- Setting User -->
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
                <form id="updateIdentitas" method="POST" action="<?php echo base_url('profile/identitas/data') ?>">
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
                                <button type="submit" class="btn btn-primary mb-2">Ganti Password</button>
                            </div>
                        </div>   
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>