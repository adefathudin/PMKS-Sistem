

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Menarik file modal -->
<?php $this->load->view('layout/module/_layout_modal'); ?>

<!-- Bootstrap core JavaScript-->
<!--<script src="<?php echo base_url('assets/vendor/jquery/jquery.rating.js') ?>"></script>-->
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>  
<script src="<?php echo base_url('assets/vendor/jquery-form/jquery-form.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/touch-rating.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.star-rating-svg.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/js/webcam.min.js') ?>"></script>
<!-- Configure a few settings and attach camera -->  
<script src="<?php echo base_url('assets/js/getWebcam.js') ?>"></script>


<script>
    var JS = {
        init: function () {
            setInterval(function () {
                notifikasi();
            }, 1773000);



            // Cek apakah terdapat session simpanan
<?php if ($this->session->flashdata('simpan_berhasil')) { ?>
                Swal.fire({
                    position: 'center',
                    text: '<?= $this->session->flashdata('simpan_berhasil') ?>',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1900
                }),
<?php } ?>

            // Cek apakah terdapat session pinjaman
<?php if ($this->session->flashdata('pinjam_berhasil')) { ?>
                Swal.fire({
                    position: 'center',
                    text: '<?= $this->session->flashdata('pinjam_berhasil') ?>',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1900
                }),
<?php } ?>

            //Perubahan berhasil disimpan
<?php if ($this->session->flashdata('pesan_perubahan')) { ?>
                Swal.fire({
                    position: 'center',
                    title: '<?= $this->session->flashdata('pesan_perubahan') ?>',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1900
                }),
<?php } ?>

            //Jika berhasil membuat grup
<?php if ($this->session->flashdata('new_grup')) { ?>
                Swal.fire({
                    position: 'center',
                    title: '<?= $this->session->flashdata('new_grup') ?>',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1900
                }),
<?php } ?>

            //----------------------------------------

            //jika checkbox pinjam dicentang
            $('#inlineFormCheck').click(function () {
                $('#btn-pinjam').attr('disabled', !this.checked);
            }),
                    //JIka pencarian grup tanpa bintang dicentang
                    $('#cari_tanpa_bintang').click(function () {
                $('#filterstar').attr('disabled', this.checked);
                $('#filterstar').valu('', this.checked);
            }),
                    //auto kalkulasi cicilan pembayaran
                    $("#tenor").change(function () {
                var $tenor = $("#tenor option:selected").val();
                var $nominal = $("#nominal_pinjaman").val();
                var $cicilan = $nominal / $tenor;
                $("#nominal_cicilan").val(Math.ceil($cicilan));
                $("#kalkulasi_cicilan").val("Rp. " + Math.ceil($cicilan) + " per bulan");
            }),
                    //Ucapan Welcome ketika pertama kali daftar
<?php if ($this->session->flashdata('welcome_new_member')) { ?>
                Swal.fire({
                    title: 'Selamat Datang di WarungKoperasi',
                    text: '<?= $this->session->flashdata('welcome_new_member') ?> ',
                    imageUrl: '<?= base_url('assets/img/logo.png') ?>',
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'WarungKoperasi',
                }),
<?php } ?>

            //Jika telah selesai update identitas diri
<?php if ($this->session->flashdata('update_identitas')) { ?>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: '<?= $this->session->flashdata('update_identitas') ?>',
                    showConfirmButton: false,
                    timer: 1900
                }),
<?php } ?>

            //jika tombol join grup diklik
            $('#join_grup').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("koperasi/grup/join") ?>',
                    data: {
                        user_id: '<?= $user_id ?>',
                        grup_id: '<?php if (isset($data_grup_tmp->grup_id)) {
    echo ($data_grup_tmp->grup_id);
} ?>',
                        request_grup: '<?php if (isset($data_grup_tmp->request)) {
    echo ($data_grup_tmp->request);
} ?>'
                    },
                    success: function (data) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Permintaan join grup telah terkirim',
                            showConfirmButton: false,
                            timer: 1300
                        }),
                                $('#join_grup').html("<i class='fas fa-fw fa-clock'></i> Requested");
                        $('#join_grup').prop('disabled', true)
                    },
                    error: function (data) {
                        alert("ada sesuatu yang salah");
                    }
                })
            }),
                    //jika tombol simpan grup diklik 

                    $('#simpan_simpanan_grup').click(function () {
                if (!confirm("Apakah anda menyimpan simpanan?")) {
                    return false;
                }
            }),
                    //jika tombol pinjam grup diklik 

                    $('#btn-pinjam').click(function () {
                if (!confirm("Apakah anda menyimpan pinjaman?")) {
                    return false;
                }
            }),
                    //jika range bintang dipilih
                    $("#filterstar").on('input', function () {
                $("#star").html($(this).val());
            });
        }
    }
    $(document).ready(function () {
        JS.init();
    });
</script>

<script>
    function upload() {
        var foto_ktp = document.getElementById("imageprevKTP").src;
        var foto_profile = document.getElementById("imageprevProfile").src;
        document.getElementById("value_ktp").value = foto_ktp;
        document.getElementById("value_profile").value = foto_profile;
    }

    function closeKamera() {
        Webcam.reset();
    }

    function verifikasi_email() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });
    }
    ;

    //tampil notifikasi
    function notifikasi() {
        var user_id = "<?= $user_id ?>";
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>dashboard/notifikasi',
            data: {user_id: user_id},
            async: true,
            dataType: 'json',
            success: function (data) {

                //jika notifikasi yang belum dibaca lebih dari 0

                if (data.length > 0) {
                    $('#count_notifikasi').text(data.length);
                } else {
                    $('#count_notifikasi').text("");
                }
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html +=
                            '<a class="dropdown-item d-flex align-items-center detail_notifikasi" data="' + data[i].notifikasi_id + '" href="javascript:;">' +
                            '<div>' +
                            '<div class="small text-gray-500">' + data[i].tanggal + '</div>' +
                            '<span class="font-weight-bold">' + data[i].judul + '</span>' +
                            '</div>' +
                            '</a>';
                }
                $('.notifikasi').html(html);
            }
        });
    }
    ;


    //detail notifikasi modal
    $('.notifikasi').on('click', '.detail_notifikasi', function () {
        var id = $(this).attr('data');
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>dashboard/notifikasi_by_id',
            data: {id: id},
            async: true,
            dataType: 'json',
            success: function (data) {
                $('#judul_notifikasi_modal').text(data.judul);
                $('#tanggal_notifikasi_modal').text(data.tanggal);
                $('#isi_notifikasi_modal').text(data.isi);
                $('#link_notifikasi_modal').html('<a class="btn btn-light" href="' + data.link + '">Check <i class="fas fa-fw fa-sign-in-alt"></i></a>');
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>dashboard/update_baca_notifikasi',
                    data: {id: id},
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                    }
                });
            }
        });
        $('#notifikasi_modal').modal('show');
    });

</script>


<?php
if (!empty($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $status = $_GET['status_code'];
    if (!empty($order_id and ! empty($status))) {
        if ($status == 200) {
            ?>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>rekening/topup/update',
                    data: {order_id: '<?= $order_id ?>'},
                    success: function (data) {
                        //header("Location:".base_url('rekening/topup'));
                        Swal.fire({
                            position: 'center',
                            title: 'Top Up Berhasil!',
                            icon: 'success',
                            showConfirmButton: true,
                        })
                        window.setTimeout(function () {
                            window.location.href = "http://localhost/warkop/rekening/topup";
                        }, 5000);
                    },
                    error: function (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: 'Ada sesuatu yang salah saat topup saldo',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                });
            </script>
            <?php
        }
    }
}
?>
</body> 
</html>