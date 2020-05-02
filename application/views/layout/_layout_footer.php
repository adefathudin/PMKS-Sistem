

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php $this->load->view('layout/module/_layout_modal'); ?>

<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery-form/jquery-form.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>


<script>
    var JS = {
        init: function () {
            setInterval(function () {
                notifikasi();
            }, 3000);

        }
    }
    $(document).ready(function () {
        JS.init();
    });
</script>

<script>
    function notifikasi() {
        
        var user_id = "<?= $user_id ?>";
        var level = "<?= $data_user->level?>";
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/dashboard/get_notifikasi',
            <?php if ($data_user->level != PELAPOR){
                echo "data: {level:level},";
            } else {
                echo "data: {user_id: user_id},";
            } ?>            
            async: true,
            dataType: 'json'}).then(function(data){
                var html = '';
                if (data.status){
                    var i;
                    for (i = 0; i < data.result.length; i++){
                    
                    html +=
                            '<a class="dropdown-item d-flex align-items-center detail_notifikasi" data="' + data.result[i].notifikasi_id + '" href="javascript:;">' +
                            '<div>' +
                            '<div class="small text-gray-500">' + data.result[i].tanggal + '</div>' +
                            '<span class="font-weight-bold">' + data.result[i].judul + '</span>' +
                            '</div>' +
                            '</a>';
                    }
                    $('.count-notifikasi').text(data.result.length);
                } else {
                    $('.count-notifikasi').text('');
                }                
                $('.notifikasi').html(html);
            });
           };
        
</script>

</body> 
</html>