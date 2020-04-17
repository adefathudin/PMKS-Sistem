          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="border-bottom text-center pb-4">
                    <img src="<?php echo base_url('assets/img/user/profile/'.$data_user_tmp->profil) ?>" alt="profile" class="img-responsive rounded">
                    <div class="mb-3"><br>
                      <h4>
                        <?php echo $data_user_tmp->nama_lengkap; ?>
                      </h4>
                      <div class="d-flex align-items-center justify-content-center">
                        <h5 class="mb-0 mr-2 text-muted">
                        <?php 
                        echo "<div class='small'>".$data_user_tmp->about."</div>";
                        ?>
                        </h5>
                        </div>     
                    </div>
                    <p class="w-75 mx-auto mb-3">
                    <?php 
                        if($this->session->flashdata('pesan_lampiran')){ // Jika ada
                          echo "
                          <div class='alert alert-info alert-dismissible'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                          .$this->session->flashdata('pesan_lampiran')."</div>";
                          }
                    ?>
                    </p>
                   </div>
                </div>
                <div class="col-lg-6">
                  <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                    <div class="text-center mt-4 mt-md-0">
                      <?php                       
                      if ($data_user_tmp->user_id != $user_id){
                        echo"
                      <button class='btn btn-outline-primary'>Message</button>
                      <button class='btn btn-outline-primary'>Follow</button>";}
                      else {
                        echo"
                      <a href='#' data-toggle='modal' data-target='#settingUserModal'>
                      <button class='btn btn-outline-secondary'><i class='fas fa-fw fa-user-edit'></i> Setting</button></a>";
                      } ?>
                    </div>
                  </div>
                  <hr>
                  <div class="profile-feed">   
                  <?php                       
                      if ($data_user_tmp->user_id == $user_id){ ?>
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
                      if ($data_user_tmp->user_id == $user_id){
                        echo"    
                        
                    <p class='clearfix'>
                      <span class='float-left'>
                        <i class='fas fa-fw fa-phone'></i>
                        No. HP
                      </span>
                      <span class='float-right text-muted'>
                       ".$data_user_tmp->nomor_hp."
                      </span>
                    </p>
                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-calendar'></i>
                      Tempat dan Tanggal Lahir
                    </span>
                    <span class='float-right text-muted'>".
                    $data_user_tmp->tempat_lahir.", ".$data_user_tmp->tanggal_lahir."
                    </span>
                    </p>

                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-male'></i>
                      Jenis Kelamin
                    </span>
                    <span class='float-right text-muted'>";
                    if ($data_user_tmp->jenis_kelamin == "L"){
                      $jk = "<i class='fas text-primary fa-fw fa-mars'></i> Laki-laki";}
                      elseif ($data_user_tmp->jenis_kelamin == "P"){
                        $jk = "<i class='fas text-danger fa-fw fa-venus'></i> Perempuan";}
                        else {
                          $jk = "-";
                        }
                    echo $jk."
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
                    
                    <p class="clearfix text-center">
                    <img src="<?= base_url('assets/img/user/qrcode/'.$data_user_tmp->qrcode)?>.png" class="img-responsive" height="40%" width="40%"/>
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