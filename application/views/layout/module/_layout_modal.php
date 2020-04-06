
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


<!-- Rate Modal-->
<div class="modal fade" id="rate_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Rating Grup 
                    <?php if (isset($data_grup_tmp->nama_grup)) {
                        echo $data_grup_tmp->nama_grup;
                    } ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            if (isset($grup_user)) {
                if ($grup_user->status_user == 'member' or $grup_user->status_user == 'admin') {
                    if ($grup_user->rate != 0) {
                        ?>
                        <div class='modal-body' width="100%"> 
                            <table class="table table-borderless">
                                <tr>
                                    <td colspan="2">
                                        <span class='small font-italic'>
                                            <i class='fas fa-fw fa-info-circle'></i>
                                            Anda sudah memberikan rating untuk grup ini
                                        </span>                                 
                                    </td>
                                <tr>
                                    <td>Rating anda
                                    </td>
                                    <td class="text-right text-warning">
                                        <?php
                                        $starNumber = $grup_user->rate;
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
                                    </td>
                                </tr>
                                <tr>
                                    <td>Komentar anda
                                    </td>
                                    <td class="text-right">
                                        <?= $grup_user->komentar ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
                    } else {
                        ?>
                        <form class="form-group" method="POST" action="<?= base_url('koperasi/grup/rate_grup') ?>">
                            <div class="modal-body">
                                <div class="form-group text-center">
                                    <div class="my-rating"></div>
                                    <div class="live-rating">0</div>
                                </div>
                                <input type="hidden" id="rating" name="rating">
                                <input type="hidden" name="id_grup_user" value="<?= $grup_user->id ?>">
                                <input type="hidden" name="grup_id" value="<?= $data_grup_tmp->grup_id ?>">
                                <textarea name="comment_rate" id="comment_rate" placeholder="Komentar..." class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btn_rate" class="btn btn-primary">Submit <i class="fas fa-fw fa-sign-out-alt"></i></button>
                            </div>

                        </form>
                    <?php
                    }
                } else {
                    echo "<div class='modal-body'><i class='fas fa-fw fa-info-circle'></i> Anda harus join terlebih dahulu untuk memberikan rating</div>";
                }
            }
            ?>
        </div>
    </div>
</div>

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

<!-- Syarat dan ketentuan pinjaman-->
<div class="modal fade" id="syaratPinjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Syarat dan ketentuan pengajuan pinjaman <?php if (isset($data_grup_tmp->nama_grup)) {
                echo $data_grup_tmp->nama_grup;
            } ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                1. Peminjaman hanya dapat dilakukan 1x selama ada masa pinjaman yang sedang berjalan<br><br>
                2. 1% dari total nominal pengajuan pinjaman digunakan untuk kas koperasi<br><br>
                3. Limit kredit pinjaman <?php isset($data_grup_tmp->maksimal_pinjaman) ? $data_grup_tmp->maksimal_pinjaman : '' ?> dari total simpanan koperasi aktif<br><br>
                4. Pengajuan pinjaman akan diverifikasi terlebih dahulu oleh pengurus koperasi dan selanjutnya bila disetujui, akan masuk ke saldo rekening
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Saya setuju</button>
            </div>
        </div>
    </div>
</div>


<!-- Create Group Modal-->

<div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Group Koperasi
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateIdentitas" method="POST" action="<?php echo base_url('koperasi/grup/new') ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-group">
                            <input type="text" name="nama_grup" class="form-control" id="nominal_topup" placeholder="Nama Grup">    
                        </div>
                        <div class="form-group">
                            <input type="text" name="wilayah" class="form-control" id="nominal_topup" placeholder="Area Coverage (mis. nama kota atau daerah)">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="kategori">
                                <option value="utensils">Keluarga</option>
                                <option value="briefcase">Tempat Kerja</option>
                                <option value="graduation-cap">Sekolah</option>
                                <option value="people-carry">Lingkungan</option>
                            </select>            
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" maxlength="75" name="tentang" placeholder="Deskripsi singkat."></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="form-group text-right">         
                    <?php
                    if (count($list_grup) >= 4) {
                        echo "<div class='text-danger'><i class='fas fa-fw fa-info-circle'></i> Anda telah mencapai batas limit pembuatan grup (4)</div>";
                    } else if ($data_user->type != "Full Service") {
                        echo "<div class='text-danger'><i class='fas fa-fw fa-info-circle'></i> Harap upgrade member menjadi full service terlebih dahulu. <a href='#' data-toggle='modal' data-target='#upgrade'><u>Click here to upgrade</u></a></div>";
                    } else {
                        ?>
                        <button type="submit" class="btn btn-primary mb-2">Buat Grup</button>
<?php } ?>
                </div>
            </div> 
            </form>     
        </div>
    </div>
</div>

<!-- Upgrade Full Service-->

<div class="modal fade" id="upgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upgrade Full Service Member</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="closeKamera()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mx-sm-3 mb-2">
                    <?php
                    if ($data_user->verifikasi_email == 0) {
                        echo "<span class='text-primary'><i class='fas fa-fw fa-info-circle'></i> Harap verifikasi email terlebih dahulu. Silahkan cek email anda</span>";
                    } else {
                        if ($data_user->status_approve == '2' and $data_user->user_id == $user_id) {
                            echo "<div class='text-info'><i class='fas fa-fw fa-info-circle'></i> Pengajuan upgrade anda sedang diverifikasi oleh tim WarungKoperasi</div>";
                        }
                        ?>
                        <div class="form-group">
                            <a href='#' data-toggle='modal' data-target='#settingUserModal'>
                                <button class='btn btn-info form-control'><i class='fas fa-fw fa-user-edit'></i> Update Identitas Pribadi</button>
                            </a>
                        </div>
                        <div id="frm_UploadKTP" class="form-group">             
                            <input type="button" class="btn btn-info form-control" id="btn_UploadKTP" value="Upload Foto Identitas"/>
                        </div>
                        <div id="frm_OpenKamera" class="form-group" align="center">
                            <div id="kamera"></div>
                            Foto Kartu Identitas
                            <br>
                            <button class="btn" id="btn_capture"><i class="fas fa-fw fa-camera"></i></button>
                        </div>
                        <div id="frm_HasilKamera" class="form-group" align="center">    
                            <div id="hasilKamera" ></div>
                            Foto Kartu Identitas
                            <br>
                            <button class="btn" id="btn_recapture"><i class="fas fa-fw fa-undo-alt"></i></button>
                        </div>               

                        <div id="frm_UploadProfile" class="form-group">                  
                            <input type="button" class="btn btn-info btn-user btn-block" id="btn_UploadProfile" value="Upload Foto Profile"/>
                        </div>
                        <div id="frm_OpenKameraProfile" class="form-group" align="center">
                            <div id="kameraProfile"></div>
                            Foto Profile (Pastikan wajah anda terlihat dengan jelas)
                            <br>
                            <button class="btn" id="btn_captureProfile"><i class="fas fa-fw fa-camera"></i></button>
                        </div>
                        <div id="frm_HasilKameraProfile" class="form-group" align="center">    
                            <div id="hasilKameraProfile" ></div>
                            Foto Profile
                            <br>
                            <button class="btn" id="btn_recaptureProfile"><i class="fas fa-fw fa-undo-alt"></i></button>
                        </div>              
                        <form method="POST" action="<?php echo base_url('profile/identitas/lampiran') ?>">    
                            <div id="frm_submit" class="form-group">      
                                <div class="form-check form-row">          
                                    <div class="col-auto my-1">
                                        <input class="form-check-input" type="checkbox" id="konfirmasi_upgrade_member" required>
                                        <label class="form-check-label" for="konfirmasi_upgrade_member">
                                            Saya sudah melengengkapi identitas pribadi. Termasuk mengkonfirmasi email, nomor hp, mengisi alamat rumah, nomor rekening, dll.
                                        </label>
                                    </div>
                                </div>      
                                <input type="hidden" id="value_ktp" name="value_ktp">  
                                <input type="hidden" id="value_profile" name="value_profile">  
                                <input type="submit" class="btn btn-primary btn-user btn-block"  onClick="upload()" id="btn_UploadKTP" value="Upload"/>
                            </div>
                        </form>
<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Approve Member Full Service -->
<div class="modal fade" id="approve_member_full_modal" tabindex="-1" role="dialog" ia-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Member</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div id="detail_member_full">test</div>

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