
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
            </div>
        </div>
    </div>
</div>

