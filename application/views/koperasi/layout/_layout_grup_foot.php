</div>
</div>
<div class="col-lg-3 mb-4">
  <!--//JIKA HALAMAN SELAIN HOME DIBUKA-->
  <?php 
    if ($page = $this->uri->segment(3) != 'index'){ ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
      <div class="m-0 font-weight-bold text-capitalize text-primary"><?= $data_grup_tmp->nama_grup ?>
      </div>    
    </div>
      <img src="<?= base_url('assets/img/grup_koperasi/'.$data_grup_tmp->banner)?>"  alt="profile" class="img-responsive" width="100%" height="180px"> 
  </div>
    <?php } ?>
  

    <!--JIKA HALAMAN LAPAK DIBUKA-->
    <?php 
    if ($page = $this->uri->segment(3) == 'lapak'){ ?>
    <div class="card shadow mb-4">
      <div class="card-header">
        Filter by
      </div>
      <div class="card-body small">      
      <form class="form-group">
      <div class="font-weight-bold">Pencarian Barang</div><br>
        <input type="text" class="form-control form-control-sm" placeholder="Nama barang yang dicari"> 
        <hr>
        <div class="font-weight-bold">Kondisi Barang</div><br>
        <input type="checkbox"> Baru<br>
        <input type="checkbox"> Bekas
        <hr>
        <div class="font-weight-bold">Harga</div><br>
        <input type="number" class="form-control form-control-sm" placeholder="Min"><br>
        <input type="number" class="form-control form-control-sm" placeholder="Max">
        <hr>
        <div class="font-weight-bold">Rating</div><br>
        <input type="range" min="1" max="5" class="form-control" value="3" id="filterstar" placeholder="Min">
        Star <p><span id="star"></span></p>        
        <hr>
        <div class="font-weight-bold">Penawaran</div><br>
        <input type="checkbox"> Diskon<br>
        <input type="checkbox"> Gratis Ongkir
        <hr>
        <button class="btn btn-primary form-control"><i class="fas fa-fw fa-search"></i> Search</button>
      </form>
      </div>
    </div>
    <?php }
      if (!empty($grup_user)){
            if ($grup_user->status_user == 'request'){
              echo "
                <div class=' shadow mb-4 small'>
                  <button width='100%' class='btn btn-primary btn-md btn-block' id='join_grup' disabled><i class='fas fa-fw fa-clock'></i> Requested</button>
                </div>";
            }
            else if ($grup_user->status_user == 'member' or $grup_user->status_user == 'admin'){
            }
    }
    else {
      echo"
        <div class=' shadow mb-4 small'>
          <button width='100%' class='btn btn-primary btn-md btn-block' id='join_grup' ><i class='fas fa-fw fa-plus'></i> Join grup</button>
        </div>";
    }
?>

 <!--JIKA HALAMAN ANGGOTA DIBUKA-->
 <?php 
    if ($page = $this->uri->segment(3) == 'anggota'){ ?>
  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold"><i class="fas fa-fw fa-user-plus"></i> Invite members</div><br>
    <label class="small">Enter email or phone number</label>
    <input class="form-control input-sm" type="text">
    </div>
  </div>
    <?php } ?>
  
  <!--JIKA HALAMAN HOME DIBUKA-->
  <?php 
    if ($page = $this->uri->segment(3) == 'index'){ ?>
  <div class="card shadow mb-4">
    <div class="card-body small">
    <i class="far fa-fw fa-flag"></i> Group created on <?= $data_grup_tmp->created ?>
    </div>
  </div>
  
  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold"><i class="fas fa-fw fa-layer-group"></i> About</div><br>
    <p><?= $data_grup_tmp->about ?></p> 
    </div>    
  </div>

  <div class="card shadow mb-4">
    <div class="card-body small">
      <div class=" font-weight-bold text-capitalize"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $data_grup_tmp->wilayah ?>
      </div><br>
      <div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?= $data_grup_tmp->wilayah ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:auto;width:auto;}.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:auto;}</style></div>
    </div>    
  </div>
    <?php } ?>

</div>
</div>


<!-- SETTING IDENTITAS GROUP -->
<div class="modal fade" id="settingIdentitasGrup" tabindex="-1" role="dialog" aria-labelledby="settingIdentitasGrup" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settingIdentitasGrup">Setting Identitas Grup
        </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="updateIdentitas" method="POST" enctype="multipart/form-data" action="<?php echo base_url('koperasi/grup/update_identitas')?>">
        <div class="form-group mx-sm-3 mb-2">
          <input type="hidden" name="grup_id" value="<?= $data_grup_tmp->grup_id ?>"> 
            <div class="form-group">
              <div class="small">Banner Grup
              </div>
                <input type="file" class="form-control" name="banner" accept=".jpg,.jpeg">
            </div>
            <div class="form-group">
              <div class="small">Nama Grup
              </div>
                <input type="text" name="nama_grup" class="form-control" id="nominal_topup" placeholder="Nama Grup" value="<?= $data_grup_tmp->nama_grup ?>">    
            </div>
            <div class="form-group">
              <div class="small">Coverage
              </div>
                <input type="text" name="wilayah" class="form-control" id="nominal_topup" placeholder="Area Coverage (mis. nama kota atau daerah)" value="<?= $data_grup_tmp->wilayah ?>"> 
              </div>
            <div class="form-group">
              <div class="small">Kategori
              </div>
              <select class="form-control" name="kategori">
                <option value="utensils">Keluarga</option>
                <option value="briefcase">Tempat Kerja</option>
                <option value="graduation-cap">Sekolah</option>
                <option value="people-carry">Lingkungan</option>
              </select>            
            </div>
            <div class="form-group">
              <div class="small">Desksripsi Singkat
              </div>
              <textarea class="form-control" name="about" placeholder="Deskripsi grup..."><?= $data_grup_tmp->about ?></textarea>
            </div>
            <div class="form-group">
              <div class="small">Deskripsi
              </div>
              <textarea class="form-control" name="deskripsi" placeholder="Deskripsi grup..."><?= $data_grup_tmp->deskripsi ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
           <div class="form-group text-right">         
          <?php 
            if ($data_user->type != "Full Service"){
              echo "<div class='text-danger'>Harap upgrade member menjadi full service terlebih dahulu, melalui menu profile";
              } else { ?>
            <button type="submit" id="btn_identitas_grup" class="btn btn-primary mb-2">Update</button>
              <?php } ?>
            </div>
          </div>   
        </div>
      </form>     
    </div>
  </div>
</div>



<!-- SETTING SIMPAN GROUP -->
<div class="modal fade" id="settingFinanceGrup" tabindex="-1" role="dialog" aria-labelledby="settingFinanceGrup" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="settingFinanceGrup">Setting Nominal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- MODAL ADD GROUP -->
        <form id="updateIdentitas" method="POST" action="<?php echo base_url('koperasi/grup/update_finance')?>">
          <div class="form-group mx-sm-3 mb-2">
            <div class="form-group">
              <input type="hidden" name="grup_id" value="<?= $data_grup_tmp->grup_id ?>"> 
              <small>Minimal simpanan pokok</small>
              <input type="number" name="minimal_pokok" class="form-control" id="nominal_topup" placeholder="Minimal Simpanan Pokok" value="<?= $data_grup_tmp->minimal_pokok ?>">
            </div>
            <div class="form-group"> 
              <small>Minimal simpanan wajib</small>
              <input type="number" name="minimal_wajib" class="form-control" id="nominal_topup" placeholder="Minimal Simpanan Wajib" value="<?= $data_grup_tmp->minimal_wajib ?>">
            </div>
            <div class="form-group"> 
              <small>Maksimal pinjaman</small>
              <input type="number" name="maksimal_pinjaman" class="form-control" id="nominal_topup" placeholder="%" value="<?= $data_grup_tmp->maksimal_pinjaman ?>"><small> <i class="fas fa-fw fa-info-circle"></i> Maksmimal pinjaman dalam bentuk % dari total pinjaman</small>
            </div>
            
            <div class="modal-footer">
              <div class="form-group text-right"> 
                  <button type="submit" id="btn_finance" class="btn btn-primary mb-2">Update
                  </button>
              </div>
            </div>   
          </div>
        </form>     
      </div>
    </div>
  </div>

  
<!-- SETTING SIMPAN GROUP -->
  <div class="modal fade" id="settingPinjamGrup" tabindex="-1" role="dialog" aria-labelledby="settingPinjamGrup" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="settingPinjamGrup">Buat Group Koperasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- MODAL ADD GROUP -->
        <form id="updateIdentitas" method="POST" action="<?php echo base_url('koperasi/grup/new')?>">
        <div class="form-group mx-sm-3 mb-2">
        <div class="form-group">
          <input type="text" name="nama_grup" class="form-control" id="nominal_topup" placeholder="Nama Grup">    
        </div>
        <div class="form-group">
          <input type="text" name="wilayah" class="form-control" id="nominal_topup" placeholder="Area Coverage (mis. nama kota atau daerah)">
        </div>
        <div class="form-group">
          <select class="form-control" name="kategori">
            <option value="utensils"">Keluarga</option>
            <option value="briefcase">Tempat Kerja</option>
            <option value="graduation-cap">Sekolah</option>
            <option value="people-carry">Lingkungan</option>
          </select>            
        </div>
        <div class="form-group">
            <textarea class="form-control" name="tentang" placeholder="Deskripsi grup..."></textarea>
        </div>
        <div class="modal-footer">
          <div class="form-group text-right">         
          <?php 
            if ($data_user->type != "Full Service"){
              echo "<div class='text-danger'>Harap upgrade member menjadi full service terlebih dahulu, melalui menu profile";
              } else { ?>
            <button type="submit" class="btn btn-primary mb-2">Buat Grup</button>
              <?php } ?>
          </div>
        </div>   
        </div>
        </form>     
      </div>
    </div>
  </div>