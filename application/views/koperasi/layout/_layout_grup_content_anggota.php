<div class="card-body">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab" aria-controls="nav-admin" aria-selected="true">Admin</a>
      <a class="nav-item nav-link active" id="nav-member-tab" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="false">Member</a>
      <?php
      if ($grup_user->status_user == 'admin'){ ?>
      <a class="nav-item nav-link" id="nav-request-tab" data-toggle="tab" href="#nav-request" role="tab" aria-controls="nav-request" aria-selected="false">Request</a>
      <?php } ?>
    </div>
  </nav>
  <br>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">      
      <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50%">User</th>
              <th>Joined</th>
            </tr>
          </thead>          
          <tbody id="data-admin">                 
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade show active" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">    
      <div class="table-responsive">
        <table class="table" id="dataTable1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50%">User</th>
              <th>Joined</th>
              <?php if ($grup_user->status_user == 'admin'){
              echo "<th class='text-right'>Action</th>";} ?>
            </tr>
          </thead>          
          <tbody id="data-member">                 
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">      
      <div class="table-responsive">
        <table class="table" id="dataTable2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>User</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
            <tbody id="show_data">                 
            </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-banned" role="tabpanel" aria-labelledby="nav-banned-tab">    
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable3" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal Simpan</th>
              <th>Jenis Simpanan</th>
              <th>Periode</th>
              <th>Nominal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>< $simpan->tanggal_simpan ?></td>
              <td>< $simpan->jenis_simpanan ?></td>
              <td>< $simpan->periode ?></td>
              <td>< number_format($simpan->nominal,0, ".", ".") ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
      request_grup();
      member_grup();
      admin_grup();      
   
  //tampil anggota grup request
  function request_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/grup/list_request',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a></td>'+
            '<td style="text-align:right;">'+
                '<button class="btn btn-default text-primary" id="accept_grup" data-user="'+data[i].user_id+'" data="'+data[i].id+'"><i class="far fa-fw fa-check-circle"></i> Accept</button>'+' '+
                '<button class="btn btn-default text-danger" id="reject_grup" data-user="'+data[i].user_id+'" data="'+data[i].id+'"><i class="far fa-fw fa-times-circle"></i> Reject</button>'
            '</td>'+
            '</tr>';
        }
        $('#show_data').html(html);
      }
    });
  };

  //PROSES ACC MEMBER KE GRUP 
  $(document).on('click', '#accept_grup', function() {
    if (!confirm("Anda akan menyetujui user bergabung?")){
      return false;
    }
    var id = $(this).attr('data');
    var user_id = $(this).attr('data-user');
    var nama_grup = "<?php if(isset($data_grup_tmp->nama_grup)){echo ($data_grup_tmp->nama_grup);} ?>";
    $.ajax({
          type: 'POST',
          url: '<?= base_url("koperasi/grup/accept")?>',
          data: {id:id,user_id:user_id,nama_grup:nama_grup},
          success: function (data) {
            request_grup();
            member_grup();
            Swal.fire({
              position: 'center',
              icon: 'success',
              text: 'Berhasil menyetujui menjadi anggota grup',
              showConfirmButton: false,
              timer: 1300
            })
          },
          error: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              text: 'Ada sesuatu yang salah saat acc member',
              showConfirmButton: false,
              timer: 1300
            })
          }          
        })
        return false;
  });

  //PROSES REJECT MEMBER
  $(document).on('click', '#reject_grup', function() {
    if (!confirm("Anda akan menolak user untuk bergabung?")){
      return false;
    }
    var id = $(this).attr('data');
    $.ajax({
          type: 'POST',
          url: '<?= base_url("koperasi/grup/reject")?>',
          data: {id:id},
          success: function (data) {
            request_grup();
            member_grup();
            Swal.fire({
              position: 'center',
              icon: 'success',
              text: 'Permintaan gabung ke grup berhasil direject',
              showConfirmButton: false,
              timer: 1300
            })
          },
          error: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              text: 'Ada sesuatu yang salah saat acc member',
              showConfirmButton: false,
              timer: 1300
            })
          }          
        })
        return false;
  });

  
  //tampil anggota grup
  function member_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/grup/list_member',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a></td>'+
            '<td>'+data[i].joined+' days ago</td>'+
            /*
            Jika statusnya adalah admin, maka tampilkan action untuk kick member
            */
            <?php            
            if (!empty($grup_user)){
            if ($grup_user->status_user == 'admin'){ ?>
            '<td style="text-align:right;">'+
                '<button class="btn btn-default text-danger" id="kick_member" data="'+data[i].id+'"><i class="fas fa-fw fa-ban"></i> Kick Out</button>'+
            '</td>'+
            <?php }} ?>

            '</tr>';
        }
        $('#data-member').html(html);
      }
    });
  };

  
  //PROSES KICK OUT MEMBER 
  $(document).on('click', '#kick_member', function() {
    if (!confirm("Anda yakin akan mengeluarkan anggota dari grup ini?")){
      return false;
    }
    var id = $(this).attr('data');
    $.ajax({
          type: 'POST',
          url: '<?= base_url("koperasi/grup/kick")?>',
          data: {id:id},
          success: function (data) {
            member_grup();
            request_grup();
            Swal.fire({
              position: 'center',
              icon: 'success',
              text: 'User berhasil dikeluarkan dari grup',
              showConfirmButton: false,
              timer: 1300
            })
          },
          error: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              text: 'Ada sesuatu yang salah saat kick out member',
              showConfirmButton: false,
              timer: 1300
            })
          }          
        })
        return false;
  });

  
  //tampil admin grup
  function admin_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/grup/list_admin',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a></td>'+
            '<td>'+data[i].joined+' days ago</td>'+
            '</tr>';
        }
        $('#data-admin').html(html);
      }
    });
  };

</script>