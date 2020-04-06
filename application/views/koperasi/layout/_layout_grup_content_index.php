<div class="card-body">
    <div class="text-primary">Deskripri Grup <b><?= $data_grup_tmp->nama_grup?></b></div>
    <p>
        <table class="table table-borderless table-responsive">
            <tr>
                <td>Simpanan Pokok</td>
                <td>:</td>
                <td><?= $data_grup_tmp->minimal_pokok ?></td>
            </tr>
            <tr>
                <td>Simpanan Wajib</td>
                <td>:</td>
                <td><?= $data_grup_tmp->minimal_wajib ?></td>
            </tr>
            <tr>
                <td>Limit Pinjaman</td>
                <td>:</td>
                <td><?= $data_grup_tmp->maksimal_pinjaman ?>% dari total simpanan</td>
            </tr>
        </table>
    </p>
    <?= $data_grup_tmp->deskripsi ?>
</div> 
